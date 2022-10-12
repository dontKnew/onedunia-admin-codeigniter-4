<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// normal routes
$routes->get('/', 'Home::index', ["as"=>"login"]);
$routes->post('login', 'Home::adminLogin', ["as"=>"login"]);

$routes->get('logout', 'Home::logout');

//API CALLS
$routes->get('api/single-shipment/(:num)', 'ShipmentAPIController::singleShipment/$1');
$routes->get('api/tracking-status/(:num)', 'ShipmentAPIController::index/$1');
$routes->get('api/search-data/(:any)', 'ShipmentAPIController::searchData/$1');

 $routes->set404Override(function ($routes){
     return view("error");
     // return "page no found";
 });

//authenticated routes

$routes->get('change-password', 'Home::changePassword', ["filter"=>"admin"]);
$routes->post('change-password', 'Home::changePassword', ["filter"=>"admin"]);
$routes->get('profile', 'Home::adminProfile', ["filter"=>"admin"]);

$routes->get('dashboard', 'ShipmentController::index', ["as"=>"dashboard", "filter"=>"admin"]);

$routes->get('add-shipment', 'ShipmentController::addShipment', ["as"=>"add-shipment", "filter"=>"admin"]);
$routes->post('add-shipment', 'ShipmentController::addShipment', ["as"=>"add-shipment", "filter"=>"admin"]);

$routes->get('edit-shipment/(:num)', 'ShipmentController::editShipment/$1', ["as"=>"edit-shipment", "filter"=>"admin"]);
$routes->post('update-shipment', 'ShipmentController::updateShipment', ["as"=>"update-shipment", "filter"=>"admin"]);
$routes->get('delete-shipment/(:num)', 'ShipmentController::deleteShipment/$1', ["as"=>"delete-shipment", "filter"=>"admin"]);

$routes->get('update-status', 'UpdateStatusController::index',["as"=>"update-status", "Filter"=>"admin"]);
$routes->get('update-status/(:num)', 'UpdateStatusController::editStatus/$1',["as"=>"edit-status", "filter"=>"admin"]);
$routes->post('update-status', 'UpdateStatusController::updateStatus',["as"=>"update-status", "filter"=>"admin"]);
$routes->get('delete-status/(:num)', 'UpdateStatusController::deleteStatus/$1', ["as"=>"delete-status", "filter"=>"admin"]);

 $routes->get('forwarding-shipment', 'ForwardController::index', ["filter"=>"admin"]);
$routes->get('forwarding-shipment/delete/(:num)', 'ForwardController::deleteForwarding/$1', [ "filter"=>"admin"]);
 $routes->get('update-forwarding/(:num)', 'ForwardController::editForwarding/$1', [ "filter"=>"admin"]);
 $routes->post('update-forwarding', 'ForwardController::updateForwarding', ["filter"=>"admin"]);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
