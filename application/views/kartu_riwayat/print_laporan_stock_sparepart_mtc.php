<?php
    function formatNumber($number)
    {
        return rtrim(rtrim(number_format($number, 3, '.', ''), '0'), '.');
    }

	$tahun_sekarang = date('Y');
	$bulan_sekarang = date('m');
	$tahun_sebelum = $tahun_sekarang - 1;

    date_default_timezone_set('Asia/Jakarta');
    $con = mysqli_connect("10.0.0.10", "dit", "4dm1n", "dimp");

    $hostname    = "10.0.0.21";
    $database    = "NOWPRD";
    $user        = "db2admin";
    $passworddb2 = "Sunkam@24809";
    $port        = "25000";
    $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
    $conn1       = db2_connect($conn_string, '', '');

    $id_barang = $kode_barang ?? '';
    $date1     = $date1 ?? date('Y-m-01');
    $date2     = $date2 ?? date('Y-m-d');

    $query_barang = mysqli_query($con, "
        SELECT s.*,
            CONCAT_WS('-', TRIM(DECOsubcode01), TRIM(DECOsubcode02), TRIM(DECOsubcode03), TRIM(DECOsubcode04), TRIM(DECOsubcode05), TRIM(DECOsubcode06)) AS KODE_BARANG,
            s.DESCRIPTION AS NAMA_BARANG,
            CASE WHEN s.ITEMTYPECODE = 'SUP' THEN 'Supplies' ELSE 'Sparepart' END AS KATEGORI,
            s.UNITOFMEASURE AS UNIT
        FROM tbl_master_barang_mtc s
        ORDER BY KATEGORI ASC, NAMA_BARANG ASC
    ");

    $stok_awal_masuk  = [];
    $stok_awal_keluar = [];

    $q_awal_masuk = db2_exec($conn1, "
    SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||'-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||'-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS MASUK
    FROM STOCKTRANSACTION
    WHERE TEMPLATECODE IN ('OPN', 'QC1','101')
    AND LOGICALWAREHOUSECODE = 'M201'
    AND TRANSACTIONDATE > '2025-03-12'
    AND TRANSACTIONDATE < '$date1'
    GROUP BY TRIM(DECOSUBCODE01), TRIM(DECOSUBCODE02), TRIM(DECOSUBCODE03), TRIM(DECOSUBCODE04), TRIM(DECOSUBCODE05), TRIM(DECOSUBCODE06)
    ");

    while ($row = db2_fetch_assoc($q_awal_masuk)) {
        $stok_awal_masuk[$row['KODE_BARANG']] = (int) $row['MASUK'];
    }

    $q_awal_keluar = db2_exec($conn1, "
    SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||'-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||'-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS KELUAR
    FROM STOCKTRANSACTION
    WHERE TEMPLATECODE = '201'
    AND LOGICALWAREHOUSECODE = 'M201'
    AND CREATIONDATETIME > '2025-03-12 12:00:00'
    AND TRANSACTIONDATE < '$date1'
    GROUP BY TRIM(DECOSUBCODE01), TRIM(DECOSUBCODE02), TRIM(DECOSUBCODE03), TRIM(DECOSUBCODE04), TRIM(DECOSUBCODE05), TRIM(DECOSUBCODE06)
    ");

    while ($row = db2_fetch_assoc($q_awal_keluar)) {
        $stok_awal_keluar[$row['KODE_BARANG']] = (int) $row['KELUAR'];
    }

    $stok_masuk_data    = [];
    $stok_keluar_data   = [];
    $zone_location_data = [];

    // --- Ambil semua stok_masuk
    $q_masuk = db2_exec($conn1, "
    SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||'-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||'-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS MASUK
    FROM STOCKTRANSACTION
    WHERE TEMPLATECODE IN ('OPN', 'QC1','101')
    AND LOGICALWAREHOUSECODE = 'M201'
    AND TRANSACTIONDATE > '2025-03-12'
    AND TRANSACTIONDATE BETWEEN '$date1' AND '$date2'
    GROUP BY TRIM(DECOSUBCODE01), TRIM(DECOSUBCODE02), TRIM(DECOSUBCODE03), TRIM(DECOSUBCODE04), TRIM(DECOSUBCODE05), TRIM(DECOSUBCODE06)
");

    while ($row = db2_fetch_assoc($q_masuk)) {
        $stok_masuk_data[$row['KODE_BARANG']] = (int) $row['MASUK'];
    }

    // --- Ambil semua stok_keluar
    $q_keluar = db2_exec($conn1, "
    SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||'-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||'-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06) AS KODE_BARANG,
        SUM(USERPRIMARYQUANTITY) AS KELUAR
    FROM STOCKTRANSACTION
    WHERE TEMPLATECODE = '201'
    AND LOGICALWAREHOUSECODE = 'M201'
    AND CREATIONDATETIME > '2025-03-12 12:00:00'
    AND TRANSACTIONDATE BETWEEN '$date1' AND '$date2'
    GROUP BY TRIM(DECOSUBCODE01), TRIM(DECOSUBCODE02), TRIM(DECOSUBCODE03), TRIM(DECOSUBCODE04), TRIM(DECOSUBCODE05), TRIM(DECOSUBCODE06)
");

    while ($row = db2_fetch_assoc($q_keluar)) {
        $stok_keluar_data[$row['KODE_BARANG']] = (int) $row['KELUAR'];
    }

	// Stok Keluar per Tahun
	$q_tahun = "SELECT
					TRIM(DECOSUBCODE01)|| '-' || TRIM(DECOSUBCODE02)|| '-' || TRIM(DECOSUBCODE03)|| '-' || TRIM(DECOSUBCODE04)|| '-' || TRIM(DECOSUBCODE05)|| '-' || TRIM(DECOSUBCODE06) AS KODE_BARANG,
					SUM(USERPRIMARYQUANTITY) AS KELUAR
				FROM
					STOCKTRANSACTION
				WHERE
					TEMPLATECODE = '201'
					AND LOGICALWAREHOUSECODE = 'M201'
					AND YEAR(TRANSACTIONDATE) >= '$tahun_sebelum'
					AND YEAR(TRANSACTIONDATE) < '$tahun_sekarang'
				GROUP BY
					TRIM(DECOSUBCODE01),
					TRIM(DECOSUBCODE02),
					TRIM(DECOSUBCODE03),
					TRIM(DECOSUBCODE04),
					TRIM(DECOSUBCODE05),
					TRIM(DECOSUBCODE06)";
	$stmt_keluar_tahun = db2_exec($conn1, $q_tahun);
	while ($row = db2_fetch_assoc($stmt_keluar_tahun)) {
        $stok_tahun[$row['KODE_BARANG']] = (int) $row['KELUAR'];
    }

	// Stok Keluar per Bulan Berjalan
	$q_bulan_berjalan = "SELECT
					TRIM(DECOSUBCODE01)|| '-' || TRIM(DECOSUBCODE02)|| '-' || TRIM(DECOSUBCODE03)|| '-' || TRIM(DECOSUBCODE04)|| '-' || TRIM(DECOSUBCODE05)|| '-' || TRIM(DECOSUBCODE06) AS KODE_BARANG,
					SUM(USERPRIMARYQUANTITY) AS KELUAR
				FROM
					STOCKTRANSACTION
				WHERE
					TEMPLATECODE = '201'
					AND LOGICALWAREHOUSECODE = 'M201'
					AND YEAR(TRANSACTIONDATE) = '$tahun_sekarang'
					AND MONTH(TRANSACTIONDATE) <= '$bulan_sekarang'
				GROUP BY
					TRIM(DECOSUBCODE01),
					TRIM(DECOSUBCODE02),
					TRIM(DECOSUBCODE03),
					TRIM(DECOSUBCODE04),
					TRIM(DECOSUBCODE05),
					TRIM(DECOSUBCODE06)";
	$stmt_keluar_bulan_berjalan = db2_exec($conn1, $q_bulan_berjalan);
	while ($row = db2_fetch_assoc($stmt_keluar_bulan_berjalan)) {
        $pemakaian_bulan_berjalan[$row['KODE_BARANG']] = (int) $row['KELUAR'];
    }

    // --- Ambil semua zone location
    $q_zone_location = db2_exec($conn1, "
    SELECT
        TRIM(DECOSUBCODE01)||'-'||TRIM(DECOSUBCODE02)||'-'||TRIM(DECOSUBCODE03)||'-'||TRIM(DECOSUBCODE04)||'-'||TRIM(DECOSUBCODE05)||'-'||TRIM(DECOSUBCODE06) AS KODE_BARANG,
        WAREHOUSEZONE.LONGDESCRIPTION || '-' || STOCKTRANSACTION.WAREHOUSELOCATIONCODE  AS ZONE_LOCATION
    FROM STOCKTRANSACTION
    LEFT JOIN WAREHOUSEZONE ON WAREHOUSEZONE.PHYSICALWAREHOUSECODE = STOCKTRANSACTION.PHYSICALWAREHOUSECODE
    AND WAREHOUSEZONE.CODE = STOCKTRANSACTION.WHSLOCATIONWAREHOUSEZONECODE
    WHERE STOCKTRANSACTION.LOGICALWAREHOUSECODE = 'M201'
    AND STOCKTRANSACTION.TRANSACTIONDATE BETWEEN '$date1' AND '$date2'
    ");

    while ($row = db2_fetch_assoc($q_zone_location)) {
        $kode     = $row['KODE_BARANG'];
        $location = $row['ZONE_LOCATION'];
        if (! isset($zone_location_data[$kode])) {
            $zone_location_data[$kode] = [];
        }
        if (! in_array($location, $zone_location_data[$kode])) {
            $zone_location_data[$kode][] = $location;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>::Laporan Stock Sparepart MTC::</title>
    <link rel="shortcut icon" href="img/logo_ITTI.ico">
    <style>
        body { background: white; }
        table, th, td { border: 1px solid black; border-collapse: collapse; font-size: 12px; }
        th, td { padding: 2px; text-align: center; }

        #t01 thead th {
            position: sticky;
            top: 0;
            background-color: #ffffff;
            z-index: 10;
			border : 1px solid black;
        }
    </style>
</head>
<body>
<label style="font-weight: bold;">LAPORAN STOCK</label><br>
<label><u>DEPARTEMEN MTC</u></label><br>
<label style="font-weight: bold;">Periode :                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <?php echo $date1 . " "; ?> s/d<?php echo " " . $date2; ?></label>
<br><br>
<table width="100%" border="1" id="t01">
    <thead>
    <tr>
        <th>NO</th>
        <th>KODE BARANG</th>
        <th>JENIS BARANG</th>
        <th>STOK Min</th>
        <th>STOK AWAL</th>
        <th>UNIT</th>
        <th>MASUK</th>
        <th>KELUAR</th>
        <th>UNIT</th>
        <th>STOK AKHIR</th>
        <th>ZONE - LOCATION</th>
        <th>CATATAN</th>
        <th>RATA-RATA PEMAKAIAN 1 THN</th>
        <th>RATA-RATA PEMAKAIAN BULAN BERJALAN</th>
    </tr>
    </thead>
    <tbody>

<?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($query_barang)) {
        $kode_barang = $row['KODE_BARANG'];
        $stok_awal   = (int) ($row['STOCK'] ?? 0);
		$stokper_tahun	 = $stok_tahun[$kode_barang] ?? 0;
		$stokper_bulan_berjalan = $pemakaian_bulan_berjalan[$kode_barang] ?? 0;

        $masuk_awal  = $stok_awal_masuk[$kode_barang] ?? 0;
        $keluar_awal = $stok_awal_keluar[$kode_barang] ?? 0;
        $stok_awal   = ($stok_awal + $masuk_awal) - $keluar_awal;

        $masuk  = $stok_masuk_data[$kode_barang] ?? 0;
        $keluar = $stok_keluar_data[$kode_barang] ?? 0;

		$rata_tahun = $stokper_tahun > 0 ? ceil($stokper_tahun / 12) : 0;
		$rata_bulan_berjalan = $stokper_bulan_berjalan > 0 ? ceil($stokper_bulan_berjalan/$bulan_sekarang) : 0;
		
        // Kondisi item yang stock awal, masuk , keluar sama
        if ($stok_awal === $masuk && $masuk === $keluar) {
            $stok_awal = 0;
        }

        $stok_akhir = $stok_awal + $masuk - $keluar;

        $zone_arr = $zone_location_data[$kode_barang] ?? [];
        $zone     = implode('<br>', $zone_arr);

    ?>
<tr>
    <td><?php echo $no++; ?></td>
    <td style="text-align: left;"><?php echo $kode_barang; ?></td>
    <td style="text-align: left;"><?php echo $row['NAMA_BARANG']; ?></td>
    <td><?php echo $row['STOCK_MINIMUM']; ?></td>
    <td><?php echo $stok_awal; ?></td>
    <td><?php echo $row['UNIT']; ?></td>
    <td><?php echo $masuk; ?></td>
    <td><?php echo $keluar; ?></td>
    <td><?php echo $row['UNIT']; ?></td>
    <td><?php echo $stok_akhir; ?></td>
    <td style="text-align: left;"><?php echo $zone; ?></td>
    <td></td>
    <td><?php echo $rata_tahun; ?></td>
    <td><?php echo $rata_bulan_berjalan; ?></td>
</tr>
<?php }?>
    </tbody>
</table>

<!-- Section tanda tangan -->
<br>
<table width="100%" border="1">
    <tr><td></td><td>DIBUAT OLEH</td><td>DIPERIKSA OLEH</td><td>DISETUJUI OLEH</td></tr>
    <tr><td>NAMA</td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td></tr>
    <tr><td>JABATAN</td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td><td><input style="border:0;" type="text"></td></tr>
    <tr><td>TANGGAL</td><td><input style="border:0;" type="date"></td><td><input style="border:0;" type="date"></td><td><input style="border:0;" type="date"></td></tr>
        <tr>
        <td>TANDA TANGAN</td>
        <td style="height:100px;"></td>
        <td style="height:100px;"></td>
        <td style="height:100px;"></td>
    </tr>
</table>

</body>
</html>
