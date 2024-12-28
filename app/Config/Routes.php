<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('home/detail/(:segment)', 'Home::detail/$1');

$routes->match(['get', 'post'], 'auth', 'Auth::index', ['as' => 'auth']);

$routes->get('customer/kategori/index/(:segment)', 'Customer\Kategori::index/$1');

$routes->match(['get', 'post'], 'auth/login', 'Auth::login');

$routes->match(['get', 'post'], 'artikel', 'Artikel::index');
$routes->get('artikel/baca/(:segment)', 'Artikel::baca/$1');

$routes->get('customer/transaksi', 'Customer\Transaksi::index');
$routes->get('customer/transaksi/batal/(:segment)', 'Customer\Transaksi::batal/$1');
$routes->get('customer/transaksi/pembayaran/(:segment)', 'Customer\Transaksi::pembayaran/$1');
$routes->get('customer/transaksi/cetakInvoice/(:segment)', 'Customer\Transaksi::cetakInvoice/$1');
$routes->post('customer/transaksi/uploadbuktii/', 'Customer\Transaksi::uploadBuktii');

$routes->get('customer/rental/tambahRental/(:segment)', 'Customer\Rental::tambahRental/$1');
$routes->post('customer/rental/tambahRental/(:segment)', 'Customer\Rental::tambahRental/$1');

$routes->get('customer/panel', 'Customer\Panel::index');
$routes->get('customer/panel/artikel', 'Customer\Panel::artikel');
$routes->match(['get', 'post'],'customer/panel/tambahartikel', 'Customer\Panel::tambahartikel');

$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/artikel', 'Admin\Artikel::index');

$routes->match(['get', 'post'], 'auth/daftar', 'Auth::daftar');

$routes->get('logout', 'Auth::logout');