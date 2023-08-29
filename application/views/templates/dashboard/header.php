<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/adminlte.min.css">
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-white btn-sm text-uppercase">
                        <i class="fas fa-user mr-1"></i>
                        <?= $this->session->userdata('username') ?>
                    </button>
                </li>
                <li class="nav-item">
                    <?= form_open('logout') ?>
                    <button type="submit" class="btn btn-white btn-sm text-danger">Logout</button>
                    <?= form_close() ?>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link text-center">
                <span class="brand-text">SIM<b class="text-success">OBAT</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'menu-open' : '' ?>">
                            <a href="<?= base_url() ?>dashboard" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'user' ? 'menu-open' : '' ?>">
                            <a href="<?= base_url() ?>user" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Manajemen User</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'jenisobat' ? 'menu-open' : '' ?>">
                            <a href="<?= base_url() ?>jenisobat" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Manajemen Jenis Obat</p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->uri->segment(1) == 'obat' ? 'menu-open' : '' ?>">
                            <a href="<?= base_url() ?>obat" class="nav-link">
                                <i class="nav-icon fas fa-pills"></i>
                                <p>Manajemen Obat</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?? 'No Title' ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= @$this->session->flashdata('message') ?>