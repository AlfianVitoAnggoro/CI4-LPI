<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultController('login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Users
$routes->get('/user', 'User::index');
$routes->post('/user', 'User::create');
$routes->get('/user/(:num)', 'User::detail/$1');
$routes->get('/user/update/(:num)', 'User::update/$1');
$routes->post('/user/update/(:num)', 'User::actionUpdate/$1');
$routes->get('/user/delete/(:num)', 'User::delete/$1');

// Pegawai
$routes->get('/pegawai', 'Pegawai::index');
$routes->post('/pegawai', 'Pegawai::create');
$routes->get('/pegawai/(:num)', 'Pegawai::detail/$1');
$routes->get('/pegawai/update/(:num)', 'Pegawai::update/$1');
$routes->post('/pegawai/update/(:num)', 'Pegawai::actionUpdate/$1');
$routes->get('/pegawai/delete/(:num)', 'Pegawai::delete/$1');


$routes->get('/dashboard', 'Dashboard::index');
