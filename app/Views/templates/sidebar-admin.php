<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">Hallo, <?= $customer['nama']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Sedang Login</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="<?= base_url('admin/auth/gantipass'); ?>" class="dropdown-item has-icon">
                                <i class="fas fa-key"></i> Ganti Password
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url('admin/dashboard'); ?>">Rental Dua Putra</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url('admin/dashboard'); ?>">RDP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/dashboard'); ?>">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header">Data Master</li>
                        <li>
                            <a class="nav-link" href="<?= base_url('admin/artikel?page=1'); ?>">
                                <i class="fas fa-list"></i>
                                <span>Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/kategori'); ?>">
                                <i class="fas fa-tag"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/mobil'); ?>">
                                <i class="fas fa-car"></i>
                                <span>Data Mobil</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/type'); ?>">
                                <i class="fas fa-grip-horizontal"></i>
                                <span>Data Type</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/customer'); ?>">
                                <i class="fas fa-users"></i>
                                <span>Data Customer</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/transaksi'); ?>">
                                <i class="fas fa-random"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/laporan'); ?>">
                                <i class="fas fa-clipboard"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="<?= site_url('admin/bank'); ?>">
                                <i class="fas fa-university"></i>
                                <span>Bank</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>