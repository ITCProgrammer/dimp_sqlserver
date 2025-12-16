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
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/main.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/themes.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/select2.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>uadmin/css/datatables.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/base/jquery.ui.all.css">
        <!-- main.css -->
        <style>
            /*
            =================================================================
            (#m02mls) MAIN LAYOUT
            =================================================================
            */

            body {
                background-color: #f9f9f9;
                color: #333;
                font-family: Roboto, "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            #page-container {
                width: 100%;
                min-width: 320px;
                max-width: 1920px;
                margin: 0 auto;
            }

            #page-container.header-fixed-top {
                padding: 40px 0 0;
            }

            #page-container.header-fixed-bottom {
                padding: 0 0 40px;
            }

            #inner-container {
                background-color: #ddd;
            }

            #page-sidebar {
                width: 201px;
                padding: 0;
                position: absolute;
                border-right: 1px solid #ccc;
            }

            #page-sidebar.navbar-collapse {
                max-height: none !important;
            }

            #page-content {
                margin: 0 0 0 200px;
                padding: 20px;
                background-color: #fff;
                border-left: 1px solid #ccc;
                min-height: 1200px;
            }

            #page-content + footer {
                line-height: 30px;
                text-align: center;
                font-size: 12px;
                height: 30px;
                padding: 0 10px;
                background-color: #f6f6f6;
                border-top: 1px solid #ccc;
                border-left: 1px solid #ccc;
                margin: 0 0 0 200px;
                color: #555;
            }

        </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
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
