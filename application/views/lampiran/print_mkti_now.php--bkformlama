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
    @page {
        size: landscape;
        margin: 20px 20px 20px 20px;
        font-size: 11pt !important;
        font-family: Arial, Helvetica, sans-serif !important;
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

        html,
        body {
            font-family: Arial, Helvetica, sans-serif;
            width: 330mm;
            height: 210mm;
            background: #FFF;
            overflow: visible;
        }

        .table-ttd {
            border-collapse: collapse;
            width: 100%;
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

    .table-ttd {
        border-collapse: collapse;
        width: 100%;
        font-size: 11pt !important;
        font-family: Arial, Helvetica, sans-serif;
        /* width: 265mm; */
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
    <table class="table-ttd">
        <tr>
            <td align="center"><img src="<?php echo base_url() ?>/assets/images/logoitti.png" alt="" style="width: 15mm;"></td>
            <td align="center">
                <h2 style="font-weight: bold;">MONITORING KEBIJAKAN TI </h2>
            </td>
            <td align="left" valign="middle" style="width: 80mm; font-family: Arial, sans-serif; font-size: 12px;">
                <ul style="list-style-type: none; padding: 0; margin: 0;">
                    <li style="display: grid; grid-template-columns: 20mm auto;">
                        <span>No. Form</span><span>: FW-14-DIT-05</span>
                    </li>
                    <li style="display: grid; grid-template-columns: 20mm auto;">
                        <span>No. Revisi</span><span>: 05</span>
                    </li>
                    <li style="display: grid; grid-template-columns: 20mm auto;">
                        <span>Tgl. Terbit</span><span>: 28 April 2025</span>
                    </li>
                </ul>
            </td>

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
    <span>: <?= $data_monitoring['DEPT'] ?></span>
</p>
<p style="font-family: Arial, Helvetica, sans-serif; display: flex; margin: 0;">
    <span style="width: 120px;">Hari, Tanggal</span>
    <span>: </span>
</p>

    <table class="table-ttd">
        <thead>
            <tr>
                <td style="font-weight: bold; text-align: center; width: 10mm;" rowspan="2">NO.</td>
                <td style="font-weight: bold; text-align: center; width: 20mm;" rowspan="2">Kode Prasarana</td>
                <td style="font-weight: bold; text-align: center; width: 20mm;" rowspan="2">User</td>
                <td style="font-weight: bold; text-align: center; width: 20mm;" rowspan="2">Jenis Prasarana</td>
                <td style="font-weight: bold; text-align: center;" colspan="13">CHECK POINT</td>
            </tr>
            <tr>
                <!-- <td style="font-weight: bold; width: 20mm; text-align: center;">Join Domain</td>
                <td style="font-weight: bold; width: 20mm; text-align: center;">Password</td> -->
                <td style="font-weight: bold; width: 10mm; text-align: center;">Vpn (Laptop)</td>
                <td style="font-weight: bold; width: 17mm; text-align: center;">Disable USB</td>
                <td style="font-weight: bold; width: 17mm; text-align: center;">Data File</td>
                <!-- <td style="font-weight: bold; width: 20mm; text-align: center;">Screen Time</td> -->
                <td style="font-weight: bold; width: 17mm; text-align: center;">AV</td>
                <td style="font-weight: bold; width: 10mm; text-align: center;">RAM</td>
                <td style="font-weight: bold; width: 10mm; text-align: center;">HD</td>
                <td style="font-weight: bold; width: 10mm; text-align: center;">OS</td>
                <!-- <td style="font-weight: bold; width: 45mm; text-align: center;">USER</td> -->
                <!-- <td style="font-weight: bold; width: 50mm; text-align: center;">IP ADDRESS</td> -->
                <td style="font-weight: bold; text-align: center; width: 90mm;">NOTES</td>
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
                    <!-- <td align="center"></td> -->
                    <!-- <td align="center"></td> -->
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <!-- <td align="center"></td> -->
                    <td align="center"></td>
                    <td align="center"><?= $r_monitoring['RAM']; ?></td>
                    <td align="center"><?= $r_monitoring['HD']; ?></td>
                    <td align="center"><?= $r_monitoring['OS']; ?></td>
                    <!-- <td align="center"><?= $r_monitoring['IPADDRESS']; ?></td> -->
                    <td align="center">&nbsp;</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br />

    <table style="border-collapse: collapse;">
        <colgroup>
            <col style="width: 20px;"> <!-- Kolom 1 -->
            <col style="width: 10px;"> <!-- Kolom 2 -->
            <col style="width: 100mm;"> <!-- Kolom 3 -->
        </colgroup>
        <tr>
            <td colspan="3" style="font-weight: bold;">*)Keterangan :</td>
        </tr>
        <tr>
            <td colspan="3" style="font-weight: bold;">Ketentuan Pengisian Check Point</td>
        </tr>
        <tr>
            <td style="text-align: center;">&check;</td>
            <td style="text-align: center;">:</td>
            <td>Prasarana Sesuai Kategori</td>
        </tr>
        <tr>
            <td style="text-align: center;">&times;</td>
            <td style="text-align: center;">:</td>
            <td>Tidak Sesuai Kategori</td>
        </tr>
        <tr>
            <td colspan="3" style="font-weight: bold; padding-top: 10px;">Catatan :</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style=" width: 20mm;"> &nbsp;</td>
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
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td>&nbsp;</td> <!-- Menambahkan elemen kosong untuk jarak -->
        </tr>
    </table>

    <table class="table-ttd ">
        <thead>
            <tr>
                <td style="text-align: center;">&nbsp</td>
                <td style="text-align: center;">Dibuat Oleh :</td>
                <td style="text-align: center;">Diketahui Oleh :</td>
                <td style="text-align: center;">Diperiksa Oleh :</td>
                <td style="text-align: center;">Mengetahui :</td>
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