<?php
    $namaFile = "Laporan Pemakaian dan Stock ATK $dept.xls";

    // header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    // header("Content-Disposition: attachment; filename=\"$namaFile\"");
    // header("Pragma: no-cache");
    // header("Expires: 0");
    // ob_start();

    function formatNumber($number)
    {
        return rtrim(rtrim(number_format($number, 3, '.', ''), '0'), '.');
    }

    // Koneksi MYSQL
    date_default_timezone_set('Asia/Jakarta');
    $con = mysqli_connect("10.0.0.10", "dit", "4dm1n", "dimp");

    // Koneksi DB2
    $hostname = "10.0.0.21";
                             // $database = "NOWTEST"; // SERVER NOW 20
    $database    = "NOWPRD"; // SERVER NOW 22
    $user        = "db2admin";
    $passworddb2 = "Sunkam@24809";
    $port        = "25000";
    $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
    // $conn1 = db2_pconnect($conn_string,'', '');
    $conn1 = db2_connect($conn_string, '', '');
    ini_set("error_reporting",1 );

    // Data Dari POST
    $tglawal   = $date1;
    $tglakhir  = $date2;
    $id_barang = $kode_barang;
    $logicalwh = $wh;
    $departement= $dept;
    if($kode_barang=="All-data"){
        $kd_brg=" 1=1 ";
    } else {
        $kd_brg=" id='$id_barang' ";
    }

    //jika qcf
    $wh_location="";
    if($logicalwh=="M407" && $departement=="TQ"){
        $wh_location=" AND WAREHOUSELOCATIONCODE ='002' ";
    }else if ($logicalwh=="M407" && $departement=="QCF"){
        $wh_location=" AND WAREHOUSELOCATIONCODE ='001' ";
    }
    // Ambil data barang stock awal
    $query_get_barang  = "SELECT * FROM $tabel_data where $kd_brg AND (ITEMTYPECODE='STA' OR ITEMTYPECODE='SUP') ";
    $result_barang = mysqli_query($con, $query_get_barang);
    $query_barang=array();
    $data_deskripsi=array();
    $data_code=array();
    while($row = mysqli_fetch_assoc($result_barang)){
        $query_barang[]=" 
    (ITEMTYPECODE ='".$row['ITEMTYPECODE']."'
    AND DECOSUBCODE01 ='".$row['DECOSUBCODE01']."'
    AND DECOSUBCODE02 ='".$row['DECOSUBCODE02']."'
    AND DECOSUBCODE03 ='".$row['DECOSUBCODE03']."'
    AND DECOSUBCODE04 ='".$row['DECOSUBCODE04']."'
    AND DECOSUBCODE05 ='".$row['DECOSUBCODE05']."'
    AND DECOSUBCODE06 ='".$row['DECOSUBCODE06']."') ";
        $data_deskripsi[trim($row['ITEMTYPECODE'])."-".trim($row['DECOSUBCODE01'])."-".trim($row['DECOSUBCODE02'])."-".trim($row['DECOSUBCODE03'])."-".trim($row['DECOSUBCODE04'])."-".trim($row['DECOSUBCODE05'])."-".trim($row['DECOSUBCODE06'])]=$row['DESCRIPTION'];
        $data_code[trim($row['ITEMTYPECODE'])."-".trim($row['DECOSUBCODE01'])."-".trim($row['DECOSUBCODE02'])."-".trim($row['DECOSUBCODE03'])."-".trim($row['DECOSUBCODE04'])."-".trim($row['DECOSUBCODE05'])."-".trim($row['DECOSUBCODE06'])]=trim($row['DECOSUBCODE01'])."-".trim($row['DECOSUBCODE02']);
    }
    
    if (count($query_barang)!=0){
        $full_query_barang =" AND (".join(" OR ",$query_barang).") ";
    } else {
        echo "Error Data Tidak Ditemukan";
        exit();
    }
    $query_masuk = "SELECT TRIM(ITEMTYPECODE) ITEMTYPECODE,TRIM(DECOSUBCODE01) DECOSUBCODE01,TRIM(DECOSUBCODE02) DECOSUBCODE02,TRIM(DECOSUBCODE03) DECOSUBCODE03,TRIM(DECOSUBCODE04) DECOSUBCODE04,TRIM(DECOSUBCODE05) DECOSUBCODE05,TRIM(DECOSUBCODE06) DECOSUBCODE06, SUM(USERPRIMARYQUANTITY) AS TOTAL
    FROM STOCKTRANSACTION
    WHERE
    TRANSACTIONDATE >= '$tglawal'
    AND TRANSACTIONDATE <= '$tglakhir'
    AND (TEMPLATECODE ='OPN' OR TEMPLATECODE = '304' OR TEMPLATECODE = '101')
    AND LOGICALWAREHOUSECODE ='$logicalwh'
    $wh_location
    $full_query_barang
    GROUP BY ITEMTYPECODE,DECOSUBCODE01,DECOSUBCODE02,DECOSUBCODE03,DECOSUBCODE04,DECOSUBCODE05,DECOSUBCODE06
    ";

    $data_masuk=array();
    $exec_query_masuk  = db2_exec($conn1, $query_masuk);
    while($row = db2_fetch_assoc($exec_query_masuk)){
        $data_masuk[$row['ITEMTYPECODE']."-".$row['DECOSUBCODE01']."-".$row['DECOSUBCODE02']."-".$row['DECOSUBCODE03']."-".$row['DECOSUBCODE04']."-".$row['DECOSUBCODE05']."-".$row['DECOSUBCODE06']]=$row['TOTAL'];
    }

    $query_keluar = "SELECT TRIM(ITEMTYPECODE) ITEMTYPECODE,TRIM(DECOSUBCODE01) DECOSUBCODE01,TRIM(DECOSUBCODE02) DECOSUBCODE02,TRIM(DECOSUBCODE03) DECOSUBCODE03,TRIM(DECOSUBCODE04) DECOSUBCODE04,TRIM(DECOSUBCODE05) DECOSUBCODE05,TRIM(DECOSUBCODE06) DECOSUBCODE06, SUM(USERPRIMARYQUANTITY) AS TOTAL
    FROM STOCKTRANSACTION
    WHERE 
    TRANSACTIONDATE >= '$tglawal'
    AND TRANSACTIONDATE <= '$tglakhir'
    AND (TEMPLATECODE ='098' OR TEMPLATECODE = '303')
    AND LOGICALWAREHOUSECODE ='$logicalwh'
    $wh_location
    $full_query_barang
    GROUP BY ITEMTYPECODE,DECOSUBCODE01,DECOSUBCODE02,DECOSUBCODE03,DECOSUBCODE04,DECOSUBCODE05,DECOSUBCODE06
    ";

    $data_keluar=array();
    $exec_query_keluar  = db2_exec($conn1, $query_keluar);
    while($row = db2_fetch_assoc($exec_query_keluar)){
        $data_keluar[$row['ITEMTYPECODE']."-".$row['DECOSUBCODE01']."-".$row['DECOSUBCODE02']."-".$row['DECOSUBCODE03']."-".$row['DECOSUBCODE04']."-".$row['DECOSUBCODE05']."-".$row['DECOSUBCODE06']]=$row['TOTAL'];
    }

    $query_balance="SELECT TRIM(ITEMTYPECODE) ITEMTYPECODE,TRIM(DECOSUBCODE01) DECOSUBCODE01,TRIM(DECOSUBCODE02) DECOSUBCODE02,TRIM(DECOSUBCODE03) DECOSUBCODE03,TRIM(DECOSUBCODE04) DECOSUBCODE04,TRIM(DECOSUBCODE05) DECOSUBCODE05,TRIM(DECOSUBCODE06) DECOSUBCODE06, BASEPRIMARYQUANTITYUNIT AS TOTAL, BASEPRIMARYUNITCODE AS UOM
    FROM BALANCE
    WHERE
       LOGICALWAREHOUSECODE ='$logicalwh'
       $wh_location
    $full_query_barang ";

    $data_balance=array();
    $data_balance_unit=array();
    $exec_query_balance  = db2_exec($conn1, $query_balance);
    while($row = db2_fetch_assoc($exec_query_balance)){
        $data_balance[$row['ITEMTYPECODE']."-".$row['DECOSUBCODE01']."-".$row['DECOSUBCODE02']."-".$row['DECOSUBCODE03']."-".$row['DECOSUBCODE04']."-".$row['DECOSUBCODE05']."-".$row['DECOSUBCODE06']]=$row['TOTAL'];
        $data_balance_unit[$row['ITEMTYPECODE']."-".$row['DECOSUBCODE01']."-".$row['DECOSUBCODE02']."-".$row['DECOSUBCODE03']."-".$row['DECOSUBCODE04']."-".$row['DECOSUBCODE05']."-".$row['DECOSUBCODE06']]=$row['UOM'];
    }

    $alldata=array();
    foreach($data_deskripsi as $id => $vd){
        $tmp=[
            "code"=>$data_code[$id]??"-",
            "deskripsi"=>$vd,
            "masuk"=> $data_masuk[$id]??"0" ,
            "keluar"=> $data_keluar[$id]??"0",
            "balance"=> $data_balance[$id]??"0",
            "uom"=> $data_balance_unit[$id]??""
        ];
        $alldata[]=$tmp;
    }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Stok ATK | <?=$dept;?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        tr {
            border-bottom: 1px solid black;
        }

        @page {
            size: auto;
            margin: 0.5cm;
        }

        @media print {
            thead {
                display: table-header-group;
            }

            body {
                font-size: 12px;
                -webkit-print-color-adjust: exact;
                margin: 1cm 1cm 1cm 1cm;
            }
        }

    </style>
</head>
<body>
<table border="1" width="100%" style="border-collapse: collapse;">
    <thead>
         <tr>
            <th align="center" colspan="6">Laporan Pemakaian dan Stock ATK (<?= ($kode_barang=="All-data") ? "ALL":$alldata[0]['deskripsi'];?>) periode <?=$tglawal;?> sampai dengan <?=$tglakhir;?> Departement <?=$dept;?> </th>
        </tr>
        <tr>
            <th align="center">No</th>
            <th align="center">Code Barang</th>
            <th align="center">Nama Barang</th>
            <th align="center">QTY MASUK</th>
            <th align="center">QTY KELUAR</th>
            <th align="center">Current Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($alldata as $index => $row){ ?>
            <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td ><?php echo $row['code']; ?></td>
                <td ><?php echo $row['deskripsi']; ?></td>
                <td align="right"><?php echo $row['masuk'] != '' ? formatNumber($row['masuk']) : '0.00'; ?></td>
                <td align="right"><?php echo $row['keluar'] != '' ? formatNumber($row['keluar']) : '0.00'; ?></td>
                <td align="right"><?php echo $row['balance'] != '' ? formatNumber($row['balance']) : '0.00'; ?> <?=$row['uom']?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
 <?php //ob_end_flush(); ?> 