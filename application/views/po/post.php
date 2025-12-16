<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
<script type="text/javascript" src="<?=base_url();?>assets/themes/js/jquery-ui.js"></script>
<script>
$(function() {
$("#datepicker2").datepicker({        
		 dateFormat: "yyyy-mm-dd",
		 showAnim:"slide",
    });
});
$(function() {
$("#datepicker3").datepicker({        
		 dateFormat: "yyyy-mm-dd",
		 showAnim:"slide",
    });
});
</script>
    
    <?php
echo form_open_multipart($this->uri->segment(1).'/post');
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Record</h3>
  </div>
  <div class="panel-body">
<table class="table table-bordered">
	<tr>
    <td width="250">Nomor PO</td><td>
        <?php echo inputan('text', 'nopo','col-sm-4','Nomor PO ..', 0, '','');?>
    </td>
    </tr>
    <tr>
    <td width="250">Chemicals / Dyestuffs</td><td>
        <?php echo buatcombo('obatid', 'obat', 'col-sm-6', 'deskripsi', 'obat_id', '', array('id'=>'obat_id'))?>
    </td>
    </tr>
    
    <tr>
    <td width="250">Supplier</td><td>
        <?php echo buatcombo('supplierid', 'supplier', 'col-sm-6', 'nama_supplier', 'supplier_id', '', array('id'=>'supplier_id'))?>
    </td>
    </tr>
    
   <tr>
    <td width="250">Tgl Pesan / Qty Pesan</td><td>
        <div class="col-sm-2">
<input type="text" class="form-control" id="datepicker2" name="tglpesan" placeholder="0000-00-00">
</div>
        <?php echo inputan('text', 'qtypesan','col-sm-2','0', 0, '','');?>
        
    </td>
    </tr>   
    
    <tr>
    <td width="250">Tgl Masuk / Qty Masuk</td><td>        
        <div class="col-sm-2">
<input type="text" class="form-control" id="datepicker3" name="tglmasuk" placeholder="0000-00-00">
</div>
        <?php echo inputan('text', 'qtymasuk','col-sm-2','0', 0, '','');?>
        
    </td>
    </tr>   
   
     <tr>
    <td width="250">Qty Sisa PO</td><td>
        <?php echo inputan('text', 'qtysisapo','col-sm-2','0', 0, '','');?> 
    </td>
    </tr>
    <tr>
    <td width="250">Cost / KG</td><td>
        <?php echo inputan('text', 'cost','col-sm-2','0', 0, '','');?> USD
    </td>
    </tr>
    <tr>
         <td></td><td colspan="2"> 
            <input type="submit" name="submit" value="simpan" class="btn btn-danger  btn-sm">
            <?php echo anchor($this->uri->segment(1),'kembali',array('class'=>'btn btn-danger btn-sm'));?>
        </td></tr>
    
</table>
  </div></div>
</form>