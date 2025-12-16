<?php $this->load->view('layout/header'); ?>
<style>
    .card {--bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13,110,253;
        --bs-secondary-rgb: 108,117,125;
        --bs-success-rgb: 25,135,84;
        --bs-info-rgb: 13,202,240;
        --bs-warning-rgb: 255,193,7;
        --bs-danger-rgb: 220,53,69;
        --bs-light-rgb: 248,249,250;
        --bs-dark-rgb: 33,37,41;
        --bs-primary-text-emphasis: #052c65;
        --bs-secondary-text-emphasis: #2b2f32;
        --bs-success-text-emphasis: #0a3622;
        --bs-info-text-emphasis: #055160;
        --bs-warning-text-emphasis: #664d03;
        --bs-danger-text-emphasis: #58151c;
        --bs-light-text-emphasis: #495057;
        --bs-dark-text-emphasis: #495057;
        --bs-primary-bg-subtle: #cfe2ff;
        --bs-secondary-bg-subtle: #e2e3e5;
        --bs-success-bg-subtle: #d1e7dd;
        --bs-info-bg-subtle: #cff4fc;
        --bs-warning-bg-subtle: #fff3cd;
        --bs-danger-bg-subtle: #f8d7da;
        --bs-light-bg-subtle: #fcfcfd;
        --bs-dark-bg-subtle: #ced4da;
        --bs-primary-border-subtle: #9ec5fe;
        --bs-secondary-border-subtle: #c4c8cb;
        --bs-success-border-subtle: #a3cfbb;
        --bs-info-border-subtle: #9eeaf9;
        --bs-warning-border-subtle: #ffe69c;
        --bs-danger-border-subtle: #f1aeb5;
        --bs-light-border-subtle: #e9ecef;
        --bs-dark-border-subtle: #adb5bd;
        --bs-white-rgb: 255,255,255;
        --bs-black-rgb: 0,0,0;
        --bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
        --bs-body-color: #212529;
        --bs-body-color-rgb: 33,37,41;
        --bs-body-bg: #fff;
        --bs-body-bg-rgb: 255,255,255;
        --bs-emphasis-color: #000;
        --bs-emphasis-color-rgb: 0,0,0;
        --bs-secondary-color: rgba(33, 37, 41, 0.75);
        --bs-secondary-color-rgb: 33,37,41;
        --bs-secondary-bg: #e9ecef;
        --bs-secondary-bg-rgb: 233,236,239;
        --bs-tertiary-color: rgba(33, 37, 41, 0.5);
        --bs-tertiary-color-rgb: 33,37,41;
        --bs-tertiary-bg: #f8f9fa;
        --bs-tertiary-bg-rgb: 248,249,250;
        --bs-heading-color: inherit;
        --bs-link-color: #0d6efd;
        --bs-link-color-rgb: 13,110,253;
        --bs-link-decoration: underline;
        --bs-link-hover-color: #0a58ca;
        --bs-link-hover-color-rgb: 10,88,202;
        --bs-code-color: #d63384;
        --bs-highlight-color: #212529;
        --bs-highlight-bg: #fff3cd;
        --bs-border-width: 1px;
        --bs-border-style: solid;
        --bs-border-color: #dee2e6;
        --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
        --bs-border-radius: 0.375rem;
        --bs-border-radius-sm: 0.25rem;
        --bs-border-radius-lg: 0.5rem;
        --bs-border-radius-xl: 1rem;
        --bs-border-radius-xxl: 2rem;
        --bs-border-radius-2xl: var(--bs-border-radius-xxl);
        --bs-border-radius-pill: 50rem;
        --bs-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        --bs-box-shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        --bs-box-shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        --bs-box-shadow-inset: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        --bs-focus-ring-width: 0.25rem;
        --bs-focus-ring-opacity: 0.25;
        --bs-focus-ring-color: rgba(13, 110, 253, 0.25);
        --bs-form-valid-color: #198754;
        --bs-form-valid-border-color: #198754;
        --bs-form-invalid-color: #dc3545;
        --bs-form-invalid-border-color: #dc3545;

        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-title-color: ;
        --bs-card-subtitle-color: ;
        --bs-card-border-width: var(--bs-border-width);
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: var(--bs-border-radius);
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(var(--bs-border-radius) - (var(--bs-border-width)));
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(var(--bs-body-color-rgb), 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: var(--bs-body-bg);
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        color: var(--bs-body-color);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius)
    }
    .card>hr {
        margin-right: 0;
        margin-left: 0
    }
    .card>.list-group {
        border-top: inherit;
        border-bottom: inherit
    }
    .card>.list-group:first-child {
        border-top-width: 0;
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius)
    }
    .card>.list-group:last-child {
        border-bottom-width: 0;
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        border-bottom-left-radius: var(--bs-card-inner-border-radius)
    }
    .card>.card-header+.list-group,.card>.list-group+.card-footer {
        border-top: 0
    }
    .card-body {
        flex: 1 1 auto;
        padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        color: var(--bs-card-color)
    }
    .card-title {
        margin-bottom: var(--bs-card-title-spacer-y);
        color: var(--bs-card-title-color)
    }
    .card-subtitle {
        margin-top: calc(-.5 * var(--bs-card-title-spacer-y));
        margin-bottom: 0;
        color: var(--bs-card-subtitle-color)
    }
    .card-text:last-child {
        margin-bottom: 0
    }
    .card-link+.card-link {
        margin-left: var(--bs-card-spacer-x)
    }
    .card-header {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        margin-bottom: 0;
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color)
    }
    .card-header:first-child {
        border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0
    }
    .card-footer {
        padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
        color: var(--bs-card-cap-color);
        background-color: var(--bs-card-cap-bg);
        border-top: var(--bs-card-border-width) solid var(--bs-card-border-color)
    }
    .card-footer:last-child {
        border-radius: 0 0 var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius)
    }
    .card-header-tabs {
        margin-right: calc(-.5 * var(--bs-card-cap-padding-x));
        margin-bottom: calc(-1 * var(--bs-card-cap-padding-y));
        margin-left: calc(-.5 * var(--bs-card-cap-padding-x));
        border-bottom: 0
    }
    .card-header-tabs .nav-link.active {
        background-color: var(--bs-card-bg);
        border-bottom-color: var(--bs-card-bg)
    }
    .card-header-pills {
        margin-right: calc(-.5 * var(--bs-card-cap-padding-x));
        margin-left: calc(-.5 * var(--bs-card-cap-padding-x))
    }
    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: var(--bs-card-img-overlay-padding);
        border-radius: var(--bs-card-inner-border-radius)
    }
    .card-img,.card-img-bottom,.card-img-top {
        width: 100%
    }
    .card-img,.card-img-top {
        border-top-left-radius: var(--bs-card-inner-border-radius);
        border-top-right-radius: var(--bs-card-inner-border-radius)
    }
    .card-img,.card-img-bottom {
        border-bottom-right-radius: var(--bs-card-inner-border-radius);
        border-bottom-left-radius: var(--bs-card-inner-border-radius)
    }
    .card-group>.card {
        margin-bottom: var(--bs-card-group-margin)
    }
    @media (min-width: 576px) {
        .card-group {
            display:flex;
            flex-flow: row wrap
        }
        .card-group>.card {
            flex: 1 0 0;
            margin-bottom: 0
        }
        .card-group>.card+.card {
            margin-left: 0;
            border-left: 0
        }
        .card-group>.card:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }
        .card-group>.card:not(:last-child)>.card-header,.card-group>.card:not(:last-child)>.card-img-top {
            border-top-right-radius: 0
        }
        .card-group>.card:not(:last-child)>.card-footer,.card-group>.card:not(:last-child)>.card-img-bottom {
            border-bottom-right-radius: 0
        }
        .card-group>.card:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }
        .card-group>.card:not(:first-child)>.card-header,.card-group>.card:not(:first-child)>.card-img-top {
            border-top-left-radius: 0
        }
        .card-group>.card:not(:first-child)>.card-footer,.card-group>.card:not(:first-child)>.card-img-bottom {
            border-bottom-left-radius: 0
        }
    }
    /* ====== Demand list ====== */
    .demand-card { border:1px solid #e9ecef; border-radius:.75rem; }
    .demand-card .card-header{ background:linear-gradient(180deg,#fff,#f8f9fa); border-bottom:1px solid #e9ecef; }
    .demand-grid{
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 8px 12px;
    }
    .demand-item{
        border:1px solid #dee2e6; border-radius:.5rem; padding:.6rem .8rem; background:#fff; color:#495057;
        white-space:nowrap; text-align:center; box-shadow:inset 0 1px 0 rgba(0,0,0,.02);
        transition:transform .08s ease, box-shadow .2s ease, border-color .2s ease;
        cursor: pointer;
    }
    .demand-item:hover{ transform:translateY(-1px); box-shadow:0 2px 10px rgba(0,0,0,.08); border-color:#cfd4da; }
    .tooltip.custom-tip{
        --bs-tooltip-bg:#fff; --bs-tooltip-color:#111827; --bs-tooltip-opacity:1; --bs-tooltip-arrow-color:#fff;
        filter: drop-shadow(0 8px 20px rgba(0,0,0,.15)); z-index: 3000;
    }
    .tooltip.custom-tip .tooltip-inner{
        background:#fff; color:#111827; border:1px solid rgba(0,0,0,.08); border-radius:.5rem;
        text-align:left; padding:.6rem .75rem; min-width:220px; max-width: 360px; font-size:.78rem; line-height:1.25;
    }        
    .d-flex {
        display: flex!important
    }
    .justify-content-between {
        justify-content: space-between!important
    }
    .align-items-center {
        align-items: center!important
    }
    .gap-2 {
        gap: .5rem!important
    }
    .mb-0 {
        margin-bottom: 0!important
    }
    .shadow-sm {
        box-shadow: var(--bs-box-shadow-sm)!important
    }
</style>
<div class="container" style="background: white;">
    <div class="row">
         <!-- Begin Content -->
        <div class="col-md-12">
            <h2 style="font-weight: normal;"><?= $title; ?></h2>
            <div class="push">
                <ol class="breadcrumb">
                    <li><i class='fa fa-home'></i><?= anchor('dashboard', "Dashboard"); ?></li>
                    <li><?= anchor('maintenance/stock_opname_mtc', "List Stock Opname MTC"); ?> </li>
                    <li class="active">Data</li>
                </ol>
            </div>

            <!-- Alert warning -->
            <div id="alertBox" class="alert alert-danger" style="display:none; margin: 15px;">
                Tanggal awal dan tanggal akhir harus berada di bulan dan tahun yang sama!
            </div>

            <form method="post" enctype="multipart/form-data" action="<?= base_url('maintenance/stock_opname_mtc_create'); ?>" class="form-horizontal" id="filter_opname">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label>Tanggal</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input style="text-align: center;" type="date" min="2024-01-10" class="form-control" name="date1" id="date1" autocomplete="off" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary btn-social btn-linkedin btn-sm" id="submit_button" name="save" style="width: 60%;display:none"><i class="fa fa-list-ol"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card demand-card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">List Stock Opname Maintenance</h5>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <!-- <input id="filterInput" class="form-control form-control-sm" placeholder="Filter code…"> -->
                        <button id="reset_button" class="btn btn-sm btn-outline-primary">Reset</button>
                    </div>
                    </div>

                    <div class="card-body">
                    <div id="demandGrid" class="demand-grid"></div>
                    <div id="emptyState" class="text-center text-muted py-4 d-none">
                        Tidak ada data yang ditampilkan.
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    <hr>
</div>
<?php $this->load->view('layout/javascript'); ?>
<!-- Validasi JavaScript -->
<script>
    $(document).ready(function () {
        var counter = 1;
        var bln=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]
        function refresh_list(){
            $( "#demandGrid" ).html("");
            $.ajax({
                url: '<?= base_url('maintenance/list_stock_opname'); ?>',
                type: 'POST',
                data: {},
                dataType: "JSON",
                success: function(response) {
                    if(response.success){
                        if(response.data.length==0){                   
                            $("#emptyState").show();
                        }else{                             
                            $("#emptyState").hide();
                        }
                        $.each( response.data, function( key, value ) {
                            setTimeout(function() {       
                                let tmp_date = new Date(value.date);
                                let tanggal = tmp_date.getDate()  + "-" + (tmp_date.getMonth()+1) + "-" + tmp_date.getFullYear();
                                let bln_thn = bln[tmp_date.getMonth()]+" "+tmp_date.getFullYear();
                                counter++;
                                let tmp=`
                                    <div class="card all_card card_`+value.date.replaceAll("-", "")+`" id="counter`+counter+`" style="display:none;">
                                        <h5 class="card-header">Opname `+bln_thn+`</h5>
                                        <div class="card-body">
                                            <p class="card-text"> 
                                            Tgl tarikan Balance    : `+tanggal+` </br>
                                            User Tarik balance    : `+value.user+` </br>
                                            Jumlah item terconfirm   : `+value.konfirm+` </br>
                                            Sisa Item belum diinput stock  : `+value.nilai_nol+` </br>
                                            </p>
                                            <a href="<?= base_url('maintenance/stock_opname_mtc_edit'); ?>?random=`+value.TMP_ID+`&date=`+value.date+`" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="<?= base_url('maintenance/stock_opname_mtc_excel'); ?>?random=`+value.TMP_ID+`&date=`+value.date+`" class="btn btn-success"><i class="fa fa-table"></i> Excel</a>
                                        </div>
                                    </div>`;
                                $( "#demandGrid" ).prepend(tmp);
                                $("#counter"+counter).show('slow', function() {});
                            }, 100);                            
                        });
                    }else{
                        alert("Terjadi Error Update, mohon hubungi DIT");
                    }
                },
                error: function() {
                    alert("Jaringan Terputus, Gagal Confirm");
                }
            });
        }
        refresh_list();
    
        $('#date1').on('change', function(event) {
            let tgl=$('#date1').val();
            if(tgl!=""){
                $(".all_card").hide();
                let filter = $(".card_"+tgl.replaceAll("-", ""));
                if (filter.length != 0 ){
                    $("#emptyState").hide();
                    $("#submit_button").hide();                
                    setTimeout(function() {
                        filter.show('slow', function() {});
                    }, 100);
                }else{
                    $("#emptyState").show();
                    $("#submit_button").show();              
                }
            }
        });

        $('#reset_button').on('click', function(event) {
            refresh_list();
            $('#date1').val("");
            $("#submit_button").hide();
        });

        $('#submit_button').on('click', function(e) {
            e.preventDefault();
            $('#submit_button').html('<i class="fa fa-spinner"></i> Loading ...').prop('disabled', true);
            $("#filter_opname").submit();
        });
  
    });
</script>

<?php $this->load->view('layout/footer'); ?>