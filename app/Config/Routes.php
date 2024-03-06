<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/dashboard', 'Home::dashboard');

$routes->get('/kategori','CategoriesController::list');
$routes->post('/kategori/simpan','CategoriesController::post');
$routes->post('/kategori/hapus','CategoriesController::delete');

$routes->get('/pelanggan','CustomersController::list');
$routes->post('/pelanggan/simpan','CustomersController::post');
$routes->post('/pelanggan/hapus','CustomersController::delete');

$routes->get('/karyawan','EmployeesController::list');
$routes->post('/karyawan/simpan','EmployeesController::post');
$routes->post('/karyawan/hapus','EmployeesController::delete');

$routes->get('/transaksi','TransactionsController::list');
// $routes->get('/transaksi','TransactionsController::list');
// $routes->get('/transaksi','TransactionsController::list');
$routes->get('/transaksi/(:num)','TransactionsController::getDetail/$1');

service('auth')->routes($routes);
