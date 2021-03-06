<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'auth']);
// Login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/ceklogin', 'LoginController::ceklogin');
$routes->get('/logout', 'LoginController::logout', ['filter' => 'auth']);
// User
$routes->get('/user', 'UserController::index', ['filter' => 'auth']);
$routes->get('/user/tambah', 'UserController::tambah', ['filter' => 'auth']);
$routes->post('/user/save', 'UserController::save', ['filter' => 'auth']);
$routes->get('/user/update/(:segment)', 'UserController::update/$1', ['filter' => 'auth']);
$routes->post('/user/edit', 'UserController::edit', ['filter' => 'auth']);
$routes->post('/user/delete', 'UserController::delete', ['filter' => 'auth']);
$routes->get('/user/laporan', 'UserController::laporan', ['filter' => 'auth']);
// Supplier
$routes->get('/supplier', 'SupplierController::index', ['filter' => 'auth']);
$routes->post('/supplier/save', 'SupplierController::save', ['filter' => 'auth']);
$routes->post('/supplier/edit', 'SupplierController::edit', ['filter' => 'auth']);
$routes->post('/supplier/delete', 'SupplierController::delete', ['filter' => 'auth']);
$routes->get('/supplier/laporan', 'SupplierController::laporan', ['filter' => 'auth']);
// Barang
$routes->get('/barang', 'BarangController::index', ['filter' => 'auth']);
$routes->get('/barang/tambah', 'BarangController::tambah', ['filter' => 'auth']);
$routes->post('/barang/save', 'BarangController::save', ['filter' => 'auth']);
$routes->get('/barang/update/(:segment)', 'BarangController::update/$1', ['filter' => 'auth']);
$routes->post('/barang/edit', 'BarangController::edit', ['filter' => 'auth']);
$routes->post('/barang/delete', 'BarangController::delete', ['filter' => 'auth']);
$routes->get('/barang/laporan', 'BarangController::laporan', ['filter' => 'auth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
