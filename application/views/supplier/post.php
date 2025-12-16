<h2 style="font-weight: normal;"><?php echo $title;?></h2>
<div class="push">
    <ol class="breadcrumb">
        <li><i class='fa fa-home'></i> <?php echo anchor('dashboard',"Dashboard");?></li>
        <li><?php echo anchor($this->uri->segment(1),$title);?></li>
        <li class="active">Entry Record</li>
    </ol>
</div>
    
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
    <td width="150">Nama Supplier</td><td>
        <?php echo inputan('text', 'nama_supplier','col-sm-4','Nama Supplier ..', 1, '','');?>
    </td>
    </tr>
        <tr>
    <td width="150">Alamat</td><td>
        <?php echo inputan('text', 'alamat','col-sm-6','Alamat ..', 0, '','');?>
    </td>
    </tr>
    </tr>
        <tr>
    <td width="150">Contact Person</td><td>
        <?php echo inputan('text', 'kontak','col-sm-4','Contact Person ..', 0, '','');?>
    </td>
    </tr>
    </tr>
        <tr>
    <td width="150">No telp</td><td>
        <?php echo inputan('text', 'telp','col-sm-4','No Telp / HP ..', 0, '','');?>
    </td>
    </tr>
	<tr>
    <td width="150">Email</td><td>
        <?php echo inputan('text', 'email','col-sm-4','Email ..', 0, '','');?>
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