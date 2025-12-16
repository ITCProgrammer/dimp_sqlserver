<!DOCTYPE html>
<html>
  <head>
    <title>::DEPT. INVENTORY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
     <style>
      .btn-file {
          position: relative;
          overflow: hidden;
      }
      .btn-file input[type=file] {
          position: absolute;
          top: 0;
          right: 0;
          min-width: 100%;
          min-height: 100%;
          font-size: 999px;
          text-align: right;
          filter: alpha(opacity=0);
          opacity: 0;
          background: CornflowerBlue ;
          cursor: inherit;
          display: block;
      }
      input[readonly] {
        background-color: white !important;
        cursor: text !important;
      }
    </style>
  </head>
  <body>  
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#" >DEPARTMENTS INVENTORY ONLINE</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  
</nav>
      <div class="container">
          <div class="col-md-3"></div>
          <div class="col-md-5">
              <?= form_open('auth/login'); ?>
              <table class="table table-bordered">
              <tr><td>Username</td><td>  
                      <div class="input-group">
                          <input type="text" name="username" required="" placeholder="Username ..." autofocus class="form-control">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  </div></td></tr>
              <tr><td>Password</td><td> <div class="input-group">
                          <input type="password" name="password" placeholder="Password" required="" class="form-control">
  <span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
</div></td></tr>
              <tr><td></td><Td><?php //echo $image;?>
                      <div class="col-md-8">
                          <input type="hidden" name="kode_aman" placeholder="Masukan Kode Keamanan" class="form-control"></div>
                  </td></tr>
              <tr><td></td><td> </td></tr>
              <tr><td></td><td><input type="submit" name="submit" value="Login" class="btn btn-danger"></td></tr>
          </table>   
          </form>
          </div>    
           <div class="col-md-3"></div>
           
      </div>
      
      <hr>
      <p align="center">PT INDO TAICHEN TEXTILE INDUSTRY | DIT @2017</p>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/1.8.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/icon.jpg">
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.datepicker.js"></script>
	
  <script>
    $(function() {
      $( "#datepicker" ).datepicker({
                  changeMonth: true,
                  dateFormat: 'yy-mm-dd',
                  changeYear: true
                  });

                  $( "#datepicker1" ).datepicker({
                  changeMonth: true,
                  dateFormat: 'yy-mm-dd',
                  changeYear: true
                  });

                  $( "#datepicker2" ).datepicker({
                  changeMonth: true,
                  dateFormat: 'yy-mm-dd',
                  changeYear: true
                  });
    });
	</script>
  </body>
</html>