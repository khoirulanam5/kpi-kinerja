<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PT Internusa Master Niaga| <?php echo $title ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
</head>

<body class="md-skin">

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" width="48" height="48" src="<?php echo base_url('assets/img/avatar.png')?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama') ?></strong></a>
                            </div>
                            <div class="logo-element">
                                Menu
                            </div>
                        </li>
                        <li>
                            <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                        </li>
                        <li <?php echo $active == 'Nilai Realisasi' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('nilai_realisasi')?>"><i class="fa fa-pencil-square"></i> <span class="nav-label">Nilai Realisasi KPI</span></a>
                        </li>
                        <li <?php echo $active == 'Laporan KPI' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('laporan_kpi')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Laporan KPI</span></a>
                        </li>
                        <li <?php echo $active == 'Profil' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('profil_karyawan')?>"><i class="fa fa-user"></i> <span class="nav-label">Profil Karyawan</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Log out</span></a>
                        </li>
                    </ul>

                </div>
            </nav>
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo $this->session->userdata('nama') ?></span>
                            </li>
                            <li>
                                <a href="<?php echo site_url('login/logout')?>">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="wrapper wrapper-content  animated fadeInRight">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Dashboard</h5>
                                </div>
                                <div class="ibox-content">
                                    <p>
                                        <center><strong>------------ Dashboard ------------</strong></center>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="pull-right">
                        <strong>{elapsed_time} detik</strong>
                    </div>
                    <div>
                        <strong>Copyright</strong> PT Internusa Master Niaga © 2024
                    </div>
                </div>

            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

        <!-- Custom and plugin javascript -->
        <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
        <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

    </body>

    </html>
