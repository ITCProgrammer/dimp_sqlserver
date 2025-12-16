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
?>
<h2 style="font-weight: normal;"><?php echo $title;?> NOW</h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/kartu_stock', "Laporan Open Tiket"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>
<form method="post" enctype="multipart/form-data" target="_blank" action="<?= base_url('kartu_riwayat/print_laporanstok'); ?>" class="form-horizontal">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Tanggal Awal</label>
                    </div>
                    <div class="col-sm-2">
                        <input style="text-align: center;" type="date" min="2024-01-10" class="form-control input-sm" name="date1" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Tanggal Akhir</label>
                    </div>
                    <div class="col-sm-2">
                        <input style="text-align: center;" type="date" min="2024-01-10" class="form-control input-sm" name="date2" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Breakdown Types</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control" name="type">
                            <option value="Semua">Semua</option>
                            <?php
                                $q_kategori       = db2_exec($conn1, "SELECT * FROM PMBREAKDOWNTYPE p WHERE SHORTDESCRIPTION = 'IT SUPPORT' OR SHORTDESCRIPTION = 'ERP'");
                            ?>
                            <?php while ($row_kategori = db2_fetch_assoc($q_kategori)) : ?>
                                <option value="<?= $row_kategori['CODE']; ?>">(<?= $row_kategori['CODE']; ?>) <?= $row_kategori['LONGDESCRIPTION']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Kategori</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="1">Pencapaian Sasaran Mutu Troubleshooting Dept & Informatika</option>
                            <option value="2">Diagram Kategori</option>
                            <option value="3">Diagram Pie</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

