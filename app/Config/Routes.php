<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::home');
$routes->get('/kategori','CategoriesController::list');
$routes->post('/kategori/simpan','CategoriesController::post');
$routes->post('/kategori/hapus','CategoriesController::delete');

service('auth')->routes($routes);
