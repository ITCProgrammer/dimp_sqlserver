<?php
    if ($this->session->userdata('id_users') == '') {
        redirect('auth/login');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>::DEPT. INVENTORY</title>
    	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/plugins.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/themes.css">
        <script src="<?php echo base_url() ?>uadmin/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php
                $dept = $this->session->userdata('dept_code');
                if ($dept == 'DIT') {
                ?>
            <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="javascript:void(0)"> <i class="fa fa-barcode"></i> Link</a></li>-->
                <?php
                    $mainmenu = $this->db->get_where('mainmenu', ['aktif' => 'y', 'level' => $this->session->userdata('level')])->result();
                        foreach ($mainmenu as $m) {
                            // chek sub menu
                            $submenu = $this->db->get_where('submenu', ['id_mainmenu' => $m->id_mainmenu, 'aktif' => 'y']);
                            if ($submenu->num_rows() > 0) {
                                //looping
                                echo "<li class='dropdown'>
                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'> <i class='" . $m->icon . "'></i> " . strtoupper($m->nama_mainmenu) . " <b class='caret'></b></a>
                    <ul class='dropdown-menu'>";
                                foreach ($submenu->result() as $s) {
                                    echo "<li>" . anchor($s->link, '<i class="' . $s->icon . '"></i> ' . strtoupper($s->nama_submenu)) . "</li>";
                                }
                                echo "</ul>
                </li>";
                                // end looping
                            } else {
                                echo "<li>" . anchor($m->link, '<i class="' . $m->icon . '"></i> ' . strtoupper($m->nama_mainmenu)) . "</li>";
                            }
                        }
                    ?>

            </ul>
             <?php }?>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <?php echo strtoupper($this->session->userdata('username')); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('users/profile', "<i class='fa fa-cogs'></i> Account"); ?></li>
                        <li><?php echo anchor('auth/logout', "<i class='fa fa-sign-out'></i> Logout"); ?></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="background: white;">
        <div class="row">
            <div class="col-md-12">
                <?php echo $contents; ?>
            </div>
        <hr>
    </div>
    <div class="clear:both"></div>
    <hr>
    <p align='center' style="font-weight: bold;" >&copy; DEPARTEMEN DATA &amp; INFORMATIKA | ITTI 2017</p>
    <script src="<?php echo base_url() ?>uadmin/js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
    <script src="<?php echo base_url() ?>uadmin/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>uadmin/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>uadmin/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>assets/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/base/jquery.ui.all.css">
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
                    $( "#datepicker3" ).datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    changeYear: true
                    });

                    $( "#datepicker4" ).datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    changeYear: true
                    });

                    $( "#datepicker5" ).datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    changeYear: true
                    });

                    $( "#datepicker6" ).datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    changeYear: true
                    });

                    $( "#datepicker7" ).datepicker({
                    changeMonth: true,
                    dateFormat: 'yy-mm-dd',
                    changeYear: true
                    });
        });
	</script>
    <script>
        $(function() {
            /* Initialize Datatables */
            $('#example-datatables').dataTable({"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]});
            $('#example-datatables2').dataTable({"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]});
            $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
  </body>
</html>