<?php
    // Koneksi ke database Finishing
    $hostSVR19     = "10.0.0.221";
    $usernameSVR19 = "sa";
    $passwordSVR19 = "Ind@taichen2024";
    $finishing     = "db_finishing";
    $db_finishing  = ["Database" => $finishing, "UID" => $usernameSVR19, "PWD" => $passwordSVR19];
    $conn          = sqlsrv_connect($hostSVR19, $db_finishing);
?>

<h2 style="font-weight: normal;"><?php echo $title; ?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i>                                       <?php echo anchor('dashboard', "Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/kartu_stock_fin', "Kartu Stock Finishing"); ?></li>
        <li class="active">Data</li>
    </ol>
</div>

<form method="post" enctype="multipart/form-data" target="_blank" action="<?php echo base_url('kartu_riwayat/print_kartustok_fin'); ?>" class="form-horizontal">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-sm-2">
                        <label>Nama Barang</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="kode_barang" required>
                            <option value="">Pilih Barang</option>
                            <?php
                                $query = "SELECT kode, name FROM db_finishing.tbl_obat";
                                $stmt  = sqlsrv_query($conn, $query);

                                if ($stmt) {
                                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                                        echo '<option value="' . htmlspecialchars($row['kode']) . '">( ' . htmlspecialchars($row['kode']) . ' ) ' . htmlspecialchars($row['name']) . '</option>';
                                    }
                                } else {
                                    echo "<option disabled>Gagal mengambil data</option>";
                                }

                                sqlsrv_free_stmt($stmt);
                                sqlsrv_close($conn);
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Tanggal Awal -->
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
            <!-- Tanggal Akhir -->
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
            <!-- Tombol Search -->
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
