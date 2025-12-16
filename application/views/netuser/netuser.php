<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DIMP :: Pengguna Jaringan</title>
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/plugins.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url()?>uadmin/css/themes.css">
        <script src="<?php echo base_url()?>uadmin/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
</head>
<h2 style="font-weight: normal;">Daftar Pengguna Jaringan</h2>
	
	<div class="col-sm-3">
<table class="table table-bordered">
    <tr class="success"><th>No</th><th>Kode Komputer</th><th>Nama Pengguna</th><th>Dept</th><th>Network</th><th>Port</th><th>Email Address</th></tr>
	<?php
 $i=1;
 foreach ($record as $r){
	 if (($r->type_id==1)||($r->type_id==2)){
		 $pengguna=$r->nama_pengguna;
		 $compname=$r->computer_name;
		 $os=substr($r->os,8,2);
		 if($r->type_id==1){
		 	$spek1=$r->mb_type." ".$r->prosesor_spec;
		 }else{
			 $spek1=$r->merk." ".$r->type;
		 }
		 $spek=$spek1."/".$r->ram_gb."-".$r->ram_spec."/".$r->hdd_gb."/".$os;
	 }else{
		 $pengguna=$r->pc_connect;
		 $compname="";
		 $spek=$r->merk." ".$r->type;
	 }
 ?>
	<tr>
		<th><?php echo $i; ?></th>
		<th><?php echo $r->device_code; ?></th>
		<th><?php echo $pengguna; ?></th>
		<th><?php echo $r->dept_code; ?></th>
		<th><?php echo $r->keterangan; ?></th>
		<th><?php echo $r->location; ?></th>
		<th><?php echo $r->email_address; ?></th>
	</tr>
  <?php
 $i++;
 }
 ?>
</table>
</div>
<body>
</body>
</html>