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
        <li><i class='fa fa-home'></i>                                                                                                                   <?php echo anchor('dashboard', "Dashboard"); ?></li>
        <li><?php echo anchor('kartu_riwayat/laporan_stock_limbah_intake_mtc', "Form Laporan Stock Limbah Dan Intake MTC"); ?> </li>
        <li class="active">Data</li>
    </ol>
</div>

<!-- Alert warning -->
<div id="alertBox" class="alert alert-danger" style="display:none; margin: 15px;">
    Tanggal awal dan tanggal akhir harus berada di bulan dan tahun yang sama!
</div>

<form method="post" enctype="multipart/form-data" target="_blank" action="<?php echo base_url('kartu_riwayat/print_laporan_stock_limbah_intake_mtc'); ?>" class="form-horizontal" id="dateForm">
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
                            <button type="submit" class="btn btn-primary btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Validasi JavaScript -->
<script>
document.getElementById("dateForm").addEventListener("submit", function (e) {
    const date1 = new Date(document.querySelector("input[name='date1']").value);
    const date2 = new Date(document.querySelector("input[name='date2']").value);
    const alertBox = document.getElementById("alertBox");

    if (date1.getMonth() !== date2.getMonth() || date1.getFullYear() !== date2.getFullYear()) {
        e.preventDefault();
        alertBox.style.display = "block";
        window.scrollTo(0, 0);
    } else {
        alertBox.style.display = "none";
    }
});
</script>
