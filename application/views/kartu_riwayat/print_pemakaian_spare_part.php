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
	<title>Cetak Form Pemakaian Spare Part DIT</title>
	<link href="<?= base_url() ?>styles_cetak.css" rel="stylesheet" type="text/css">
	<style>
		input {
			text-align: center;
			border: hidden;
		}

		@media print {
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
	</style>
</head>

<body>
	<?php if ($InternalDocument == 'InternalDocument'): ?>
		<table width="100%" border="0" class="table-list1">
			<thead>
				<tr>
					<td width="10%" align="center"><img src="<?= base_url('assets/images/logoitti.png'); ?>" width="40"
							height="40"></td>
					<td width="60%" align="center" valign="center">
						<h2><br>FORM PEMAKAIAN SPARE PART DIT</h2>
					</td>
					<td width="30%">
						<div align="left">
							<pre>No. Form &Tab; : &Tab;FW-19-DIT-07</pre>
						</div>
						<div align="left">
							<pre>No. Revisi &Tab; : &Tab;00</pre>
						</div>
						<div align="left">
							<pre>Tgl Terbit &Tab; : &Tab;06 April 2015</pre>
						</div>
					</td>
				</tr>
				<thead>
		</table>
		<?php
		$query_int = "SELECT 
                                i.PROVISIONALCODE,
                                'INT/' || LTRIM(SUBSTR(i.PROVISIONALCODE, 8,6), '0') || ',' || SUBSTR(i.PROVISIONALDOCUMENTDATE, 6,2) || '/' || SUBSTR(i.PROVISIONALDOCUMENTDATE, 3,2) AS NO_FORM,
                                TRIM(i2.SUBCODE01) || '-' || TRIM(i2.SUBCODE02) || '-' || TRIM(i2.SUBCODE03) || '-' || TRIM(i2.SUBCODE04) || '-' || TRIM(i2.SUBCODE05) || '-' || TRIM(i2.SUBCODE06) AS KODE_BARANG,
                                i2.ITEMDESCRIPTION  AS NAMA_SPAREPART,
                                floor(i2.USERPRIMARYQUANTITY) AS JUMLAH,
                                i.EXTERNALREFERENCE AS CATATAN,
								CASE
									WHEN a.VALUESTRING = '2' THEN 'Pinjam'
									WHEN a.VALUESTRING = '1' THEN 'Pakai'
									ELSE ''
								END AS STATUS  
                            FROM 
                                INTERNALDOCUMENT i 
                            LEFT JOIN INTERNALDOCUMENTLINE i2 ON i2.INTDOCUMENTPROVISIONALCODE = i.PROVISIONALCODE AND i2.WAREHOUSECODE = 'M231'
							LEFT JOIN ADSTORAGE a ON a.UNIQUEID = i.ABSUNIQUEID AND a.FIELDNAME = 'Status'
                            WHERE
                                i.PROVISIONALCODE = '$kode_work_order'
								AND i.ORDPRNCUSTOMERSUPPLIERCODE = 'M231'";
		$q_header = db2_exec($conn1, $query_int);
		$row_header = db2_fetch_assoc($q_header);
		?>
		<table width="100%" border="0" style="font-family:sans-serif, Roman, serif; font-size:12px;">
			<thead>
				<tr>
					<td colspan="3" align="center">NO : <?= $row_header['NO_FORM'] ?></td>
				</tr>
			</thead>
		</table>
		<table width="100%" border="0" class="table-list1">
			<thead>
				<tr style="font-weight: bold;">
					<td style="width:5%;">
						<div align="center">No.</div>
					</td>
					<td style="width:30%">
						<div align="center">Kode Barang</div>
					</td>
					<td style="width:50%">
						<div align="center">Nama Spare Part</div>
					</td>
					<td style="width:15%">
						<div align="center">Jumlah</div>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$q_sparepart = db2_exec($conn1, $query_int);
				$no = 1;
				while ($row_sparepart = db2_fetch_assoc($q_sparepart)) {
					?>
					<tr>
						<td align="center"><?= $no++; ?></td>
						<td><?= $row_sparepart['KODE_BARANG'] ?></td>
						<td><?= $row_sparepart['NAMA_SPAREPART'] ?></td>
						<td align="center"><?= $row_sparepart['JUMLAH'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table width="100%" border="0" style="font-family:sans-serif, Roman, serif; font-size:12px;">
			<thead>
				<tr>
					<td align="left" colspan="3">
						<?php
							if($row_header['STATUS'] == 'Pakai'){
								$checklist_status_pakai = '&#9745;';
							}else{
								$checklist_status_pakai = '&#9634;';
							}	
							
							if($row_header['STATUS'] == 'Pinjam'){
								$checklist_status_pinjam = '&#9745;';
							}else{
								$checklist_status_pinjam = '&#9634;';
							}	
						?>
						Status &nbsp; <span style='font-size:20px;'><?= $checklist_status_pakai; ?></span> Pakai<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
							style='font-size:20px;'><?= $checklist_status_pinjam; ?></span> Pinjam
					</td>
					<!-- centang &#9745; -->
					<!-- tidak centang &#9634; -->
				</tr>
				<tr>
					<td align="center" colspan="3">
						<center>
							<table width="50%" border="0" class="table-list1">
								<thead>
									<tr>
										<td align="center" colspan="2">Kembali</td>
									</tr>
									<tr>
										<td align="center">Tanggal</td>
										<td align="center">Nama Peminjam dan Paraf</td>
									</tr>
									<tr>
										<td><br><br><br></td>
										<td><br><br><br></td>
									</tr>
								</thead>
							</table>
						</center>
					</td>
				</tr>
				<tr>
					<td align="left" colspan="3">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
							style='font-size:20px;'>&#9634;</span> Tukar / Ganti dengan Kode / Nama Barang :
					</td>
				</tr>
				<tr>
					<td align="left" colspan="3">
						<b>Catatan : <?= $row_header['PROVISIONALCODE'] ?>, <?= $row_header['CATATAN'] ?></b>
					</td>
				</tr>
			</thead>
		</table>


	<?php else: ?>
		<table width="100%" border="0" class="table-list1">
			<thead>
				<tr>
					<td width="10%" align="center"><img src="<?= base_url('assets/images/logoitti.png'); ?>" width="40"
							height="40"></td>
					<td width="60%" align="center" valign="center">
						<h2><br>FORM PEMAKAIAN SPARE PART DIT</h2>
					</td>
					<td width="30%">
						<div align="left">
							<pre>No. Form &Tab; : &Tab;FW-19-DIT-07</pre>
						</div>
						<div align="left">
							<pre>No. Revisi &Tab; : &Tab;00</pre>
						</div>
						<div align="left">
							<pre>Tgl Terbit &Tab; : &Tab;06 April 2015</pre>
						</div>
					</td>
				</tr>
				<thead>
		</table>
		<?php
		$q_header = db2_exec($conn1, "SELECT DISTINCT 
												p.CODE AS BREAKDOWN,
												p3.CODE AS WORKORDER,
												LISTAGG(TRIM(p4.IDINTDOCUMENTPROVISIONALCODE), ', ') AS INTERNAL_DOC,
												SUBSTR(TRIM(d.LONGDESCRIPTION), 1,3)  || '/' || LTRIM(SUBSTR(p3.CODE, 6,6), '0') || ',' || SUBSTR(p3.CREATIONDATETIME, 6,2) || '/' || SUBSTR(p3.CREATIONDATETIME, 3,2) AS NO_FORM,
												p.PMBOMCODE AS NO_BARCODE,
												p.SYMPTOM,
												p3.REMARKS,
												a3.VALUESTRING AS STATUS_PEMAKAIAN,
												p2.LONGDESCRIPTION AS PENGGUNA,
												p4.CREATIONUSER AS NAMA_DIBUAT,
												a4.MENUDESCR AS JABATAN_DIBUAT,
												p.CREATIONUSER AS NAMA_DITERIMA,
												a6.MENUDESCR AS JABATAN_DITERIMA,
												u2.LONGDESCRIPTION AS NAMA_KEPALA_USER,
												u2.SEARCHDESCRIPTION AS JABATAN_KEPALA_USER,
												u3.LONGDESCRIPTION AS NAMA_KEPALA_DIT,
												u3.SEARCHDESCRIPTION AS JABATAN_KEPALA_DIT,
												SUBSTR(p3.ENDDATE, 1, 10) AS TGL_FORM
											FROM
												PMBREAKDOWNENTRY p
											LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
											LEFT JOIN DEPARTMENT d ON d.CODE = p2.DEPARTMENTCODE 
											LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
											LEFT JOIN PMWORKORDERACTIVITYSPARES p4 ON p4.PMWORKORDDLTPMWORKORDERCODE = p3.CODE 
											LEFT JOIN UNITOFMEASURE u ON u.CODE = p4.QUANTITYUOMCODE
											LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p3.ABSUNIQUEID AND a.FIELDNAME = 'ApprovalDeptUserCode'
											LEFT JOIN USERGENERICGROUP u2 ON u2.CODE = a.VALUESTRING AND u2.USERGENERICGROUPTYPECODE = 'HED'
											LEFT JOIN ADSTORAGE a2 ON a2.UNIQUEID = p3.ABSUNIQUEID AND a2.FIELDNAME = 'ApprovalDeptDITCode'
											LEFT JOIN ADSTORAGE a3 ON a3.UNIQUEID = p3.ABSUNIQUEID AND a3.FIELDNAME = 'StatusPemakaian'
											LEFT JOIN USERGENERICGROUP u3 ON u3.CODE = a2.VALUESTRING AND u3.USERGENERICGROUPTYPECODE = 'DIT'
											LEFT JOIN ABSUIINITIALMENU a3 ON a3.USERUSERID = p4.CREATIONUSER 
											LEFT JOIN ABSUIMENU a4 ON a4.CODE = a3.MENU4CODE
											LEFT JOIN ABSUIINITIALMENU a5 ON a5.USERUSERID = p.CREATIONUSER 
											LEFT JOIN ABSUIMENU a6 ON a6.CODE = a5.MENU4CODE 
											WHERE
												NOT p4.IDINTDOCUMENTPROVISIONALCODE IS NULL
												AND p3.CODE = '$kode_work_order'
											GROUP BY
												p3.CODE,
												d.LONGDESCRIPTION,
												p.CODE,
												p.PMBOMCODE,
												p.SYMPTOM,
												p3.REMARKS,
												p2.LONGDESCRIPTION,
												p3.CREATIONDATETIME,
												a3.VALUESTRING,
												p3.ENDDATE,
												p4.CREATIONUSER,
												p.CREATIONUSER,
												u2.LONGDESCRIPTION,
												u3.LONGDESCRIPTION,
												a4.MENUDESCR,
												a6.MENUDESCR,
												u2.SEARCHDESCRIPTION,
												u3.SEARCHDESCRIPTION
");
		$row_header = db2_fetch_assoc($q_header);
		?>
		<table width="100%" border="0" style="font-family:sans-serif, Roman, serif; font-size:12px;">
			<thead>
				<tr>
					<td colspan="3" align="center">NO : <?= $row_header['NO_FORM'] ?></td>
				</tr>
			</thead>
		</table>
		<table width="100%" border="0" class="table-list1">
			<thead>
				<tr style="font-weight: bold;">
					<td style="width:5%;">
						<div align="center">No.</div>
					</td>
					<td style="width:30%">
						<div align="center">Kode Barang</div>
					</td>
					<td style="width:50%">
						<div align="center">Nama Spare Part</div>
					</td>
					<td style="width:15%">
						<div align="center">Jumlah</div>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$q_sparepart = db2_exec($conn1, "SELECT  
                                                        TRIM(p.SUBCODE01) || '-' || TRIM(p.SUBCODE02) || '-' || TRIM(p.SUBCODE03) || '-' || TRIM(p.SUBCODE04) || '-' || TRIM(p.SUBCODE05) || '-' || TRIM(p.SUBCODE06) AS KODE_BARANG,
                                                        p.PRODUCTSHORTDESC AS NAMA_SPAREPART,
                                                        floor(p.ACTUALQUANITY) AS JUMLAH
                                                    FROM 
                                                        PMWORKORDERACTIVITYSPARES p 
                                                    WHERE 
                                                        PMWORKORDDLTPMWORKORDERCODE = '$kode_work_order'");
				$no = 1;
				while ($row_sparepart = db2_fetch_assoc($q_sparepart)) {
					?>
					<tr>
						<td align="center"><?= $no++; ?></td>
						<td><?= $row_sparepart['KODE_BARANG'] ?></td>
						<td><?= $row_sparepart['NAMA_SPAREPART'] ?></td>
						<td align="center"><?= $row_sparepart['JUMLAH'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table width="100%" border="0" style="font-family:sans-serif, Roman, serif; font-size:12px;">
			<thead>
				<tr>
					<td align="left" colspan="3">
						Status &nbsp; <span style='font-size:20px;'><?php if($row_header['STATUS_PEMAKAIAN'] == NULL OR $row_header['STATUS_PEMAKAIAN'] == 1 OR $row_header['STATUS_PEMAKAIAN'] == 0){
							echo '&#9745;'; }else echo '&#9634;';?>
						<!-- &#9745; -->
					</span> Pakai<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style='font-size:20px;'><?php if($row_header['STATUS_PEMAKAIAN'] == 2){echo '&#9745;'; }else echo '&#9634;';?></span> Pinjam
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<center>
							<table width="50%" border="0" class="table-list1">
								<thead>
									<tr>
										<td align="center" colspan="2">Kembali</td>
									</tr>
									<tr>
										<td align="center">Tanggal</td>
										<td align="center">Nama Peminjam dan Paraf</td>
									</tr>
									<tr>
										<td><br><br><br></td>
										<td><br><br><br></td>
									</tr>
								</thead>
							</table>
						</center>
					</td>
				</tr>
				
				<tr>
					<td align="left" colspan="3">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
							style='font-size:20px;'><?php if($row_header['STATUS_PEMAKAIAN'] == 3){echo '&#9745;'; }else echo '&#9634;';?></span> Tukar / Ganti dengan Kode / Nama Barang :
					</td>
				</tr>
				<tr>
					<td align="left" colspan="3">
						<b>Catatan : <?= $row_header['NO_BARCODE'] ?>, <?= $row_header['INTERNAL_DOC'] ?>,
							<?= $row_header['REMARKS'] ?></b>
					</td>
				</tr>
			</thead>
		</table>
		<table width="100%" border="0" class="table-list1">
			<thead>
				<tr>
					<td width="20%" rowspan="2"></td>
					<td width="20%" align="center">Dibuat Oleh :</td>
					<td width="20%" align="center">Diterima Oleh :</td>
					<td width="20%" align="center">Diketahui :</td>
					<td width="20%" align="center">Disetujui Oleh :</td>
				</tr>
				<tr>
					<td align="center">Departement DIT</td>
					<td align="center">Departement User</td>
					<td align="center">Kepala Dept. User</td>
					<td align="center">DIT</td>
				</tr>
				<tr>
					<td align="center">Nama</td>
					<td align="center"><?= $row_header['NAMA_DIBUAT'] ?></td>
					<td align="center"><?= $row_header['NAMA_DITERIMA'] ?></td>
					<td align="center"><?= $row_header['NAMA_KEPALA_USER'] ?></td>
					<td align="center"><?= $row_header['NAMA_KEPALA_DIT'] ?></td>
				</tr>
				<tr>
					<td align="center">Jabatan</td>
					<td align="center"><?= $row_header['JABATAN_DIBUAT'] ?></td>
					<td align="center"><?= $row_header['JABATAN_DITERIMA'] ?></td>
					<td align="center"><?= $row_header['JABATAN_KEPALA_USER'] ?></td>
					<td align="center"><?= $row_header['JABATAN_KEPALA_DIT'] ?></td>
				</tr>
				<tr>
					<td align="center">Tanggal</td>
					<td align="center"><?= $row_header['TGL_FORM'] ?></td>
					<td align="center"><?= $row_header['TGL_FORM'] ?></td>
					<td align="center"><?= $row_header['TGL_FORM'] ?></td>
					<td align="center"><?= $row_header['TGL_FORM'] ?></td>
				</tr>
				<tr>
					<td valign="top" align="center" height="50">Tanda Tangan</td>
					<td align="center"><img width="40" alt='Barcode Generator TEC-IT'
							src='https://barcode.tec-it.com/barcode.ashx?data=<?= $row_header['NAMA_DIBUAT'] ?>&code=QRCode&translate-esc=on&eclevel=L' />
					</td>
					<td align="center"><img width="40" alt='Barcode Generator TEC-IT'
							src='https://barcode.tec-it.com/barcode.ashx?data=<?= $row_header['NAMA_DITERIMA'] ?>&code=QRCode&translate-esc=on&eclevel=L' />
					</td>
					<td align="center"><img width="40" alt='Barcode Generator TEC-IT'
							src='https://barcode.tec-it.com/barcode.ashx?data=<?= $row_header['NAMA_KEPALA_USER'] ?>&code=QRCode&translate-esc=on&eclevel=L' />
					</td>
					<td align="center"><img width="40" alt='Barcode Generator TEC-IT'
							src='https://barcode.tec-it.com/barcode.ashx?data=<?= $row_header['NAMA_KEPALA_DIT'] ?>&code=QRCode&translate-esc=on&eclevel=L' />
					</td>
				</tr>
			</thead>
		</table>
	<?php endif; ?>
</body>
