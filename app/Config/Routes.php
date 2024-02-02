<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login');
$routes->get('/user/register', 'User::register');
$routes->post('/user/save', 'User::save');
$routes->get('/user/login', 'User::login');
$routes->get('prebooking/(:segment)', 'User::prebooking/$1');
$routes->get('/profil/(:segment)', 'User::profil/$1');
$routes->get('/user/profil/(:segment)', 'User::profil/$1');
$routes->get('/logout', 'User::logout');
$routes->get('/jumlahKursi/(:segment)', 'User::jumlahKursi/$1');
$routes->post('/pilihKursi', 'User::pilihKursi');
$routes->post('/pesan', 'User::pesan');
$routes->get('/tiket/(:segment)', 'User::tiket/$1');
$routes->get('/admin/dataFilm', 'Admin::index');
$routes->post('/admin/logout', 'Admin::logout');
$routes->get('/editProfile/(:segment)', 'User::editProfile/$1');
$routes->post('/user/updateProfile', 'User::updateProfile');
$routes->get('/admin/create','Admin::Create');
$routes->post('/admin/saveFilm','Admin::saveFilm');
$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->post('/admin/update/(:segment)', 'Admin::updateFilm/$1');
$routes->get('/admin/dataStudio', 'Admin::studio');
$routes->get('/admin/dataUser', 'Admin::dataUser');
$routes->get('/admin/dataJadwal', 'Admin::dataJadwal');
$routes->get('/admin/riwayatTransaksi/(:segment)', 'Admin::riwayatTransaksi/$1');
$routes->get('/admin/editJadwal/(:segment)','Admin::editJadwal/$1');
$routes->post('/admin/updateJadwal/(:segment)','Admin::updateJadwal/$1');
$routes->get('/admin/dataKursi/(:segment)','Admin::dataKursi/$1');
$routes->get('/admin/tambahJadwal','Admin::tambahJadwal');
$routes->post('/admin/SaveJadwal','Admin::saveJadwal');
$routes->post('/user/search','User::search');
$routes->get('/payment/(:segment)','payment::index/$1');
$routes->get('/profil/deleteTransaction/(:segment)', 'User::deleteTransaction/$1');