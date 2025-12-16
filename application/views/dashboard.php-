<h2 style="font-weight: normal;">Welcome to Departments Inventory Online</h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        
    </ol>
</div>
<?php $level=$this->session->userdata('level'); if ($level==1){ ?>
    <div class="col-sm-3">
        <table class="table table-bordered">
            <tr class="success"><th>Users Manajemen</th></tr>
            <tr><th>Untuk menambah atau mengupdate data users</th></tr>
            <tr><th><?php echo anchor('users','Masuk',array('class'=>'btn btn-danger'));?></th></tr>
        </table>
    </div>
<?php } elseif ($level==2) { ?>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Departments Device</th></tr>
            <tr><th>Daftar Induk Mesin dan Prasarana</th></tr>
            <tr><th><?php echo anchor('dimp','Masuk',array('class'=>'btn btn-danger'));?></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Kartu Riwayat Mesin</th></tr>
            <tr><th>Daftar Induk Mesin dan Prasarana</th></tr>
            <tr><th><?php echo anchor('dimp','Masuk',array('class'=>'btn btn-danger'));?></th></tr>
        </table>
    </div>
<?php } else { ?>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Departments Device</th></tr>
            <tr><th>Daftar Induk Mesin dan Prasarana</th></tr>
            <tr><th><?php echo anchor('dimp','Masuk',array('class'=>'btn btn-danger'));?></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Departments Device</th></tr>
            <tr><th>Daftar Kartu Riwayat Mesin</th></tr>
            <tr><th><a href="<?= base_url('kartu_riwayat'); ?>" class="btn btn-danger">MASUK</a></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Departments Device</th></tr>
            <tr><th>Daftar Kartu Riwayat Mesin NOW</th></tr>
            <tr><th><a href="<?= base_url('kartu_riwayat/index_NOW'); ?>" class="btn btn-primary">MASUK</a></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Forms</th></tr>
            <tr><th>Forms Pemakaian Spare Parts Open Tiket <br> Form Pemakaian Spare Parts Internal Document</th></tr>
            <tr><th><a href="<?= base_url('kartu_riwayat/pemakaian_spare_parts'); ?>" class="btn btn-success">MASUK</a></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Forms</th></tr>
            <tr><th>Kartu Stock DIT <br> Laporan Stock All</th></tr>
            <tr><th><a href="<?= base_url('kartu_riwayat/kartu_stock'); ?>" class="btn btn-success">MASUK</a></th></tr>
        </table>
    </div>
    <div class="col-sm-4">
        <table class="table table-bordered">
            <tr class="success"><th>Laporan Ticket</th></tr>
            <tr><th>Laporan Ticket</th></tr>
            <tr><th><a href="<?= base_url('kartu_riwayat/laporan_open_tiket'); ?>" class="btn btn-success">MASUK</a></th></tr>
        </table>
    </div>
<?php } ?>
