<?php
$hostname = "10.0.0.21";
// $database = "NOWTEST"; // SERVER NOW 20
$database = "NOWPRD"; // SERVER NOW 22
$user = "db2admin";
$passworddb2 = "Sunkam@24809";
$port = "25000";
$conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
// $conn1 = db2_pconnect($conn_string,'', '');
$conn1 = db2_connect($conn_string, '', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK-TI | <?php echo $dept ?></title>
</head>
<style>
    /* @page {
        size: landscape;
        margin: 20px 20px 20px 20px;
        font-size: 11pt !important;
        font-family: Arial, Helvetica, sans-serif !important;
    } */
    @page {
     	size: A4 landscape;
  	 	margin: 10mm;
    }



    @media print {
        @page {
            /* size: A4; */
            margin: 20px 20px 20px 20px;
            size: landscape !important;
            font-size: 8pt !important;
            font-family: Arial, Helvetica, sans-serif !important;
        }

        input {
            text-align: center;
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
        }

        html, body {
            font-family: Arial, Helvetica, sans-serif;
            width: auto;
            height: auto;
            background: #FFF;
            overflow: visible;
        }

        .table-ttd {
            border-collapse: collapse;
            width: 100%;
            /* width: auto; */
            font-size: 8pt !important;
            font-family: Arial, Helvetica, sans-serif;
        }

        .table-ttd tr,
        .table-ttd tr td {
            font-family: Arial, Helvetica, sans-serif;
            border: 0.5px solid black;
            padding: 4px;
            padding: 4px;
            font-size: 8pt !important;
        }

        ::-webkit-input-placeholder {
            /* WebKit browsers */
            color: transparent;
        }

        :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: transparent;
        }

        ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: transparent;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10+ */
            color: transparent;
        }

        .pagebreak {
            page-break-before: always;
        }

        .header {
            display: block
        }

        table thead {
            display: table-header-group;
        }
    }

    /* .table-ttd {
        border-collapse: collapse;
        width: 100%;
        font-size: 11pt !important;
        font-family: Arial, Helvetica, sans-serif;
        width: 265mm; --ini nanti gapake
    } */

	.table-ttd {
		width: 100% !important;            /* <— was 138%/131%/121% */
		border-collapse: collapse !important;
		table-layout: fixed !important;    
		font-size: 10pt !important;
	}

    .table-ttd tr,
    .table-ttd tr td {
        border: 0.5px solid black;
        padding: 4px 4px 4px 4px;
        font-size: 11pt !important;
        font-family: Arial, Helvetica, sans-serif;
    }

    .table-ttd>thead>tr>th {
        padding: 4px 4px 4px 4px;
    }

    .rotation {
        transform: rotate(-90deg);
        /* Legacy vendor prefixes that you probably don't need... */
        /* Safari */
        -webkit-transform: rotate(-90deg);
        /* Firefox */
        -moz-transform: rotate(-90deg);
        /* IE */
        -ms-transform: rotate(-90deg);
        /* Opera */
        -o-transform: rotate(-90deg);
        /* Internet Explorer */
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
</style>

<body>
    <table width="138%" height="190" class="table-ttd">
        <tr>
            <td width="102" rowspan="6" align="center"><img src="<?php echo base_url() ?>/assets/images/logoitti.png" alt="" style="width: 25mm;"></td>
            <td width="953" rowspan="6" align="center">
                <h2 style="font-weight: bold; width: 300mm;">Formulir <br> Checklist PC Audit & Monitoring Kebijakan TI </h2>
            </td>
            <td colspan="2" align="center" valign="middle" style="width: 90mm; font-family: Arial, sans-serif; font-size: 12px;"><strong>PT INDO TAICHEN TEXTILE INDUSTRY</strong></td>

        </tr>
        <tr>
          <td width="386" align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">No. Dokumen</td>
          <td width="629" align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">: FRM-21.01</td>
        </tr>
        <tr>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">Tanggal Efektif</td>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">: 14 Juli 2025</td>
        </tr>
        <tr>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">Tanggal Revisi</td>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">: 25 September 2025</td>
        </tr>
        <tr>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">Versi</td>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">: 3.0</td>
        </tr>
        <tr>
          <td height="53" align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">Klasifikasi</td>
          <td align="left" valign="middle" style="width: 45mm; font-family: Arial, sans-serif; font-size: 12px;">Internal</td>
        </tr>
    </table>
    <?php
    $query_mon = "SELECT 
                                p.CODE AS NO_PC_LAPTOP,
                                p.FIRSTUSERGRPCODE AS JENIS_PRASARANA,
                                p.GENERICDATA1 AS RAM,
                                p.GENERICDATA2 AS HD,
                                p.GENERICDATA3 AS OS,
                                p.LONGDESCRIPTION AS USER,
                                d.CODE AS CODE_DEPT,
                                d.SHORTDESCRIPTION AS DEPT,
                                a.VALUESTRING AS IPADDRESS
                            FROM
                                PMBOM p
                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                            LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'IPADDRESS'
                            WHERE 
                                (p.FIRSTUSERGRPCODE = 'CPU' OR
                                p.FIRSTUSERGRPCODE = 'DESKTOP' OR
                                p.FIRSTUSERGRPCODE = 'LAPTOP' OR
                                p.FIRSTUSERGRPCODE = 'NOTEBOOK' OR
                                p.FIRSTUSERGRPCODE = 'PRINTER' OR
                                p.FIRSTUSERGRPCODE = 'SCANNER' OR
                                p.FIRSTUSERGRPCODE = 'TELEPON' OR
                                p.FIRSTUSERGRPCODE = 'BARCODE'OR 
                                p.FIRSTUSERGRPCODE = 'TABLET')
                                AND TRIM(d.CODE) = '$dept'
                                AND p.STATUS = '1'";
    $q_monitoring = db2_exec($conn1, $query_mon);
    $q_monitoring2 = db2_exec($conn1, $query_mon);
    ?>
    <br>
    <?php $data_monitoring = db2_fetch_assoc($q_monitoring); ?>
    <p style="font-family: Arial, Helvetica, sans-serif; display: flex; margin: 0;">
    <span style="width: 120px;">Departement</span>
    <span>: <?= $data_monitoring['DEPT']?? "" ?></span>
</p>
<p style="font-family: Arial, Helvetica, sans-serif; display: flex; margin: 0;">
    <span style="width: 120px;">Hari, Tanggal</span>
    <span>: </span>
</p>

    <table width="120px" class="table-ttd">
        <thead>
            <tr>
                <td width="46" rowspan="2" style="font-weight: bold; text-align: center; width: 10mm;">NO. (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 30mm;">Kode Prasarana (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 30mm;">User (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 20mm;">Jenis Prasarana (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 13mm;">RAM (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 20mm;">HD (A)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 10mm;">OS (A)</td>
                <td width="130" rowspan="2" style="font-weight: bold; text-align: center; width: 30mm;">Hak Akses<br>(administrator<br>/user) (B)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 20mm;">*VPN<br>(Laptop)</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 17mm;">*Disable<br>USB</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 20mm;">*Screen Saver 5-10 Menit<br>
                (Aktif / Tidak)</td>
                <td colspan="2" style="font-weight: bold; text-align: center; width: 45mm;">*Password</td>
                <td colspan="3" style="font-weight: bold; text-align: center; width: 60mm;">*Antivirus</td>
                <td width="89" rowspan="2" style="font-weight: bold; text-align: center; width: 22mm;">*File yang Tidak berkaitan dengan Pekerjaan telah dihilangkan</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 20mm;">*Windows <br> Actived</td>
                <td width="89" rowspan="2" style="font-weight: bold; text-align: center; width: 23mm;">*Software yang tidak sesuai<br>dengan daftar software<br>telah dihilangkan</td>
                <td width="100" rowspan="2" style="font-weight: bold; text-align: center; width: 23mm;">*Penggunaan Aset Pribadi</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 18mm;">*Clear<br>desk</td>
                <td width="84" rowspan="2" style="font-weight: bold; text-align: center; width: 25mm;">*Status</td>
                <td width="109" rowspan="2" style="font-weight: bold; text-align: center; width: 35mm;">Tindak Lanjut (C)</td>
            </tr>
            <tr>
              <td width="84" style="font-weight: bold; text-align: center; width: 20mm;">Min 12 Karakter</td>
              <td width="107" style="font-weight: bold; text-align: center; width: 25mm;">Kombinasi (Huruf<br>/Angka<br>/Special Character)</td>
              <td width="84" style="font-weight: bold; text-align: center; width: 20mm;"><em>Terinstall</em></td>
              <td width="84" style="font-weight: bold; text-align: center; width: 20mm;"><em>Terupdate</em></td>
              <td width="84" style="font-weight: bold; text-align: center; width: 20mm;"><em>Autoscan Schedule</em></td>
                <!-- <td style="font-weight: bold; width: 20mm; text-align: center;">Join Domain</td>
                <td style="font-weight: bold; width: 20mm; text-align: center;">Password</td> -->
                <!-- <td style="font-weight: bold; width: 20mm; text-align: center;">Screen Time</td> -->
                <!-- <td style="font-weight: bold; width: 45mm; text-align: center;">USER</td> -->
                <!-- <td style="font-weight: bold; width: 50mm; text-align: center;">IP ADDRESS</td> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            while ($r_monitoring = db2_fetch_assoc($q_monitoring2)) : ?>
                <tr>
                    <td align="center"><?= $no++;  ?></td>
                    <td align="center"><?= $r_monitoring['NO_PC_LAPTOP']; ?></td>
                    <td align="center"><?= $r_monitoring['USER']; ?></td>
                    <td align="center"><?= $r_monitoring['JENIS_PRASARANA']; ?></td>
                    <td align="center"><?= $r_monitoring['RAM']; ?></td>
                    <td align="center"><?= $r_monitoring['HD']; ?></td>
                    <td align="center"><?= $r_monitoring['OS']; ?></td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <!-- <td align="center"></td> -->
                    <!-- <td align="center"></td> -->
                    <!-- <td align="center"></td> -->
                    <!-- <td align="center"><?= $r_monitoring['IPADDRESS']; ?></td> -->
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br />

    <table style="border-collapse: collapse;">
        <colgroup>
            <col style="width: 20px;"> <!-- Kolom 1 -->
            <col style="width: 10px;"> <!-- Kolom 2 -->
            <col style="width: 150mm;"> <!-- Kolom 3 -->
        </colgroup>
        <tr>
            <td colspan="3" style="font-weight: bold;"><b>Keterangan Pengisian</b> :</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td style="text-align: center;">(A)</td>
            <td style="text-align: center;"></td>
            <td>Diisi otomatis dari sistem</td>
        </tr>
        <tr>
            <td style="text-align: center;">(B)</td>
            <td style="text-align: center;"></td>
            <td>Diisi sesuai kategori hak akses (Administrator / User)</td>
        </tr>
        <tr>
            <td style="text-align: center;">(*)</td>
            <td style="text-align: center;"></td>
            <td>Check Point sesuai kategori</td>
        </tr>
        <tr>
            <td style="text-align: center;">&check;</td>
            <td style="text-align: center;"></td>
            <td>Prasarana sesuai kategori</td>
        </tr>
        <tr>
            <td style="text-align: center;">&cross;</td>
            <td style="text-align: center;"></td>
            <td>Tidak sesuai kategori</td>
        </tr>
        <tr>
            <td style="text-align: center;">(C)</td>
            <td style="text-align: center;"></td>
            <td>Diisi sesuai kondisi aktual dan aktivitas tindak lanjut yang dilakukan</td>
        </tr>
        
        <tr>
            <td colspan="3" style="font-weight: bold; padding-top: 10px;">Catatan :</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style=" width: 20mm;">&nbsp; </td>
        </tr>
    </table>

    <!-- Garis bawah panjang -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- <td style="border-bottom: 1px solid black; height: 2px;"></td> -->
        </tr>
    </table>

    <!-- Jarak ke bawah setelah garis pertama -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td>&nbsp;</td> <!-- Menambahkan elemen kosong untuk jarak -->
        </tr>
    </table>

    <!-- Baris kedua garis bawah -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <!-- <td style="border-bottom: 1px solid black; height: 2px;"></td> -->
        </tr>
    </table>

    <!-- Jarak ke bawah setelah garis kedua -->
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td>&nbsp;</td> <!-- Menambahkan elemen kosong untuk jarak -->
        </tr>
    </table>



    <!-- Jarak ke bawah setelah garis kedua -->
<table width="100%" style="width: 100%; border-collapse: collapse;">
        <tr>
            <td>&nbsp;</td> <!-- Menambahkan elemen kosong untuk jarak -->
        </tr>
    </table>

    <table width="131%" height="142" class="table-ttd ">
        <thead>
            <tr>
                <td style="text-align: center;">&nbsp</td>
                <td style="text-align: center;">Dibuat Oleh </td>
                <td style="text-align: center;">Diketahui Oleh </td>
                <td style="text-align: center;">Diperiksa Oleh </td>
                <td style="text-align: center;">Disetujui Oleh </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
            <tr style="height: 30mm;">
                <td>Tanda Tangan</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
            </tr>
        </thead>
    </table>

</body>

</html>
