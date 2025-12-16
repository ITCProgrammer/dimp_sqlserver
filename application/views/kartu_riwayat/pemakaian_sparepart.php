<h2 style="font-weight: normal;"><?php echo $title;?> NOW</h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/pemakaian_spare_parts', "Form Pemakaian Spare Part DIT"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>
<hr>
<center><h4>OPEN TICKET</h4></center>
<hr>
<table id="example-datatables" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th width="5%" align="center">No</th>
            <th width="5%" align="center">No Form</th>
            <th align="center">Breakdown</th>
            <th align="center">Workorder</th>
            <th width="12%" align="center">Internal Document</th>
            <th align="center">No Tag</th>
            <th align="center">Open Ticket</th>
            <th align="center">Pengguna</th>
            <th align="center">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $hostname="10.0.0.21";
            // $database = "NOWTEST"; // SERVER NOW 20
            $database = "NOWPRD"; // SERVER NOW 22
            $user = "db2admin";
            $passworddb2 = "Sunkam@24809";
            $port="25000";
            $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
            // $conn1 = db2_pconnect($conn_string,'', '');
            $conn1 = db2_connect($conn_string,'', '');

			$q_mesinDIT = db2_exec($conn1, "SELECT DISTINCT 
                                                p.CODE AS BREAKDOWN,
                                                p3.CODE AS WORKORDER,
                                                LISTAGG(TRIM(p4.IDINTDOCUMENTPROVISIONALCODE), ', ') AS INTERNAL_DOC,
                                                SUBSTR(TRIM(d.LONGDESCRIPTION), 1,3)  || '/' || LTRIM(SUBSTR(p3.CODE, 6,6), '0') || ',' || SUBSTR(p3.CREATIONDATETIME, 6,2) || '/' || SUBSTR(p3.CREATIONDATETIME, 3,2) AS NO_FORM,
                                                p.PMBOMCODE AS NO_BARCODE,
                                                p.SYMPTOM,
                                                p2.LONGDESCRIPTION AS PENGGUNA
                                            FROM
                                                PMBREAKDOWNENTRY p
                                            LEFT JOIN PMBOM p2 ON p2.CODE = p.PMBOMCODE 
                                            LEFT JOIN DEPARTMENT d ON d.CODE = p2.DEPARTMENTCODE 
                                            LEFT JOIN PMWORKORDER p3 ON p3.PMBREAKDOWNENTRYCODE = p.CODE 
                                            LEFT JOIN PMWORKORDERACTIVITYSPARES p4 ON p4.PMWORKORDDLTPMWORKORDERCODE = p3.CODE 
                                            LEFT JOIN UNITOFMEASURE u ON u.CODE = p4.QUANTITYUOMCODE
                                            WHERE
                                                NOT p4.IDINTDOCUMENTPROVISIONALCODE IS NULL
												AND LEFT(p.CODE,4) ='BDIT'
                                            GROUP BY
                                                p3.CODE,
                                                d.LONGDESCRIPTION,
                                                p.CODE,
                                                p.PMBOMCODE,
                                                p.SYMPTOM,
                                                p2.LONGDESCRIPTION,
                                                p3.CREATIONDATETIME");
            $no = 1;
            while ($row_mesinDIT = db2_fetch_assoc($q_mesinDIT)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_mesinDIT['NO_FORM'] ?></td>
            <td><?= $row_mesinDIT['BREAKDOWN'] ?></td>
            <td><?= $row_mesinDIT['WORKORDER'] ?></td>
            <td><?= $row_mesinDIT['INTERNAL_DOC'] ?></td>
            <td><?= $row_mesinDIT['NO_BARCODE'] ?></td>
            <td><?= $row_mesinDIT['SYMPTOM'] ?></td>
            <td><?= $row_mesinDIT['PENGGUNA'] ?></td>
            <td>
                <a href="<?= base_url('kartu_riwayat/cetak_pemakaian_spare_part').'/'.$row_mesinDIT['WORKORDER']; ?>" data-toggle="tooltip" title="Print Form Pemakaian Spare Part DIT" class="gi gi-notes_2" target="_blank"></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<hr>
<center><h4>INTERNAL DOCUMENT</h4></center>
<hr>
<table id="example-datatables2" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th width="5%" align="center">No</th>
            <th width="12%" align="center">Internal Document</th>
            <th align="center">Catatan</th>
            <th align="center">Creation Date</th>
            <th align="center">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $hostname="10.0.0.21";
            // $database = "NOWTEST"; // SERVER NOW 20
            $database = "NOWPRD"; // SERVER NOW 22
            $user = "db2admin";
            $passworddb2 = "Sunkam@24809";
            $port="25000";
            $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
            // $conn1 = db2_pconnect($conn_string,'', '');
            $conn1 = db2_connect($conn_string,'', '');

			$q_mesinDIT = db2_exec($conn1, "SELECT 
                                                TRIM(PROVISIONALCODE) AS INTERNAL_DOC,
                                                TRIM(EXTERNALREFERENCE) AS NO_BARCODE,
                                                SUBSTR(i.CREATIONDATETIME, 1,10) || ' ' || SUBSTR(i.CREATIONDATETIME, 12, 8) AS CREATIONDATETIME
                                            FROM
                                                INTERNALDOCUMENT i 
                                            WHERE 
                                                WAREHOUSECODE = 'M231'");
            $no = 1;
            while ($row_mesinDIT = db2_fetch_assoc($q_mesinDIT)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_mesinDIT['INTERNAL_DOC'] ?></td>
            <td><?= $row_mesinDIT['NO_BARCODE'] ?></td>
            <td><?= $row_mesinDIT['CREATIONDATETIME'] ?></td>
            <td>
                <a href="<?= base_url('kartu_riwayat/cetak_pemakaian_spare_part').'/'.$row_mesinDIT['INTERNAL_DOC']; ?>/InternalDocument" data-toggle="tooltip" title="Print Form Pemakaian Spare Part DIT" class="gi gi-notes_2" target="_blank"></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


