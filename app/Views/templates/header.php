<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?=$judul;?>
    </title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/');?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/');?>css/shop-homepage.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>css/styles.css" rel="stylesheet">
    <link href="<?=base_url('assets/vendor/');?>fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="<?=base_url('assets/ckeditor/');?>ckeditor.js"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top cust-nav" style="background-color: #007bff !important;">
        <div class="container">
            <a class="navbar-brand" href="<?=base_url();?>">Rental Mobil Dua Putra</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?=($judul == 'Rental Mobil Dua Putra') ? 'active' : '';?>">
                        <a class="nav-link" href="<?=base_url('/');?>">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item <?=($judul == 'Semua Artikel') ? 'active' : '';?>">
                        <a class="nav-link" href="<?=base_url('artikel');?>">Artikel</a>
                    </li>
                    <?php if ($session->get('id_role') == 2): ?>
                        <?php if ($notif == '0'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('customer/transaksi');?>" class="btn btn-primary">Transaksi
                                    <span class="badge badge-light" data-toggle="tooltip" data-placement="bottom" title="<?=$notif;?> Anda Belum Melakukan Transaksi">
                                        <?=$notif;?>
                                    </span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('customer/transaksi');?>" class="btn btn-primary">Transaksi
                                    <span class="badge badge-light" data-toggle="tooltip" data-placement="bottom" title="<?=$notif;?> Transaksi Belum Di Bayar">
                                        <?=$notif;?>
                                    </span>
                                </a>
                            </li>
                        <?php endif;?>
                        <div class="dropdown d-inline">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle mt-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi,
                                <?=$customer['nama'];?>
                            </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href="<?=base_url('customer/panel')?>"><i
                                    class="fa fa-user" aria-hidden="true"></i>Akun</a>
                            <a class="dropdown-item has-icon" href="auth/gantipass"><i class="fa fa-key"
                                    aria-hidden="true"></i> Ganti Password</a>
                            <a class="dropdown-item has-icon" href="<?=base_url('logout');?>"><i
                                    class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                        </div>
                    </div>
                    <?php elseif ($session->get('id_role') == 1): ?>
                        <?php if ($notif == '0'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('customer/transaksi');?>" class="btn btn-primary">Transaksi
                                    <span class="badge badge-light" data-toggle="tooltip" data-placement="bottom" title="<?=$notif;?> Anda Belum Melakukan Transaksi">
                                        <?=$notif;?>
                                    </span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('customer/transaksi');?>" class="btn btn-primary">Transaksi
                                    <span class="badge badge-light" data-toggle="tooltip" data-placement="bottom" title="<?=$notif;?> Transaksi Belum Di Bayar">
                                        <?=$notif;?>
                                    </span>
                                </a>
                            </li>
                        <?php endif;?>
                        <li class="nav-item d-none <?=($judul == 'Daftar') ? 'active' : '';?>">
                            <a class="nav-link" href="<?=base_url('auth/daftar');?>">Daftar</a>
                        </li>
                        <li class="nav-item d-none <?=($judul == 'Login') ? 'active' : '';?>">
                            <a class="nav-link" href="<?=base_url('auth');?>">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item <?=($judul == 'Daftar') ? 'active' : '';?>">
                            <a class="nav-link" href="<?=base_url('auth/daftar');?>">Daftar</a>
                        </li>
                        <li class="nav-item <?=($judul == 'Login') ? 'active' : '';?>">
                            <a class="nav-link" href="<?=base_url('auth');?>">Login</a>
                        </li>
                    <?php endif;?>
                    
                    <?php if ($session->get('id_role') == 1): ?>
                        <div class="dropdown d-inline">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle mt-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi,
                                <?=$customer['nama'];?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="<?=base_url('admin/dashboard');?>">
                                    <iclass="fa fa-tachometer" aria-hidden="true"></i>Dashboard
                                </a>
                                <a class="dropdown-item has-icon" href="admin/auth/gantipass">
                                    <i class="fa fa-key" aria-hidden="true"></i>Ganti Password
                                </a>
                                <a class="dropdown-item has-icon" href="<?=base_url('logout');?>">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
                                </a>
                            </div>
                        </div>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>