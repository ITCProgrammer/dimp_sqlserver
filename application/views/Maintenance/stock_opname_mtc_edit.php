<?php $this->load->view('layout/header'); ?>
<style>
    .w90{
        width: 90px !important;
    }
    td, th {
        padding: 5px !important;
    }
</style>
<div class="container" style="background: white;">
    <div class="row" id="loading-row">
        <div class="col-md-12" >
            <div class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="content-row" style="display:none;">
        <div class="col-md-12">
            <!-- Begin Content -->
            <h2 style="font-weight: normal;"><?php echo $title; ?></h2>
            <div class="push">
                <ol class="breadcrumb">
                    <li><i class='fa fa-home'></i><?php echo anchor('dashboard', "Dashboard"); ?></li>
                    <li><?php echo anchor('maintenance/stock_opname_mtc', "List Stock Opname MTC"); ?> </li>
                    <li class="active">Data</li>
                </ol>
            </div>
            <label style="font-weight: bold;margin: 10px 15px 10px 15px;">Periode :<?= timestamp_ke_custom($date1,'d-m-Y') ?></label>
            <a href="<?= base_url('maintenance/stock_opname_mtc'); ?>" class="btn btn-primary btn-social btn-linkedin btn-sm" id="kembali_button" name="kembali" style="width: 100px;float: right;margin: 10px;"><i class="fa fa-list-ol"></i> Kembali</a>
            <table width="100%"  id="tbl_opname" class="table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kode Sparepart</th>
                        <th>Nama Sparepart</th>
                        <th>Zone</th>
                        <th>Location</th>
                        <th>Stock Minimum</br>(Safety Stock)</th>
                        <th>Satuan</th> 
                        <th>Stock Balance</th> 
                        <th>Total Stock</th> 
                        <th style="min-width:75px !important">Action Button</th> 
                        <th>Keterangan Selisih</th> 
                        <th>Last Update</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($tmp as $row){
                        if($row['konfirmasi']){
                            $btn="<i class='fa fa-check' aria-hidden='true'></i> OK";
                            $qty_aktual=nilaiKeRibuan($row['QTY_AKTUAL']);
                        }else{
                            $btn="<button class='btn btn-primary btn-sm save_ts' title='Save' data-toggle='tooltip' ><i class='fa fa-save' aria-hidden='true'></i></button> <button class='btn btn-primary btn-sm confirm_ts' title='Confirm' data-toggle='tooltip' ><i class='fa fa-check-square-o' aria-hidden='true'></i></button>";
                            $qty_aktual="<input type='text' class='form-control w90 qty_ts' id='qty_ts_".$row['id']."'  placeholder='Quantity Total' title='Quantity Total' value='".floatval($row['QTY_AKTUAL'])."'>";
                        }
                    ?>
                    <tr data-id="<?= $row['id']; ?>" data-ts='<?= $row['QTY_AKTUAL']; ?>' data-blc='<?= floatval($row['BASEPRIMARYQUANTITYUNIT']); ?>'>
                        <td><?= $row['KODE_BARANG']; ?></td>
                        <td><?= $row['LONGDESCRIPTION']; ?></td>
                        <td><?= $row['ZONE']; ?></td>
                        <td><?= $row['LOCATION']; ?></td>
                        <td class='text-right'><?= nilaiKeRibuan($row['SAFETYSTOCK']); ?></td>
                        <td class='text-right'><?= $row['BASEPRIMARYUNITCODE']; ?></td>
                        <td class='text-right'><?= nilaiKeRibuan($row['BASEPRIMARYQUANTITYUNIT']); ?></td>
                        <td class='text-right' id="ts_<?= $row['id']; ?>"><?= $qty_aktual ?></td>
                        <td id="confirm_<?= $row['id']; ?>" ><?=$btn;?></td>
                        <td class='text-right' id="blc_<?= $row['id']; ?>"><?= nilaiKeRibuan($row['BASEPRIMARYQUANTITYUNIT']-$row['QTY_AKTUAL']); ?></td>
                        <td id="last_<?= $row['id']; ?>" ><?= timestamp_ke_custom($row['edit_date']); ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
            <!-- End Content -->
        </div>
    <hr>
</div>

<?php $this->load->view('layout/javascript'); ?>

<script>
    $(document).ready(function () {
        let tabel=$('#tbl_opname').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            order: [[1, 'asc']]
        });

        $(document).on('focus', '.qty_ts', function(e) {
            if($(this).val()==0){
                this.value= "";
            }
        });

        $(document).on('focusout', '.qty_ts', function(e) {
            if($(this).val()==""){
                this.value= "0";
            }
        });

        $(document).on('keyup', '.qty_ts', function(e) {
            let val=formatAngka($(this).val());
            this.value= val;
            let parent=$(this).parent().parent();
            let id = parent.data('id');
            let blc = parent.data('blc');
            
            let total_stock=val-blc;
            total_stock=total_stock.toFixed(2);

            $("#blc_"+id).html(nilaiKeRibuan(total_stock, ".",","));
            parent.data('ts',total_stock);
        });

        
        // $(document).on('change', '.qty_ts', function(e) {
        //     let parent=$(this).parent().parent();
        //     save_qtyBatal(parent);
        // });
        $(document).on('click', '.save_ts', function(e) {
            let parent=$(this).parent().parent();
            save_qty(parent);
        });

        $(document).on('click', '.confirm_ts', function() {
            let parent=$(this).parent().parent();
            let id = parent.data('id');
            let dataPost={id_dt: id};
            $.ajax({
                url: '<?= base_url('maintenance/konfirmasi_sto'); ?>',
                type: 'POST',
                data: dataPost,
                dataType: "JSON",
                success: function(response) {
                    if(response.success){ 
                        $("#confirm_"+id).html("<i class='fa fa-check' aria-hidden='true'></i> OK");
                        $("#ts_"+id).html(nilaiKeRibuan($("#qty_ts_"+id).val()));
                    }else{
                        alert("Terjadi Error Update, mohon hubungi DIT");
                    }
                },
                error: function() {
                    alert("Jaringan Terputus, Gagal Confirm");
                }
            });
        });

        function save_qty(parent){
            let id = parent.data('id');
            let val=$("#qty_ts_"+id).val();
            let dataPost={id_dt: id,val:val};
            $.ajax({
                url: '<?= base_url('maintenance/simpan_total_stock_sto'); ?>',
                type: 'POST',
                data: dataPost,
                dataType: "JSON",
                success: function(response) {                    
                    if(response.success){ 
                        $("#last_"+id).html(response.messages[2]);
                    }else{
                        alert("Terjadi Error Update, mohon hubungi DIT");
                    }
                },
                error: function() {
                    alert("Jaringan Terputus, Gagal Confirm");
                }
            });
        }
        //helper function
        function formatAngka(val){
            var Num=val;
            Num += '';
            Num = Num.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1').replace(/^0[^.]/, '0');
            return Num;
        }
        function numberWithCommas(x,ribu) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ribu);
        }

        function nilaiKeRibuan(angka,ribuan,koma){
            try{
                let angkaFloat=parseFloat(angka);
                let str = String(angkaFloat).split(".");
                if(str.length==2){
                    return numberWithCommas(str[0],ribuan)+koma+str[1];
                }else{
                    return numberWithCommas(str[0],ribuan);
                }
            }
            catch (e) {
                    return angka;
            }
        }

        $("#loading-row").hide();
        $("#content-row").show('slow', function() {});
        setTimeout(function() {
            tabel.columns.adjust().draw(false);
        }, 700);
    });
</script>

<?php $this->load->view('layout/footer'); ?>