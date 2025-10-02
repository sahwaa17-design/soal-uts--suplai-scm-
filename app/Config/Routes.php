<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Pages::index');
$routes->get('/order', 'Order::index');
$routes->get('/order/tambah', 'Order::tambah');

$routes->post('/order/update/(:num)', 'Order::update/$1');
$routes->get('/order/ubah/(:num)', 'Order::ubah/$1');
$routes->post('/order/simpan', 'Order::simpan');
$routes->get('/order/detail/(:num)', 'Order::detail/$1');
$routes->delete('/order/hapus/(:num)', 'Order::hapus/$1');

$routes->get('/order/(:any)', 'Buku::detail/$1');

$routes->post('Order/cari', 'Order::index');
