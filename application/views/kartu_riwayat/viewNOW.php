<h2 style="font-weight: normal;"><?php echo $title;?> NOW</h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/index_NOW',"Daftar Kartu Riwayat Mesin NOW"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="7">No</th>
            <th>Dept</th>
            <th>Kode Mesin</th>
            <th>Nama Mesin</th>
            <th>Pengguna</th>
            <th>Ip Address</th>
            <th>Opsi</th>
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
                                                d.LONGDESCRIPTION AS DEPT,
                                                p.CODE AS KODE_MESIN,
                                                TRIM(p.GENERICDATA2) || ', ' || TRIM(p.GENERICDATA3) || ', ' || TRIM(p.GENERICDATA4) AS NAMA_MESIN,
                                                TRIM(p.LONGDESCRIPTION) AS PENGGUNA,
                                                '-' AS IPADDRESS
                                            FROM
                                                PMBOM p
                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE 
                                            WHERE
                                                (p.CREATIONUSER = 'deden.kurnia' OR p.CREATIONUSER = 'mamik.agung' OR p.CREATIONUSER = 'heriben.harna' OR p.CREATIONUSER = 'sultan.hidayat' OR p.CREATIONUSER = 'lilis.handayani')");
            $no = 1;
            while ($row_mesinDIT = db2_fetch_assoc($q_mesinDIT)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row_mesinDIT['DEPT'] ?></td>
            <td><?= $row_mesinDIT['KODE_MESIN'] ?></td>
            <td><?= $row_mesinDIT['NAMA_MESIN'] ?></td>
            <td><?= $row_mesinDIT['PENGGUNA'] ?></td>
            <td><?= $row_mesinDIT['IPADDRESS'] ?></td>
            <td>
                <a href="<?= base_url('kartu_riwayat/cetak_NOW').'/'.$row_mesinDIT['KODE_MESIN']; ?>" data-toggle="tooltip" title="Print" class="gi gi-notes_2" target="_blank"></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


