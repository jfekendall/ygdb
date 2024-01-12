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
$routes->get('/', 'Home::index', ['filter' => 'authGuard']);
$routes->post('login', 'Login::index');
$routes->get('logoff', 'Login::logoff');
$routes->post('register', 'Register::store');
$routes->get('collection/add', 'AddCollection::index', ['filter' => 'authGuard']);
$routes->get('collection/manage/(:any)', 'ManageCollection::index/$1', ['filter' => 'authGuard']);
$routes->get('game/(:any)', 'GameController::index/$1', ['filter' => 'authGuard']);

//Colleciton Management API
$routes->post('collection/add', 'API\\GameCollectionCRUD::add');
$routes->post('collection/remove', 'API\\GameCollectionCRUD::remove');
$routes->post('statchange', 'API\\GameCollectionCRUD::stats');
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
