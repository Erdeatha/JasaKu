<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Home::index');
 $routes->get('home/detailJasa/(:any)', 'Home::detailJasa/$1');


  $routes->get('/register', 'Register::index');
  $routes->post('/register/save', 'Register::save');


$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

$routes->get('/pesanan/create', 'PesananController::create');
$routes->post('/pesanan/store', 'PesananController::store');
$routes->get('/pesanan/success', 'PesananController::success');

$routes->get('/notifikasi', 'User\Notifikasi::index');
$routes->get('/ditandai', 'User\Ditandai::index');
$routes->get('/obrolan', 'User\Obrolan::index');

$routes->get('/profil', 'User\Profil::index');
$routes->get('/edit-profil', 'User\Profil::edit');
$routes->post('/edit-profil/update/(:num)', 'User\Profil::update/$1');

$routes->get('/alamat', 'User\Alamat::index');

$routes->get('/pengaturan', 'User\Pengaturan::index');
$routes->post('/hapusAkun', 'User\Pengaturan::hapusAkun');
$routes->post('/pengaturan/ubahPassword', 'User\Pengaturan::ubahPassword');

$routes->get('/pesananSaya', 'PesananController::pesananSaya');
$routes->post('/pesanan/cancel/(:num)', 'PesananController::cancel/$1');

$routes->get('/jasaSaya', 'Jasa\Jasa::index');
