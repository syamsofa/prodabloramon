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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/token', 'Home::token');
// $routes->post('register', 'Register::index');
$routes->get('me', 'Me::index');
$routes->post('login', 'Login::index');
$routes->get('login', 'Home::login');
$routes->get('logout', 'Home::logout');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('lihat', 'Home::lihat');
$routes->get('masterinisial', 'Home::masterinisial');
$routes->get('relawan', 'Home::relawan');
$routes->post('relawan/tambah', 'Relawan::tambah');
$routes->get('user', 'Home::user');
$routes->get('main', 'Home::main');

$routes->group("api",function($routes){
    $routes->post('register', 'Register::index');
    $routes->post('login', 'Login::index');
    $routes->post('relawan', 'Relawan::index',['filter' => 'authFilter']);
    $routes->post('users', 'Users::index',['filter' => 'authFilter']);
    $routes->post('kab', 'Kab::index',['filter' => 'authFilter']);
    $routes->post('talent', 'Talent::index',['filter' => 'authFilter']);
    $routes->post('talent/byproda', 'Talent::byproda',['filter' => 'authFilter']);
    $routes->post('talent/byproda_hide', 'Talent::byproda_hide',['filter' => 'authFilter']);
    $routes->post('talent/ubahinisial', 'Talent::ubahinisial',['filter' => 'authFilter']);
    $routes->post('talent/ubahwilpembinaan', 'Talent::ubahwilpembinaan',['filter' => 'authFilter']);
    $routes->post('talent/restore', 'Talent::restore',['filter' => 'authFilter']);
    $routes->post('talent/update', 'Talent::update',['filter' => 'authFilter']);
    $routes->get('talent/prosesinisial', 'Talent::prosesinisial');
    $routes->get('talent/dekinisial', 'Talent::dekinisial');

    $routes->post('talent/inisialbyproda', 'Talent::inisialbyproda',['filter' => 'authFilter']);
    $routes->post('talent/individu', 'Talent::individu',['filter' => 'authFilter']);
    $routes->post('talent/ubahkerja', 'Talent::ubahkerja',['filter' => 'authFilter']);
    $routes->post('talent/masterinisial', 'Talent::masterinisial',['filter' => 'authFilter']);
    $routes->post('talent/tambahinisial', 'Talent::tambahinisial',['filter' => 'authFilter']);
    
    
    


});
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
