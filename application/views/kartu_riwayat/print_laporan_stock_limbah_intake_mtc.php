<?php
    function formatNumber($number)
    {
        return rtrim(rtrim(number_format($number, 3, '.', ''), '0'), '.');
    }

    date_default_timezone_set('Asia/Jakarta');
    $con = mysqli_connect("10.0.0.10", "dit", "4dm1n", "dimp");

    $hostname    = "10.0.0.21";
    $database    = "NOWPRD";
    $user        = "db2admin";
    $passworddb2 = "Sunkam@24809";
    $port        = "25000";
    $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
    $conn1       = db2_connect($conn_string, '', '');

    $id_barang    = $kode_barang ?? '';
    $date1        = $date1 ?? date('Y-m-01');
    $date2        = $date2 ?? date('Y-m-d');
    $exclude_date = '2025-05-02'; // Date yang tidak di masukan ke transaksi

    // Nama bulan versi Indonesia
    $bulan_indonesia = [
        'January'   => 'JANUARI',
        'February'  => 'FEBRUARI',
        'March'     => 'MARET',
        'April'     => 'APRIL',
        'May'       => 'MEI',
        'June'      => 'JUNI',
        'July'      => 'JULI',
        'August'    => 'AGUSTUS',
        'September' => 'SEPTEMBER',
        'October'   => 'OKTOBER',
        'November'  => 'NOVEMBER',
        'December'  => 'DESEMBER',
    ];

    $nama_bulan = $bulan_indonesia[date('F', strtotime($date1))];

    $query_barang = mysqli_query($con, "
        SELECT s.*,
            CONCAT_WS('-', TRIM(DECOSUBCODE01), TRIM(DECOSUBCODE02),
            TRIM(DECOSUBCODE03), TRIM(DECOSUBCODE04), TRIM(DECOSUBCODE05),
            TRIM(DECOSUBCODE06), TRIM(ZONE),'A') AS KODE_BARANG,
            s.DESCRIPTION AS NAMA_BARANG,
            s.UNITOFMEASURE AS UNIT
        FROM tbl_master_barang_limbah_intake_mtc s
        ORDER BY NAMA_BARANG ASC
    ");

    $stok_awal_masuk  = [];
    $stok_awal_keluar = [];

    $q_awal_masuk = db2_exec($conn1, "
        SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||
        '-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||
        '-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06)||
        '-'||TRIM(WHSLOCATIONWAREHOUSEZONECODE)||
        '-'||TRIM(WAREHOUSELOCATIONCODE) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS MASUK
        FROM STOCKTRANSACTION
        WHERE (TEMPLATECODE ='QC1' OR TEMPLATECODE='OPN')
        AND LOGICALWAREHOUSECODE = 'M121'
        AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'
        AND TRANSACTIONDATE < '$date1'
        AND TRIM(CREATIONUSER) <> 'yohana.hantari'
        GROUP BY TRIM(DECOSUBCODE01),
        TRIM(DECOSUBCODE02),
        TRIM(DECOSUBCODE03),
        TRIM(DECOSUBCODE04),
        TRIM(DECOSUBCODE05),
        TRIM(DECOSUBCODE06),
        TRIM(WHSLOCATIONWAREHOUSEZONECODE),
        TRIM(WAREHOUSELOCATIONCODE)
    ");

    while ($row = db2_fetch_assoc($q_awal_masuk)) {
        $stok_awal_masuk[$row['KODE_BARANG']] = (float) $row['MASUK'];
    }

    $q_awal_keluar = db2_exec($conn1, "
        SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||
        '-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||
        '-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06)||
        '-'||TRIM(WHSLOCATIONWAREHOUSEZONECODE)||
        '-'||TRIM(WAREHOUSELOCATIONCODE) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS KELUAR
        FROM STOCKTRANSACTION
        WHERE (TEMPLATECODE ='098')
        AND LOGICALWAREHOUSECODE = 'M121'
        AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'
        AND TRANSACTIONDATE < '$date1'
        AND TRIM(CREATIONUSER) <> 'yohana.hantari'
        GROUP BY TRIM(DECOSUBCODE01),
        TRIM(DECOSUBCODE02),
        TRIM(DECOSUBCODE03),
        TRIM(DECOSUBCODE04),
        TRIM(DECOSUBCODE05),
        TRIM(DECOSUBCODE06),
        TRIM(WHSLOCATIONWAREHOUSEZONECODE),
        TRIM(WAREHOUSELOCATIONCODE)
    ");

    while ($row = db2_fetch_assoc($q_awal_keluar)) {
        $stok_awal_keluar[$row['KODE_BARANG']] = (float) $row['KELUAR'];
    }

    $stok_masuk_data    = [];
    $stok_keluar_data   = [];
    $zone_location_data = [];

    $q_masuk = db2_exec($conn1, "
    SELECT
    TRIM(DECOSUBCODE01)||
    '-'||TRIM(DECOSUBCODE02)||
    '-'||TRIM(DECOSUBCODE03)||
    '-'||TRIM(DECOSUBCODE04)||
    '-'||TRIM(DECOSUBCODE05)||
    '-'||TRIM(DECOSUBCODE06)||
    '-'||TRIM(WHSLOCATIONWAREHOUSEZONECODE)||
    '-'||TRIM(WAREHOUSELOCATIONCODE) AS KODE_BARANG,
    SUM(USERPRIMARYQUANTITY) AS MASUK
    FROM STOCKTRANSACTION
    WHERE (TEMPLATECODE ='QC1' OR TEMPLATECODE='OPN')
    AND LOGICALWAREHOUSECODE = 'M121'
    AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'
    AND TRANSACTIONDATE BETWEEN '$date1' AND '$date2'
    AND TRIM(CREATIONUSER) <> 'yohana.hantari'
    GROUP BY TRIM(DECOSUBCODE01),
    TRIM(DECOSUBCODE02),
    TRIM(DECOSUBCODE03),
    TRIM(DECOSUBCODE04),
    TRIM(DECOSUBCODE05),
    TRIM(DECOSUBCODE06),
    TRIM(WHSLOCATIONWAREHOUSEZONECODE),
    TRIM(WAREHOUSELOCATIONCODE)
");

    while ($row = db2_fetch_assoc($q_masuk)) {
        $stok_masuk_data[$row['KODE_BARANG']] = (float) $row['MASUK'];
    }

    $q_keluar = db2_exec($conn1, "
    SELECT
    TRIM(DECOSUBCODE01)||
    '-'||TRIM(DECOSUBCODE02)||
    '-'||TRIM(DECOSUBCODE03)||
    '-'||TRIM(DECOSUBCODE04)||
    '-'||TRIM(DECOSUBCODE05)||
    '-'||TRIM(DECOSUBCODE06)||
    '-'||TRIM(WHSLOCATIONWAREHOUSEZONECODE)||
    '-'||TRIM(WAREHOUSELOCATIONCODE) AS KODE_BARANG,
    SUM(USERPRIMARYQUANTITY) AS KELUAR
    FROM STOCKTRANSACTION
    WHERE (TEMPLATECODE ='098')
    AND LOGICALWAREHOUSECODE = 'M121'
    AND TIMESTAMP(TRANSACTIONDATE, TRANSACTIONTIME) > '2025-04-25 09:00:00'
    AND TRANSACTIONDATE BETWEEN '$date1' AND '$date2'
    AND TRIM(CREATIONUSER) <> 'yohana.hantari'
    GROUP BY TRIM(DECOSUBCODE01),
    TRIM(DECOSUBCODE02),
    TRIM(DECOSUBCODE03),
    TRIM(DECOSUBCODE04),
    TRIM(DECOSUBCODE05),
    TRIM(DECOSUBCODE06),
    TRIM(WHSLOCATIONWAREHOUSEZONECODE),
    TRIM(WAREHOUSELOCATIONCODE)
");

    while ($row = db2_fetch_assoc($q_keluar)) {
        $stok_keluar_data[$row['KODE_BARANG']] = (float) $row['KELUAR'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>::Laporan Stock Limbah Dan Intake MTC::</title>
    <link rel="shortcut icon" href="img/logo_ITTI.ico">
    <style>
        body { background: white; }
        table, th, td { border: 1px solid black; border-collapse: collapse; font-size: 12px; }
        th, td { padding: 2px; text-align: center; }
    </style>
</head>
<body>

<label style="font-weight: bold;">LAPORAN OBAT INTAKE DAN LIMBAH</label><br>
<label style="font-weight: bold;">Periode :                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <?php echo $date1 . " s/d " . $date2; ?></label>
<br><br>

<table width="100%" border="1" id="t01">
    <tr>
        <th rowspan="2">NO</th>
        <th rowspan="2">Nama Obat</th>
        <th rowspan="2">Packhing (kg)</th>
        <th colspan="4"><?php echo "PERIODE BULAN " . $nama_bulan; ?></th>
        <th rowspan="2">Keterangan</th>
    </tr>
    <tr>
        <th>Stock Awal</th>
        <th>Penerimaan</th>
        <th>Pemakaian</th>
        <th>Stock Akhir</th>
    </tr>

<?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query_barang)) {
        $kode_barang = $row['KODE_BARANG'];
        $stok_awal   = (float) ($row['STOCK'] ?? 0);

        $masuk_awal  = (float) ($stok_awal_masuk[$kode_barang] ?? 0);
        $keluar_awal = (float) ($stok_awal_keluar[$kode_barang] ?? 0);
        $stok_awal   = ($stok_awal + $masuk_awal) - $keluar_awal;

        $masuk      = (float) ($stok_masuk_data[$kode_barang] ?? 0);
        $keluar     = (float) ($stok_keluar_data[$kode_barang] ?? 0);
        $stok_akhir = $stok_awal + $masuk - $keluar;
        $zone       = $zone_location_data[$kode_barang] ?? '';
    ?>
<tr>
    <td><?php echo $no++; ?></td>
    <td style="text-align: left;"><?php echo $row['NAMA_BARANG']; ?></td>
    <td><?php echo $row['PACKING']; ?></td>
    <td><?php echo $stok_awal; ?></td>
    <td><?php echo $masuk; ?></td>
    <td><?php echo $keluar; ?></td>
    <td><?php echo $stok_akhir; ?></td>
    <td></td>
</tr>
<?php }?>
</table>

<br>
<table width="100%" border="1">
    <tr><td></td><td>DIBUAT OLEH</td><td>DIPERIKSA OLEH</td><td>DISETUJUI OLEH</td></tr>
    <tr><td>NAMA</td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td></tr>
    <tr><td>JABATAN</td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td></tr>
    <tr><td>TANGGAL</td><td><input style="border:0;" type="date"></td><td><input style="border:0;" type="date"></td><td><input style="border:0;" type="date"></td></tr>
    <tr><td>TANDA TANGAN</td><td style="height:100px;"></td><td style="height:100px;"></td><td style="height:100px;"></td></tr>
</table>
</body>
</html>
