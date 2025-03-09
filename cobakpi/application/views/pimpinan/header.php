<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> PT Internusa Master Niaga | <?php echo $title ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logo.png')?>" />
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/datapicker/datepicker3.css')?>" rel="stylesheet">
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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama') ?></strong></span></span>Divisi <?php echo $this->session->userdata('nama_divisi'); ?></a>
                        </div>
                        <div class="logo-element">
                            Menu
                        </div>
                    </li>
                    <li>
                        <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                    </li>
                    <li <?php echo $active == 'Laporan KPI' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo site_url('laporan_kpi_karyawan')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Laporan KPI (karyawan)</span></a>
                    </li>
                    <?php if($this->session->userdata('bos') != 1) { ?>
                        <li <?php echo $active == 'Laporan KPI Pimpinan' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('laporan_kpi_karyawan/pimpinan')?>"><i class="fa fa-dashboard"></i> <span class="nav-label">Laporan KPI (pimpinan)</span></a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('id_divisi') != 2) { ?>
                        <li <?php echo $active == 'Nilai Realisasi' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('nilai_realisasi_pimpinan')?>"><i class="fa fa-pencil-square"></i> <span class="nav-label">Nilai Realisasi KPI (karyawan)</span></a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('bos') != 1) { ?>
                        <li <?php echo $active == 'Nilai Realisasi Pimpinan' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('nilai_realisasi_pimpinan/pimpinan')?>"><i class="fa fa-pencil-square"></i> <span class="nav-label">Nilai Realisasi KPI (pimpinan)</span></a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('bos') == 1) { ?>
                        <li <?php echo $active == 'KPI' ? 'class="active"' : ''; ?>>
                            <a href="<?php echo site_url('kpi')?>"><i class="fa fa-wrench"></i> <span class="nav-label">Kelola KPI</span></a>
                        </li>
                    <?php } ?>
                    <li <?php echo $active == 'Daftar Karyawan' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo site_url('daftar_karyawan')?>"><i class="fa fa-users"></i> <span class="nav-label">Daftar Karyawan</span></a>
                    </li>
                    <li <?php echo $active == 'Profil' ? 'class="active"' : ''; ?>>
                        <a href="<?php echo site_url('profil_pimpinan')?>"><i class="fa fa-user"></i> <span class="nav-label">Profil Penilai</span></a>
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