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
        <li><?php echo anchor('kartu_riwayat/kartu_stock', "Kartu Stok DIT"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>
<form method="post" enctype="multipart/form-data" target="_blank" action="<?= base_url('kartu_riwayat/print_kartustok'); ?>" class="form-horizontal">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Nama Barang</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="kode_barang">
                            <?php
                                $q_product_master       = db2_exec($conn1, "SELECT
                                                                                TRIM(SUBCODE01) || '-' ||
                                                                                TRIM(SUBCODE02) || '-' ||
                                                                                TRIM(SUBCODE03) || '-' ||
                                                                                TRIM(SUBCODE04) || '-' ||
                                                                                TRIM(SUBCODE05) || '-' ||
                                                                                TRIM(SUBCODE06) AS KODE_BARANG,
                                                                                LONGDESCRIPTION,
                                                                                SHORTDESCRIPTION,
                                                                                SEARCHDESCRIPTION 
                                                                            FROM
                                                                                PRODUCT p
                                                                            RIGHT JOIN BALANCE b ON b.ITEMTYPECODE = p.ITEMTYPECODE
                                                                                            AND b.DECOSUBCODE01 = p.SUBCODE01 
                                                                                            AND b.DECOSUBCODE02 = p.SUBCODE02 
                                                                                            AND b.DECOSUBCODE03 = p.SUBCODE03 
                                                                                            AND b.DECOSUBCODE04 = p.SUBCODE04 
                                                                                            AND b.DECOSUBCODE05 = p.SUBCODE05 
                                                                                            AND b.DECOSUBCODE06 = p.SUBCODE06
                                                                            WHERE
                                                                                p.ITEMTYPECODE = 'SPR'
                                                                                AND p.SUBCODE01 = 'DIT'");
                            ?>
                            <?php while ($row_product_master = db2_fetch_assoc($q_product_master)) : ?>
                                <option value="<?= $row_product_master['KODE_BARANG']; ?>">(<?= $row_product_master['KODE_BARANG']; ?>) <?= $row_product_master['LONGDESCRIPTION']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Tanggal Awal</label>
                    </div>
                    <div class="col-sm-2">
                        <input style="text-align: center;" type="date" class="form-control input-sm" name="date1" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Tanggal Akhir</label>
                    </div>
                    <div class="col-sm-2">
                        <input style="text-align: center;" type="date" class="form-control input-sm" name="date2" autocomplete="off" required>
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

