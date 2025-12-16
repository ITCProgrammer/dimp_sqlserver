<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Troubleshouting ::DIT Inventory System</title>
    <style type="text/css">
        body {
            margin-left: 10px;
            margin-top: 10px;
        }

        a:link {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #CD6205;
            text-decoration: none;
        }

        a:visited {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #CD6200;
            text-decoration: none;
        }

        a:hover {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #0E1148;

            border-bottom: 1pt dotted #0E1148;
        }

        a:active {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #000000;
            text-decoration: none;
        }

        .boldcen10putih {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10pt;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
        }

        .tombol {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: black;
            font-weight: bold;
            background-color: #6582AA;
            border: 1px solid #006666;
            text-decoration: none;
        }

        .bold333 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #333333;
        }

        .normal333 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #333333;
        }

        .boldCD6 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #CD6200;
        }

        .normalCD6 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #CD6200;
        }

        .blod9black {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #000000;
        }

        .blod9blackunder {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #000000;
            text-decoration: underline;
        }

        .normal9black {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #000000;
        }

        .txttengah9black {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #000000;
            background-image: url("../images/bgtxt.jpg");
            background-color: #FFFFFF;
            background-repeat: repeat-x;
        }

        .txttengah9frame {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #000000;
            background-image: url("../images/bgtxt.jpg");
            background-color: #FFFFFF;
            background-repeat: repeat-x;
            background-attachment: fixed;
        }

        .normal7black {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 8pt;
            font-weight: normal;
            color: #000000;
            text-align: justify;
        }

        .normal7blackasli {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 7pt;
            font-weight: normal;
            color: #000000;
            text-align: left;
        }

        .normal7kuning {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 8pt;
            font-weight: normal;
            color: #FCE80F;
            text-align: justify;
        }

        .blod9white {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #FFFFFF;
            text-align: left;
        }

        .blodwhite {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 7.12pt;
            font-weight: bold;
            color: #FFFFFF;
        }

        .blod9whiterg {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: bold;
            color: #FFFFFF;
            text-align: right;
        }

        .normal9white {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            font-weight: normal;
            color: #FFFFFF;
        }

        .normal8white {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 8pt;
            font-weight: normal;
            color: #FFFFFF;
        }

        .bgweb {
            background: #FFFFFF url(../images/bg-kiri.gif) repeat-y;
        }

        /*** ABOUT MENU ***/
        .menubawah {
            margin: 0;
            padding-bottom: 2px;
        }

        .menubawah a,
        .menubawah a:visited {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #ff6600;
            font-weight: bold;

        }

        .menubawah a:link {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #ff6600;
            font-weight: bold;
        }

        .menubawah a:hover {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #ffffff;

            border-bottom: 1pt dotted #ffffff;

        }

        .menubawah a:active {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #ffffff;
            font-weight: bold;
        }

        -->-->

        /*** ABOUT MENU STATISTIK ***/
        .menustat {
            margin: 0;
            padding-bottom: 2px;
        }

        .menustat a,
        .menustat a:visited {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #000000;
            text-decoration: none;
            font-weight: normal;

        }

        .menustat a:hover {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9pt;
            color: #6682AA;
            text-decoration: none;
            border-bottom: 1pt dotted #0E1148;
        }

        .bodigar {
            margin-top: 0px;
            margin-bottom: 0px;
            background-image: url("../images/bg-kiri.gif");
            background-color: #666666;
            background-repeat: repeat-y;
        }
    </style>
    <link href="home.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <?php
        if ($type == 'Semua') {
            $where_kategori = "(p.BREAKDOWNTYPE = 'HD' OR p.BREAKDOWNTYPE = 'NW' OR p.BREAKDOWNTYPE = 'EM' OR p.BREAKDOWNTYPE = 'ERP')";
        } else {
            $where_kategori = "p.BREAKDOWNTYPE = '$type'";
        }
        $q_opentiket = db2_exec($conn1, "SELECT 
											p3.CREATIONUSER AS PEMBUAT,
											p.CODE AS NOMOR_TIKET,
											d.SHORTDESCRIPTION,
											p.CREATIONDATETIME AS TGL_OPEN,
											p3.STARTDATE AS TGL_FOLLOWUP,
											p3.ENDDATE AS TGL_CLOSE,
											LISTAGG(TRIM(LEFT(I.ACTIVITYCODE,9)), ', ') AS ACTIVITYCODE,
                                            p3.ASSIGNEDTOUSERID AS CLOSETIKET,
											CASE
												WHEN a1.VALUESTRING = 1 THEN 'BERAT'
												WHEN a1.VALUESTRING = 2 THEN 'RINGAN'
												ELSE ''
											END AS JENIS_KERUSAKAN,
											p3.REMARKS AS KETERANGAN,
                                            SUBSTRING(
                                                ad.OPTIONS, 
                                                POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2,
                                                POSITION(';' IN SUBSTRING(ad.OPTIONS, POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2)) - 1
                                            ) AS ALASAN_KETERLAMBATAN,
                                            SUBSTRING(
                                                ad2.OPTIONS, 
                                                POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2,
                                                POSITION(';' IN SUBSTRING(ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2)) - 1
                                            ) AS PRIORITAS_TIKET
										FROM
											PMBREAKDOWNENTRY p
										LEFT JOIN PMWORKORDER p3 ON	p3.PMBREAKDOWNENTRYCODE = p.CODE
										LEFT JOIN ADSTORAGE a1 ON a1.UNIQUEID = p3.ABSUNIQUEID	AND a1.FIELDNAME = 'JenisKerusakan'
										LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
										LEFT JOIN PMWORKORDERDETAIL I ON I.PMWORKORDERCODE = p3.CODE
                                        LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p3.ABSUNIQUEID AND a2.FIELDNAME = 'PenyebabKeterlambatan'
                                        LEFT JOIN ADADDITIONALDATA ad ON ad.NAME = a2.FIELDNAME
                                        LEFT JOIN ADSTORAGE a3 ON a3.UNIQUEID = p.ABSUNIQUEID AND a3.FIELDNAME = 'PrioritasTicket'
                                        LEFT JOIN ADADDITIONALDATA ad2 ON ad2.NAME = a3.FIELDNAME 
										WHERE
												$where_kategori 
											AND p.BREAKDOWNTYPE != 'ERP' 
											AND SUBSTR ( p.CREATIONDATETIME, 1, 10 ) BETWEEN '$date1' 
											AND '$date2'
                                            -- AND LEFT(p.CODE,4) = 'BDIT'
                                            -- AND a1.VALUESTRING = 2
										GROUP BY 
											p.CODE,
											d.SHORTDESCRIPTION,
											p.CREATIONDATETIME,
											p3.STARTDATE,
											p3.ENDDATE,
											a1.VALUESTRING,
											p3.REMARKS,
											p3.CREATIONUSER,
                                            p3.ASSIGNEDTOUSERID,
                                            ad.OPTIONS,
	                                        a2.VALUESTRING,
                                            ad2.OPTIONS,
	                                        a3.VALUESTRING
										ORDER BY
											p.CREATIONDATETIME ASC");

        ?>
        <tr>
            <td>
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="150" align="center" valign="middle"><img src="<?= base_url(); ?>assets\images\ITTI_Logo Option_Logogram ITTI.png" width="68" height="68" /></td>
                        <td align="center" valign="middle" class="blod9blackunder">LAPORAN OPEN TICKET</td>
                        <td width="250" align="center" valign="middle">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="180" align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<span class="blod9black">Departemen</span></td>
                        <td width="150" align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<?php echo ''; ?></td>
                        <td width="130" align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<span class="blod9black">Periode</span></td>
                        <td align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<?= $date1; ?> s/d <?= $date2; ?></td>
                    </tr>
                    <tr>
                        <td width="180" align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<span class="blod9black">Admin</span></td>
                        <td align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<?php echo ''; ?></td>
                        <td width="130" align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<span class="blod9black">Status</span></td>
                        <td align="left" valign="middle" class="normal9black">&nbsp;&nbsp;<?php echo ''; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td height="100" align="left" valign="top" class="normal9black ml-2">
                            <br>
                            Kategori : <?= $type; ?>
                            <hr><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <STRONG>PENCAPAIAN SASARAN MUTU TROBLESHOUTING DEPARTEMEN DATA & INFORMATIKA</STRONG>
                            <br><br>
                            <table width="95%" style="border:1px solid black; border-collapse:collapse;">
                                <thead>
                                    <tr class="tombol">
                                        <th width="2%" style="border:1px solid black;">No.</th>
                                        <th width="15%" style="border:1px solid black;">Nomor Ticket</th>
                                        <th width="15%" style="border:1px solid black;">Dept</th>
                                        <th width="12%" style="border:1px solid black;">Tgl Open</th>
                                        <th width="12%" style="border:1px solid black;">Tgl Follow Up</th>
                                        <th width="12%" style="border:1px solid black;">Tgl Close</th>
                                        <th width="15%" style="border:1px solid black;">Waktu Follow Up</th>
                                        <th width="15%" style="border:1px solid black;">Waktu Close</th>
                                        <th width="5%" style="border:1px solid black;">Jenis</th>
                                        <th width="18%" style="border:1px solid black;">Keterangan</th>
                                        <th width="18%" style="border:1px solid black;">Creator</th>
                                        <th width="18%" style="border:1px solid black;">Alasan Keterlambatan</th>
                                    </tr>
                                </thead>
                                <?php $no = 1;
                                while ($row_opentiket = db2_fetch_assoc($q_opentiket)) : ?>
                                    <?php

                                    $mulai_waktu_followup      = date_create($row_opentiket['TGL_OPEN']);
                                    $selesai_waktu_followup    = date_create($row_opentiket['TGL_FOLLOWUP']);

                                    $total_waktu_followup      = date_diff($mulai_waktu_followup, $selesai_waktu_followup);

                                    $mulai_waktu_close      = date_create($row_opentiket['TGL_FOLLOWUP']);
                                    $selesai_waktu_close    = date_create($row_opentiket['TGL_CLOSE']);

                                    $total_waktu_close      = date_diff($mulai_waktu_close, $selesai_waktu_close);

                                    if ($row_opentiket['TGL_FOLLOWUP']) {
                                        $waktu_follow_up    = $total_waktu_followup->d . ' Hari ' . $total_waktu_followup->h . ' Jam ' . $total_waktu_followup->i . ' Menit ';
                                        $waktu_close        = $total_waktu_close->d . ' Hari ' . $total_waktu_close->h . ' Jam ' . $total_waktu_close->i . ' Menit ';
                                    } else {
                                        $waktu_follow_up    = '';
                                        $waktu_close        = '';
                                    }

                                    ?>
                                    <tbody>
                                        <tr>
                                            <td style="border:1px solid black;"><?= $no++; ?></td>
                                            <td style="border:1px solid black; <?php if ($row_opentiket['PRIORITAS_TIKET'] == 'Urgent') {
                                                                                    echo 'background-color: #f25a5a;';
                                                                                } ?>"><?= $row_opentiket['NOMOR_TIKET'] ?></td>
                                            <td style="border:1px solid black;"><?= $row_opentiket['SHORTDESCRIPTION'] ?></td>
                                            <td style="border:1px solid black;"><?= substr($row_opentiket['TGL_OPEN'], 0, 10) ?> <?= substr($row_opentiket['TGL_OPEN'], 11, 8) ?></td>
                                            <td style="border:1px solid black;"><?= substr($row_opentiket['TGL_FOLLOWUP'], 0, 10) ?> <?= substr($row_opentiket['TGL_FOLLOWUP'], 11, 8) ?></td>
                                            <td style="border:1px solid black;"><?= substr($row_opentiket['TGL_CLOSE'], 0, 10) ?> <?= substr($row_opentiket['TGL_CLOSE'], 11, 8) ?></td>
                                            <td <?php if ($total_waktu_followup->h > 0 || $total_waktu_followup->d > 0 || $total_waktu_followup->h > 0 && $total_waktu_followup->h > 0) {
                                                    echo 'style="border:1px solid black; background-color: #92C7CF;"';
                                                } else {
                                                    echo 'style="border:1px solid black;"';
                                                } ?>><?= $waktu_follow_up; ?></td>
                                            <td <?php if ($row_opentiket['JENIS_KERUSAKAN'] == 'RINGAN' && $total_waktu_close->h > 2 || $row_opentiket['JENIS_KERUSAKAN'] == 'RINGAN' && $total_waktu_close->d > 0 || $row_opentiket['JENIS_KERUSAKAN'] == 'RINGAN' && $total_waktu_close->d > 0 && $row_opentiket['JENIS_KERUSAKAN'] == 'RINGAN' && $total_waktu_close->h > 2) {
                                                    echo 'style="border:1px solid black; background-color: #FFF455;"';
                                                } else if ($row_opentiket['JENIS_KERUSAKAN'] == 'BERAT' && $total_waktu_close->h > 4 || $row_opentiket['JENIS_KERUSAKAN'] == 'BERAT' && $total_waktu_close->d > 0) {
                                                    echo 'style="border:1px solid black; background-color: red;"';
                                                } else {
                                                    echo ' style="border:1px solid black;"';
                                                } ?>><?= $waktu_close; ?></td>

                                            <td style="border:1px solid black;">
                                                <?php if (strtotime($row_opentiket['TGL_OPEN']) < strtotime('2024-10-01')) : ?>
                                                    <?= $row_opentiket['JENIS_KERUSAKAN'] ?>
                                                <?php else: ?>
                                                    <?php
                                                    // Pisahkan ACTIVITYCODE menjadi array dan hilangkan spasi ekstra
                                                    $activityCodes = array_map('trim', explode(', ', $row_opentiket['ACTIVITYCODE']));

                                                    // Hitung jumlah kemunculan 'DITKMAYOR' di array
                                                $countDITKMAYOR = count(array_filter($activityCodes, function($code) {
                                                        return $code === 'DITKMAYOR';
                                                    }));

                                                    // Jika ada lebih dari satu kemunculan 'DITKMAYOR' atau ada data selain 'DITKMAYOR'
                                                    if ($countDITKMAYOR > 1 || in_array('DITKMAYOR', $activityCodes)) {
                                                        echo 'BERAT';
                                                    } else {
                                                        echo 'RINGAN';
                                                    }
                                                    ?>
                                                <?php endif; ?>

                                            </td>
                                            <td style="border:1px solid black;"><?= $row_opentiket['KETERANGAN'] ?></td>
                                            <td style="border:1px solid black;"><?= $row_opentiket['CLOSETIKET'] ?></td>
                                            <td style="border:1px solid black;"><?= $row_opentiket['ALASAN_KETERLAMBATAN'] ?></td>
                                        </tr>
                                    </tbody>
                                <?php endwhile; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <hr>
                <br>
                <?php
                $q_jumlah_masalah = db2_exec($conn1, "SELECT
                                                            COUNT(*) AS JUMLAH_MASALAH
                                                        FROM
                                                            PMBREAKDOWNENTRY p
                                                        LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE 
                                                        -- LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
                                                        -- LEFT JOIN ADSTORAGE a1 ON a1.UNIQUEID = p3.ABSUNIQUEID AND a1.FIELDNAME = 'JenisKerusakan'
                                                        WHERE
                                                            $where_kategori
                                                            AND  p.BREAKDOWNTYPE != 'ERP'
                                                            AND SUBSTR(p.CREATIONDATETIME, 1, 10) BETWEEN '$date1' AND '$date2'
                                                            -- AND LEFT(p.CODE,4) = 'BDIT'
                                                            ");
                $row_jumlah_masalah = db2_fetch_assoc($q_jumlah_masalah);
                $jumlah_masalah = $row_jumlah_masalah['JUMLAH_MASALAH'];

                $query_jumlah_follow = db2_exec($conn1, "SELECT 
                                                            COUNT(*) AS TOTAL_FOLLOW
                                                        FROM
                                                            PMBREAKDOWNENTRY p
                                                            LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
                                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE 
                                                        WHERE
                                                            $where_kategori
                                                            AND  p.BREAKDOWNTYPE != 'ERP'
                                                            AND DATE(p.CREATIONDATETIME) BETWEEN DATE('$date1') AND DATE('$date2')
                                                            AND (EXTRACT(DAY FROM p3.STARTDATE - p.CREATIONDATETIME) > 0 OR HOUR(TIMESTAMP(p3.STARTDATE) - TIMESTAMP(p.CREATIONDATETIME)) > 0
                                                            OR EXTRACT(DAY FROM p3.STARTDATE - p.CREATIONDATETIME) > 0 AND HOUR(TIMESTAMP(p3.STARTDATE) - TIMESTAMP(p.CREATIONDATETIME)) > 0)");
                $row_jumlah_follow = db2_fetch_assoc($query_jumlah_follow);
                $jumlah_follow = $row_jumlah_follow['TOTAL_FOLLOW'];


                $query_jumlah_close_3_jam = db2_exec($conn1, "SELECT 
                                                                    COUNT(*) AS Total_CLOSE_3_JAM
                                                                    
                                                                FROM
                                                                    PMBREAKDOWNENTRY p
                                                                    LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
                                                                    LEFT JOIN ADSTORAGE a1 ON a1.UNIQUEID = p3.ABSUNIQUEID AND a1.FIELDNAME = 'JenisKerusakan'
                                                                    LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                                WHERE
                                                                $where_kategori
                                                                AND  p.BREAKDOWNTYPE != 'ERP'
                                                                AND a1.VALUESTRING = '2' /* JENIS_KERUSAKAN = 'Ringan' */
                                                                AND DATE(p.CREATIONDATETIME) BETWEEN DATE('$date1') AND DATE('$date2')
                                                                AND ((EXTRACT(DAY FROM p3.ENDDATE - p3.STARTDATE)) > 0
                                                                OR HOUR(TIMESTAMP(p3.ENDDATE) - TIMESTAMP(p3.STARTDATE)) > 2
                                                                    OR (EXTRACT(DAY FROM p3.ENDDATE - p3.STARTDATE)) > 0
                                                                    AND HOUR(TIMESTAMP(p3.ENDDATE) - TIMESTAMP(p3.STARTDATE)) > 2)");

                $row_jumlah_close_3_jam = db2_fetch_assoc($query_jumlah_close_3_jam);
                $jumlah_close_3 = $row_jumlah_close_3_jam['TOTAL_CLOSE_3_JAM'];

                if (strtotime($date1) < strtotime('2024-10-01')) {
                    $StringMayor    = "AND a1.VALUESTRING = '1'";
                    $StringJoin     = "";
                } else {
                    $StringMayor    = "AND TRIM(LEFT(I.ACTIVITYCODE,9)) = 'DITKMAYOR'";
                    $StringJoin     = "LEFT JOIN PMWORKORDERDETAIL I ON I.PMWORKORDERCODE = p3.CODE";
                }

                $query_jumlah_close_5_jam = db2_exec($conn1, "SELECT 
                                                                COUNT(*) AS Total_CLOSE_5_JAM
                                                            FROM
                                                                PMBREAKDOWNENTRY p
                                                                LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
                                                                LEFT JOIN ADSTORAGE a1 ON a1.UNIQUEID = p3.ABSUNIQUEID AND a1.FIELDNAME = 'JenisKerusakan'
                                                                LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                                                $StringJoin
                                                            WHERE
                                                                $where_kategori
                                                                AND  p.BREAKDOWNTYPE != 'ERP'
                                                                $StringMayor
                                                                AND DATE(p.CREATIONDATETIME) BETWEEN DATE('$date1') AND DATE('$date2')
                                                                AND ((EXTRACT(DAY FROM p3.ENDDATE - p3.STARTDATE)) > 0
                                                                OR HOUR(TIMESTAMP(p3.ENDDATE) - TIMESTAMP(p3.STARTDATE)) > 4
                                                                OR (EXTRACT(DAY FROM p3.ENDDATE - p3.STARTDATE)) > 0
                                                                AND HOUR(TIMESTAMP(p3.ENDDATE) - TIMESTAMP(p3.STARTDATE)) > 4)");

                $row_jumlah_close_5_jam = db2_fetch_assoc($query_jumlah_close_5_jam);
                $jumlah_close_5 = $row_jumlah_close_5_jam['TOTAL_CLOSE_5_JAM'];

                $q_jumlah_masalah_ringan = db2_exec($conn1, "SELECT DISTINCT
                                                                    COUNT (*) AS JUMLAH_MASALAH
                                                                FROM
                                                                    (
                                                                    SELECT
                                                                        p3.CREATIONUSER AS PEMBUAT,
                                                                        p.CODE AS NOMOR_TIKET,
                                                                        d.SHORTDESCRIPTION,
                                                                        p.CREATIONDATETIME AS TGL_OPEN,
                                                                        p3.STARTDATE AS TGL_FOLLOWUP,
                                                                        p3.ENDDATE AS TGL_CLOSE,
                                                                        -- LISTAGG(TRIM(LEFT(I.ACTIVITYCODE, 9)),
                                                                        -- ', ') AS ACTIVITYCODE,   --menghindari duplikat activity
                                                                        CASE
                                                                            WHEN p.CREATIONDATETIME < '2024-10-01'
                                                                            AND a1.VALUESTRING = 1 THEN 'BERAT'
                                                                            WHEN p.CREATIONDATETIME < '2024-10-01'
                                                                            AND a1.VALUESTRING = 2 THEN 'RINGAN'
                                                                            WHEN p.CREATIONDATETIME >= '2024-10-01'
                                                                            AND INSTR(LISTAGG(TRIM(LEFT(I.ACTIVITYCODE, 9)), ', '), 'DITKMAYOR') > 0 THEN 'BERAT' --menghindari duplikat activity LISTAGG
                                                                            --	WHEN p.CREATIONDATETIME >= '2024-10-01' a1.VALUESTRING = 2 THEN 'RINGAN'
                                                                            ELSE 'RINGAN'
                                                                        END AS JENIS_KERUSAKAN,
                                                                        p3.REMARKS AS KETERANGAN,
                                                                        SUBSTRING(
                                                                ad.OPTIONS, 
                                                                POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2,
                                                                POSITION(';' IN SUBSTRING(ad.OPTIONS, POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2)) - 1
                                                                ) AS ALASAN_KETERLAMBATAN,
                                                                        SUBSTRING(
                                                                ad2.OPTIONS, 
                                                                POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2,
                                                                POSITION(';' IN SUBSTRING(ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2)) - 1
                                                                ) AS PRIORITAS_TIKET
                                                                    FROM
                                                                        PMBREAKDOWNENTRY p
                                                                    LEFT JOIN PMWORKORDER p3 ON
                                                                        p3.PMBREAKDOWNENTRYCODE = p.CODE
                                                                    LEFT JOIN ADSTORAGE a1 ON
                                                                        a1.UNIQUEID = p3.ABSUNIQUEID
                                                                        AND a1.FIELDNAME = 'JenisKerusakan'
                                                                    LEFT JOIN DEPARTMENT d ON
                                                                        d.CODE = p.DEPARTMENTCODE
                                                                    LEFT JOIN PMWORKORDERDETAIL I ON
                                                                        I.PMWORKORDERCODE = p3.CODE
                                                                    LEFT JOIN ADSTORAGE a2 ON
                                                                        a2.UNIQUEID = p3.ABSUNIQUEID
                                                                        AND a2.FIELDNAME = 'PenyebabKeterlambatan'
                                                                    LEFT JOIN ADADDITIONALDATA ad ON
                                                                        ad.NAME = a2.FIELDNAME
                                                                    LEFT JOIN ADSTORAGE a3 ON
                                                                        a3.UNIQUEID = p.ABSUNIQUEID
                                                                        AND a3.FIELDNAME = 'PrioritasTicket'
                                                                    LEFT JOIN ADADDITIONALDATA ad2 ON
                                                                        ad2.NAME = a3.FIELDNAME
                                                                    WHERE
                                                                     $where_kategori
                                                                        AND p.BREAKDOWNTYPE != 'ERP'
                                                                        AND SUBSTR ( p.CREATIONDATETIME,
                                                                        1,
                                                                        10 ) BETWEEN '$date1' AND '$date2'
                                                                        -- AND LEFT(p.CODE, 4) = 'BDIT'
                                                                        --AND a1.VALUESTRING = 2
                                                                    GROUP BY
                                                                        p.CODE,
                                                                        d.SHORTDESCRIPTION,
                                                                        p.CREATIONDATETIME,
                                                                        p3.STARTDATE,
                                                                        p3.ENDDATE,
                                                                        a1.VALUESTRING,
                                                                        -- I.ACTIVITYCODE, //menghindari duplikat activity
                                                                        p3.REMARKS,
                                                                        p3.CREATIONUSER,
                                                                        ad.OPTIONS,
                                                                        a2.VALUESTRING,
                                                                        ad2.OPTIONS,
                                                                        a3.VALUESTRING
                                                                    ORDER BY
                                                                        p.CREATIONDATETIME ASC ) d
                                                                WHERE
                                                                    d.JENIS_KERUSAKAN = 'RINGAN'");
                $row_jumlah_masalah_ringan = db2_fetch_assoc($q_jumlah_masalah_ringan);
                

                $q_jumlah_masalah_berat = db2_exec($conn1, "SELECT
                                                                COUNT (*) AS JUMLAH_MASALAH
                                                            FROM
                                                                (
                                                                SELECT  
                                                                    p3.CREATIONUSER AS PEMBUAT,
                                                                    p.CODE AS NOMOR_TIKET,
                                                                    d.SHORTDESCRIPTION,
                                                                    p.CREATIONDATETIME AS TGL_OPEN,
                                                                    p3.STARTDATE AS TGL_FOLLOWUP,
                                                                    p3.ENDDATE AS TGL_CLOSE,
                                                                    -- LISTAGG(TRIM(LEFT(I.ACTIVITYCODE, 9)),
                                                                    -- ', ') AS ACTIVITYCODE,
                                                                    CASE
                                                                        WHEN p.CREATIONDATETIME < '2024-10-01'
                                                                        AND a1.VALUESTRING = 1 THEN 'BERAT'
                                                                        WHEN p.CREATIONDATETIME < '2024-10-01'
                                                                        AND a1.VALUESTRING = 2 THEN 'RINGAN'
                                                                        WHEN p.CREATIONDATETIME >= '2024-10-01'
                                                                        AND INSTR(LISTAGG(TRIM(LEFT(I.ACTIVITYCODE, 9)), ', '), 'DITKMAYOR') > 0 THEN 'BERAT'
                                                                        -- WHEN p.CREATIONDATETIME >= '2024-10-01' a1.VALUESTRING = 2 THEN 'RINGAN' 
                                                                        ELSE 'RINGAN'
                                                                    END AS JENIS_KERUSAKAN,
                                                                    p3.REMARKS AS KETERANGAN,
                                                                    SUBSTRING( ad.OPTIONS, POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2, POSITION(';' IN SUBSTRING(ad.OPTIONS, POSITION(';' || a2.VALUESTRING || '=' IN ad.OPTIONS) + LENGTH(a2.VALUESTRING) + 2)) - 1 ) AS ALASAN_KETERLAMBATAN,
                                                                    SUBSTRING( ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2, POSITION(';' IN SUBSTRING(ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2)) - 1 ) AS PRIORITAS_TIKET
                                                                FROM
                                                                    PMBREAKDOWNENTRY p
                                                                LEFT JOIN PMWORKORDER p3 ON
                                                                    p3.PMBREAKDOWNENTRYCODE = p.CODE
                                                                LEFT JOIN ADSTORAGE a1 ON
                                                                    a1.UNIQUEID = p3.ABSUNIQUEID
                                                                    AND a1.FIELDNAME = 'JenisKerusakan'
                                                                LEFT JOIN DEPARTMENT d ON
                                                                    d.CODE = p.DEPARTMENTCODE
                                                                LEFT JOIN PMWORKORDERDETAIL I ON
                                                                    I.PMWORKORDERCODE = p3.CODE
                                                                LEFT JOIN ADSTORAGE a2 ON
                                                                    a2.UNIQUEID = p3.ABSUNIQUEID
                                                                    AND a2.FIELDNAME = 'PenyebabKeterlambatan'
                                                                LEFT JOIN ADADDITIONALDATA ad ON
                                                                    ad.NAME = a2.FIELDNAME
                                                                LEFT JOIN ADSTORAGE a3 ON
                                                                    a3.UNIQUEID = p.ABSUNIQUEID
                                                                    AND a3.FIELDNAME = 'PrioritasTicket'
                                                                LEFT JOIN ADADDITIONALDATA ad2 ON
                                                                    ad2.NAME = a3.FIELDNAME
                                                                WHERE
                                                                    $where_kategori
                                                                    AND p.BREAKDOWNTYPE != 'ERP'
                                                                    AND SUBSTR ( p.CREATIONDATETIME,
                                                                        1,
                                                                        10 ) BETWEEN '$date1' AND '$date2'
                                                                    AND LEFT(p.CODE, 4) = 'BDIT'
                                                                    --AND a1.VALUESTRING = 2 
                                                                GROUP BY
                                                                    p.CODE,
                                                                    d.SHORTDESCRIPTION,
                                                                    p.CREATIONDATETIME,
                                                                    p3.STARTDATE,
                                                                    p3.ENDDATE,
                                                                    a1.VALUESTRING,
                                                                    -- I.ACTIVITYCODE,
                                                                    p3.REMARKS,
                                                                    p3.CREATIONUSER,
                                                                    ad.OPTIONS,
                                                                    a2.VALUESTRING,
                                                                    ad2.OPTIONS,
                                                                    a3.VALUESTRING
                                                                ORDER BY
                                                                    p.CREATIONDATETIME ASC ) d
                                                            WHERE
                                                                d.JENIS_KERUSAKAN = 'BERAT'");


                $row_jumlah_masalah_berat = db2_fetch_assoc($q_jumlah_masalah_berat);

                $jumlah_urgent_tiket = db2_exec($conn1,"SELECT COUNT(*) as URGENT 
                -- SUBSTRING(
                --     ad2.OPTIONS, 
                --     POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2,
                --     POSITION(';' IN SUBSTRING(ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2)) - 1
                -- ) AS PRIORITAS_TIKET,
                -- a3.VALUESTRING,
                -- p.IDENTIFIEDDATE AS waktu_buat,
                -- p3.STARTDATE AS waktu_followup,
                -- CASE 
                --     WHEN TIMESTAMPDIFF(4, CHAR(p3.STARTDATE - p.IDENTIFIEDDATE)) <= 30 THEN 0
                --     ELSE 1
                -- END AS selisih,
                -- P.CODE,
                -- P.BREAKDOWNTYPE
                FROM
                PMBREAKDOWNENTRY p
                LEFT JOIN PMWORKORDER p3 ON
                p3.PMBREAKDOWNENTRYCODE = p.CODE
                LEFT JOIN ADSTORAGE a3 ON
                a3.UNIQUEID = p.ABSUNIQUEID
                AND a3.FIELDNAME = 'PrioritasTicket'
                LEFT JOIN ADADDITIONALDATA ad2 ON
                ad2.NAME = a3.FIELDNAME
                WHERE
                (p.BREAKDOWNTYPE = 'HD'
                OR p.BREAKDOWNTYPE = 'NW'
                OR p.BREAKDOWNTYPE = 'EM'
                OR p.BREAKDOWNTYPE = 'ERP')
                AND p.BREAKDOWNTYPE != 'ERP'
                AND DATE(p.CREATIONDATETIME) BETWEEN DATE('$date1') AND DATE('$date2')
                AND a3.VALUESTRING = '2'");
                $jumlah_urgent = db2_fetch_assoc($jumlah_urgent_tiket);
                $jumlah_urgent1 = isset($jumlah_urgent['URGENT']) ? $jumlah_urgent['URGENT'] : 0;

                



                $query_count_urgent = db2_exec($conn1, "SELECT
                                                        COUNT(*) as SELESIH_DATA
                                                        FROM(
                                                        SELECT
                                                            SUBSTRING(
                                                                ad2.OPTIONS, 
                                                                POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2,
                                                                POSITION(';' IN SUBSTRING(ad2.OPTIONS, POSITION(';' || a3.VALUESTRING || '=' IN ad2.OPTIONS) + LENGTH(a3.VALUESTRING) + 2)) - 1
                                                            ) AS PRIORITAS_TIKET,
                                                            a3.VALUESTRING,
                                                            p.IDENTIFIEDDATE AS waktu_buat,
                                                            p3.STARTDATE AS waktu_followup,
                                                            P.CODE,
                                                            P.BREAKDOWNTYPE
                                                        FROM
                                                            PMBREAKDOWNENTRY p
                                                        LEFT JOIN PMWORKORDER p3 ON
                                                            p3.PMBREAKDOWNENTRYCODE = p.CODE
                                                        LEFT JOIN ADSTORAGE a3 ON
                                                            a3.UNIQUEID = p.ABSUNIQUEID
                                                            AND a3.FIELDNAME = 'PrioritasTicket'
                                                        LEFT JOIN ADADDITIONALDATA ad2 ON
                                                            ad2.NAME = a3.FIELDNAME
                                                        WHERE
                                                            (p.BREAKDOWNTYPE = 'HD'
                                                                OR p.BREAKDOWNTYPE = 'NW'
                                                                OR p.BREAKDOWNTYPE = 'EM'
                                                                OR p.BREAKDOWNTYPE = 'ERP')
                                                            AND p.BREAKDOWNTYPE != 'ERP'
                                                            AND DATE(p.CREATIONDATETIME) BETWEEN DATE('$date1') AND DATE('$date2')
                                                            AND a3.VALUESTRING = '2'
                                                            AND (
                                                            EXTRACT(DAY FROM p3.STARTDATE - p.IDENTIFIEDDATE) * 24 * 60
                                                            -- Menghitung selisih hari dalam menit
                                                            + EXTRACT(HOUR FROM p3.STARTDATE - p.IDENTIFIEDDATE) * 60
                                                            -- Menghitung selisih jam dalam menit
                                                            + EXTRACT(MINUTE FROM p3.STARTDATE - p.IDENTIFIEDDATE)
                                                            -- Menambahkan menit
                                                        ) > 30)");

if (!$query_count_urgent) {
    echo "Error in query execution: " . db2_stmt_errormsg();
}

$row_count_urgent = db2_fetch_assoc($query_count_urgent);
if (!$row_count_urgent) {
    echo "Error in fetching data: " . db2_stmt_errormsg();
}
$selsidata = isset($row_count_urgent['SELESIH_DATA']) ? $row_count_urgent['SELESIH_DATA'] : 0;

// menghitung julah urgent 
$jumlah_urgent_final=$jumlah_urgent1 - $selsidata;

$jumlah_masalah_ringan = $row_jumlah_masalah_ringan['JUMLAH_MASALAH'];
$jumlah_masalah_berat = $row_jumlah_masalah_berat['JUMLAH_MASALAH'];



// Hitung total sasaran follow-up
$total_sasaran_follow = $jumlah_masalah - $jumlah_follow;
$total_sasaran_3_jam = $jumlah_masalah_ringan - $jumlah_close_3;
$total_sasaran_5_jam = $jumlah_masalah_berat - $jumlah_close_5;

// Menghitung persentase jumlah_follow dari jumlah_masalah
if ($jumlah_masalah != 0) {
    $persentase_follow = min(($jumlah_follow / $jumlah_masalah) * 100, 100);
} else {
    $persentase_follow = 0;
}

$persentase_follow_sasaran = 100 - $persentase_follow;
if ($persentase_follow_sasaran < 0) {
    $persentase_follow_sasaran = 0;
}


$format_follow = number_format($persentase_follow, 2);
$format_follow_sasaran = number_format($persentase_follow_sasaran, 2);

if ($selsidata != 0) {
    $persentase_selisihdata = min(($selsidata / $jumlah_urgent1) * 100, 100);
} else {
    $persentase_selisihdata = 0;
}

$persentase_follow_selisihdata = 100 - $persentase_selisihdata;
if ($persentase_follow_selisihdata < 0) {
    $persentase_follow_selisihdata = 0;
}

$format_selisihdata = number_format($persentase_selisihdata, 2);
$format_follow_selisihdata = number_format($persentase_follow_selisihdata, 2);

// Menghitung persentase jumlah_close_3_jam dari jumlah masalah
if ($jumlah_masalah_ringan != 0) {
    $persentase_close_3_jam = min(($jumlah_close_3 / $jumlah_masalah_ringan) * 100, 100);
} else {
    $persentase_close_3_jam = 0;
}

$persentase_close_3_sasaran = 100 - $persentase_close_3_jam;
if ($persentase_close_3_sasaran < 0) {
    $persentase_close_3_sasaran = 0;
}

$format_close_3 = number_format($persentase_close_3_jam, 2);
$format_close_3_sasaran = number_format($persentase_close_3_sasaran, 2);

// Menghitung persentase jumlah_close_5_jam dari jumlah masalah
if ($jumlah_masalah_berat != 0) {
    $persentase_close_5_jam = min(($jumlah_close_5 / $jumlah_masalah_berat) * 100, 100);
} else {
    $persentase_close_5_jam = 0;
}

$persentase_close_5_sasaran = 100 - $persentase_close_5_jam;
if ($persentase_close_5_sasaran < 0) {
    $persentase_close_5_sasaran = 0;
}

$format_close_5 = number_format($persentase_close_5_jam, 2);
$format_close_5_sasaran = number_format($persentase_close_5_sasaran, 2);

//jumlah masalah normal -
$jumlahmasalah_normal=$row_jumlah_masalah['JUMLAH_MASALAH'] - $jumlah_urgent1;

$sasaranmutu_normal=$jumlahmasalah_normal-$row_jumlah_follow['TOTAL_FOLLOW'];

// Menghitung persentase jumlah_followup normal dari $jumlahmasalah_normal
if ($jumlahmasalah_normal != 0) {
    $persentase_followup = min(($jumlah_follow / $jumlahmasalah_normal) * 100, 100);
} else {
    $persentase_followup = 0;
}
$format_followup_normal = number_format($persentase_followup, 2);

// Menghitung persentase jumlah persentasi dari sasaran mutu normal
$persentase_follow_sasaranmutu = 100 - $persentase_followup;
if ($persentase_follow_sasaranmutu < 0) {
    $persentase_follow_sasaranmutu = 0;
}
$persentase_follow_sasaranmutu1 = number_format($persentase_follow_sasaranmutu, 2);


                ?>




                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Jumlah Masalah = <?= $row_jumlah_masalah['JUMLAH_MASALAH']; ?></strong><br><br>
                <?php if (strtotime($date1) >= strtotime('2025-02-01')) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Jumlah Masalah Normal =  <?= $jumlahmasalah_normal?></strong><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Jumlah Masalah Urgent =  <?= $jumlah_urgent1?></strong><br><br>
                <?php endif; ?>

                <?php if (strtotime($date1) >= strtotime('2025-02-01')) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Follow Up Lebih dari 1 Jam (Normal) = <?= $row_jumlah_follow['TOTAL_FOLLOW']; ?> ( <?= $format_followup_normal ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?= $sasaranmutu_normal?> ( <?= $persentase_follow_sasaranmutu1 ?> % )</strong><br><br>
                <?php else: ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Follow Up Lebih dari 1 Jam (Normal) = <?= $row_jumlah_follow['TOTAL_FOLLOW']; ?> ( <?= $format_follow ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?= $total_sasaran_follow ?> ( <?= $format_follow_sasaran ?> % )</strong><br><br>
                <?php endif; ?>

                <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Follow Up Lebih dari 30 Menit (Urgent) = <?= $selsidata ?> ( <?= $format_selisihdata ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?=  $jumlah_urgent_final?> ( <?= $format_follow_selisihdata ?> % )</strong><br><br> -->
                <!-- jikas -->
                <?php if (strtotime($date1) >= strtotime('2025-02-01')) : ?>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Follow Up Lebih dari 30 Menit (Urgent) = <?= $selsidata ?> ( <?= $format_selisihdata ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?=  $jumlah_urgent_final?> ( <?= $format_follow_selisihdata ?> % )</strong><br><br>
                <?php endif; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Close Kerusakan Ringan > 3 jam = <?= $row_jumlah_close_3_jam['TOTAL_CLOSE_3_JAM']; ?> dari <?= $row_jumlah_masalah_ringan['JUMLAH_MASALAH']; ?> ( <?= $format_close_3 ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?= $total_sasaran_3_jam ?> ( <?= $format_close_3_sasaran ?> % ) </strong><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Close Kerusakan Berat > 5 jam = <?= $row_jumlah_close_5_jam['TOTAL_CLOSE_5_JAM']; ?> dari <?= $row_jumlah_masalah_berat['JUMLAH_MASALAH']; ?> ( <?= $format_close_5 ?> % )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Capaian Sasaran Mutu = <?= $total_sasaran_5_jam ?> ( <?= $format_close_5_sasaran ?> % ) </strong><br><br><br>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" cellpadding="0" cellspacing="0" class="normal9black">
        <tfoot>
            <tr>
                <td width="170" align="left" valign="top">&nbsp;</td>
                <td width="200" align="center" valign="middle">Dibuat oleh</td>
                <td width="220" align="center" valign="middle">Diketahui oleh</td>
                <td align="center" valign="middle">&nbsp;</td>
            </tr>
            <tr>
                <td width="170" align="left" valign="top">&nbsp;Nama</td>
                <td width="200" align="center" valign="middle"><?php echo ''; ?></td>
                <td width="220" align="center"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="170" align="left" valign="top">&nbsp;Jabatan</td>
                <td width="200">&nbsp;</td>
                <td width="220" align="center">Manager DIT</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="170" align="left" valign="top">&nbsp;Tanggal</td>
                <td width="200" align="center" valign="middle">&nbsp;</td>
                <td width="220">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="170" height="70" align="left" valign="top">&nbsp;Tanda Tangan</td>
                <td width="200">&nbsp;</td>
                <td width="220">&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
