<h2 style="font-weight: normal;"><?php echo $title; ?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <?php echo anchor('dashboard', "Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/kartu_riwayat_transport', "Daftar Kartu Riwayat PPC Transport"); ?> </li>
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
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Server Test
            // $hostname = "10.0.0.25";
            // $database = "NOWTEST";

            // Server Live
            $hostname = "10.0.0.21";
            $database = "NOWPRD";

            $user        = "db2admin";
            $passworddb2 = "Sunkam@24809";
            $port        = "25000";
            $conn_string = "DRIVER={IBM ODBC DB2 DRIVER}; HOSTNAME=$hostname; PORT=$port; PROTOCOL=TCPIP; UID=$user; PWD=$passworddb2; DATABASE=$database;";
            $conn1       = db2_connect($conn_string, '', '');

            $q_mesin = db2_exec($conn1, "SELECT
                                                d.LONGDESCRIPTION AS DEPT,
                                                p.CODE AS KODE_MESIN,
                                                p.SHORTDESCRIPTION AS NAMA_MESIN
                                            FROM
                                                PMBOM p
                                            LEFT JOIN DEPARTMENT d ON d.CODE = p.DEPARTMENTCODE
                                            LEFT JOIN PMBREAKDOWNENTRY pbe  ON p.CODE = pbe.PMBOMCODE
                                            WHERE pbe.COUNTERCODE IN ('PBD005', 'PBD006')
                                            -- AND p.RESOURCECODE IS NOT NULL
                                            GROUP BY d.LONGDESCRIPTION, p.CODE, p.SHORTDESCRIPTION");
            $no = 1;
            while ($row_mesin = db2_fetch_assoc($q_mesin)) {
            ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row_mesin['DEPT'] ?></td>
            <td><?php echo $row_mesin['KODE_MESIN'] ?></td>
            <td><?php echo $row_mesin['NAMA_MESIN'] ?></td>
            <td>
                <a href="<?php echo base_url('kartu_riwayat/print_kartu_riwayat_transport') . '/' . $row_mesin['KODE_MESIN']; ?>" data-toggle="tooltip" title="Print" class="gi gi-notes_2" target="_blank"></a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>


