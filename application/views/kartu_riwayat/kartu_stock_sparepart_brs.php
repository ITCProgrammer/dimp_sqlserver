<?php
    // Koneksi ke database MySQL
    $conn = new mysqli("10.0.0.10", "dit", "4dm1n", "dimp");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

?>
<h2 style="font-weight: normal;"><?php echo $title; ?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <?php echo anchor('dashboard', "Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/kartu_stock_sparepart_brs', "Kartu Stok Sparepart BRS (Fast Move)"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>
<form method="post" enctype="multipart/form-data" target="_blank" action="<?php echo base_url('kartu_riwayat/print_kartustok_sparepart_brs'); ?>" class="form-horizontal">
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
                            <option value="">Pilih Barang</option>
                            <?php
                                $query = "SELECT
                                            CONCAT_WS('-',
                                                TRIM(DECOSUBCODE01),
                                                TRIM(DECOSUBCODE02),
                                                TRIM(DECOSUBCODE03),
                                                TRIM(DECOSUBCODE04),
                                                TRIM(DECOSUBCODE05),
                                                TRIM(DECOSUBCODE06)) AS KODE_BARANG,
                                            DESCRIPTION,
                                            id
                                        FROM tbl_master_barang_brs_mtc_fast";

                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            (<?php echo htmlspecialchars($row['KODE_BARANG']); ?>)<?php echo htmlspecialchars($row['DESCRIPTION']); ?>
                                        </option>
                                    <?php endwhile;
                                        }

                                        // Tutup koneksi
                                        $conn->close();
                                    ?>
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
                        <button type="submit" class="btn btn-primary btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

