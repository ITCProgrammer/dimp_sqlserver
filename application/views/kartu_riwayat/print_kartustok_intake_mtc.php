<?php

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
    ini_set("error_reporting", 1);

    // Data Dari POST
    $tglawal   = $date1;
    $tglakhir  = $date2;
    $id_barang = $kode_barang;

    // Deklarasi Awal
    $stock_awal    = 0;
    $stock_akhir   = 0;
    $stock_awal_db = 0;
    $total_masuk   = 0;
    $total_keluar  = 0;

    $header_nama_barang = null;
    $header_ukuran      = "0 Kg";

    $exclude_date = '2025-05-02'; // Date yang tidak di masukan ke transaksi

    // Ambil data barang stock awal
    $query_barang = "SELECT * FROM tbl_master_barang_limbah_intake_mtc
    where id='$id_barang' LIMIT 1";

    $result_barang = mysqli_query($con, $query_barang);
    $data_barang   = mysqli_fetch_assoc($result_barang);
    // print_r($data_barang);

    $DESCRIPTION   = $data_barang['DESCRIPTION'];
    $ITEMTYPECODE  = $data_barang['ITEMTYPECODE'];
    $DECOSUBCODE01 = $data_barang['DECOSUBCODE01'];
    $DECOSUBCODE02 = $data_barang['DECOSUBCODE02'];
    $DECOSUBCODE03 = $data_barang['DECOSUBCODE03'];
    $DECOSUBCODE04 = $data_barang['DECOSUBCODE04'];
    $DECOSUBCODE05 = $data_barang['DECOSUBCODE05'];
    $DECOSUBCODE06 = $data_barang['DECOSUBCODE06'];
    $UNIOFMEASURE  = $data_barang['UNITOFMEASURE'];

    $data        = [];
    $kode_barang = $DECOSUBCODE01 . "-" . $DECOSUBCODE02 . "-" . $DECOSUBCODE03;

    if ($data_barang) {
        $stock_awal_db = $data_barang['STOCK'];
    }

    // Total Masuk
    $query_masuk = "SELECT SUM(USERPRIMARYQUANTITY) AS TOTAL
    FROM STOCKTRANSACTION
    WHERE (TEMPLATECODE ='QC1' OR TEMPLATECODE='OPN')
    AND LOGICALWAREHOUSECODE ='M121'
    AND WAREHOUSELOCATIONCODE ='A'
    AND WHSLOCATIONWAREHOUSEZONECODE='2'
    AND DECOSUBCODE01 ='$DECOSUBCODE01'
    AND DECOSUBCODE02 ='$DECOSUBCODE02'
    AND DECOSUBCODE03 ='$DECOSUBCODE03'
    AND TRANSACTIONDATE BETWEEN '2025-04-25' AND '$tglawal'
    AND TRIM(CREATIONUSER) <> 'yohana.hantari'
    AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'";

    $exec_query_masuk  = db2_exec($conn1, $query_masuk);
    $fetch_query_masuk = db2_fetch_assoc($exec_query_masuk);

    if ($fetch_query_masuk) {
        $total_masuk = (float) $fetch_query_masuk['TOTAL'];
    }

    // Total Keluar
    $query_keluar = "SELECT SUM(USERPRIMARYQUANTITY) AS TOTAL
    FROM STOCKTRANSACTION
    WHERE (TEMPLATECODE ='098')
    AND LOGICALWAREHOUSECODE ='M121'
    AND WAREHOUSELOCATIONCODE ='A'
    AND WHSLOCATIONWAREHOUSEZONECODE='2'
    AND DECOSUBCODE01 ='$DECOSUBCODE01'
    AND DECOSUBCODE02 ='$DECOSUBCODE02'
    AND DECOSUBCODE03 ='$DECOSUBCODE03'
    AND TRANSACTIONDATE BETWEEN '2025-04-25' AND '$tglawal'
    AND TRIM(CREATIONUSER) <> 'yohana.hantari'
    AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'";

    $exec_query_keluar  = db2_exec($conn1, $query_keluar);
    $fetch_query_keluar = db2_fetch_assoc($exec_query_keluar);

    if ($fetch_query_keluar) {
        $total_keluar = (float) ($fetch_query_keluar['TOTAL']);
    }

    $stock_awal = ($stock_awal_db + $total_masuk) - $total_keluar;

    $informasi = 'Informasi akumulasi stock awal dari 2025-04-25 - ' . $tglawal . ', stock awal db : ' . $stock_awal_db .
        ' total masuk: ' . $total_masuk .
        ' total keluar: ' . $total_keluar .
        ' stock awal: ' . $stock_awal;

    // Kalau mau makesure kalkulasi stock awal
    // echo $informasi;

    // List data
    $query_data = "SELECT t.*,a.VALUESTRING as KETERANGAN
    FROM STOCKTRANSACTION t
    LEFT JOIN ADSTORAGE a ON a.UNIQUEID = t.ABSUNIQUEID
    WHERE
        (t.TEMPLATECODE ='OPN'
        OR t.TEMPLATECODE ='QC1'
        OR t.TEMPLATECODE='098')
        AND t.LOGICALWAREHOUSECODE ='M121'
        AND t.WAREHOUSELOCATIONCODE ='A'
        AND t.WHSLOCATIONWAREHOUSEZONECODE='2'
        AND t.DECOSUBCODE01 ='$DECOSUBCODE01'
        AND t.DECOSUBCODE02 ='$DECOSUBCODE02'
        AND t.DECOSUBCODE03 ='$DECOSUBCODE03'
        AND t.TRANSACTIONDATE BETWEEN '$tglawal' AND '$tglakhir'
        AND TIMESTAMP(t.TRANSACTIONDATE, t.TRANSACTIONTIME) > '2025-04-25 09:00:00'
        ORDER BY t.TRANSACTIONDATE,t.TRANSACTIONTIME ASC";

    // echo $query_data;

    $exec_query_data = db2_exec($conn1, $query_data);

    while ($row = db2_fetch_assoc($exec_query_data)) {

        // $nama_supplier = $row['CREATIONDATETIME'];
        $nama_supplier        = '';
        $tanggal_masuk        = '';
        $jumlah_masuk         = '';
        $tanggal_keluar       = '';
        $jumlah_keluar        = '';
        $keterangan           = '';
        $tanda_tangan_pemakai = '';

        // Tanggal Masuk , Tanggal Keluar, Jumlah Masuk, Jumlah Keluar
        if ($row['TEMPLATECODE'] === 'OPN' || $row['TEMPLATECODE'] === 'QC1' || $row['TEMPLATECODE'] === '101') {
            $tanggal_masuk = $row['TRANSACTIONDATE'];
            $creation_user = trim($row['CREATIONUSER']);

            if ($tanggal_masuk == '2025-05-02' && $creation_user == 'yohana.hantari') {
                continue;
            }

            $jumlah_masuk = (float) $row['USERPRIMARYQUANTITY'];
            $stock_akhir  = $stock_awal + $jumlah_masuk;

        } else if ($row['TEMPLATECODE'] === '098') {
            $tanggal_keluar = $row['TRANSACTIONDATE'];
            $creation_user  = trim($row['CREATIONUSER']);

            if ($tanggal_keluar == '2025-05-02' && $creation_user == 'yohana.hantari') {
                continue;
            }

            $jumlah_keluar = (float) $row['USERPRIMARYQUANTITY'];
            $stock_akhir   = $stock_awal - $jumlah_keluar;
        }

        // Keterangan
        $keterangan = $row['KETERANGAN'];

        // Array Data
        $data[] = [
            'nama_supplier'        => $nama_supplier,
            'stock_awal'           => $stock_awal,
            'tanggal_masuk'        => $tanggal_masuk,
            'jumlah_masuk'         => $jumlah_masuk,
            'tanggal_keluar'       => $tanggal_keluar,
            'jumlah_keluar'        => $jumlah_keluar,
            'stock_akhir'          => $stock_akhir,
            'keterangan'           => $keterangan,
            'tanda_tangan_pemakai' => $tanda_tangan_pemakai,
        ];

        $stock_awal = $stock_akhir;
    }

    if (empty($data)) {
        $data[] = [
            'nama_supplier'        => '',
            'stock_awal'           => $stock_awal,
            'tanggal_masuk'        => '',
            'jumlah_masuk'         => '',
            'tanggal_keluar'       => '',
            'jumlah_keluar'        => '',
            'stock_akhir'          => $stock_awal,
            'keterangan'           => 'Balance per 25 April 2025',
            'tanda_tangan_pemakai' => '',
        ];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Stock Intake MTC</title>
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
            <td width="10%" align="center">
                <img src="<?php echo base_url(); ?>assets\images\ITTI_Logo Option_Logogram ITTI.png" width="70">
            </td>
            <td width="50%" align="center" colspan="5" >
                <strong style="font-size:x-large;">KARTU STOK</strong>
            </td>
            <td width="40%" colspan="3">
                <table>
                    <tr>
                        <td>No. Form</td>
                        <td>:</td>
                        <td>19-08</td>
                    </tr>
                    <tr>
                        <td>No. Revisi</td>
                        <td>:</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td>Tgl. Terbit</td>
                        <td>:</td>
                        <td>27 Februari 2006</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <table>
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>
                            <?php echo $DESCRIPTION ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Type / Ukuran</td>
                        <td>:</td>
                        <td>
                            <?php echo $kode_barang ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" style="width: 15%; font-weight: bold;">Nama Supplier</td>
            <td align="center" style="width: 7%; font-weight: bold;">Stock Awal</td>
            <td align="center" style="width: 12%; font-weight: bold;">Tanggal Masuk</td>
            <td align="center" style="width: 8%; font-weight: bold;">Jumlah</td>
            <td align="center" style="width: 12%; font-weight: bold;">Tanggal Keluar</td>
            <td align="center" style="width: 8%; font-weight: bold;">Jumlah</td>
            <td align="center" style="width: 7%; font-weight: bold;">Stock Akhir</td>
            <td align="center" style="width: 10%; font-weight: bold;">Keterangan</td>
            <td align="center" style="width: 5%; font-weight: bold;">Tanda Tangan Pemakai</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td align="center"><?php echo $row['nama_supplier']; ?></td>
                <td align="center"><?php echo $row['stock_awal'] != '' ? formatNumber($row['stock_awal']) : ''; ?></td>
                <td align="center"><?php echo $row['tanggal_masuk']; ?></td>
                <td align="center"><?php echo $row['jumlah_masuk'] != '' ? formatNumber($row['jumlah_masuk']) : ''; ?></td>
                <td align="center"><?php echo $row['tanggal_keluar']; ?></td>
                <td align="center"><?php echo $row['jumlah_keluar'] != '' ? formatNumber($row['jumlah_keluar']) : ''; ?></td>
                <td align="center"><?php echo $row['stock_akhir'] != '' ? formatNumber($row['stock_akhir']) : ''; ?></td>
                <td align="center"><?php echo $row['keterangan']; ?></td>
                <td align="center"><?php echo $row['tanda_tangan_pemakai']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>