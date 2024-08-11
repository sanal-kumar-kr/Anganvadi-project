<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//home routes
$routes->get('/', 'AnganvadiController::index');
$routes->get('templates/login', 'AnganvadiController::login');
$routes->get('templates/homeContact', 'AnganvadiController::homeContact');
$routes->get('templates/register', 'AnganvadiController::register');
//teacher routes
$routes->get('/Thome', 'AnganvadiController::Thome');
$routes->get('/Teacher_Fooditems','AnganvadiController::Teacher_Fooditems');
$routes->get('/Stock_update','AnganvadiController::Stock_update');
$routes->get('/Attendence','AnganvadiController::Attendence');
$routes->post('/Add_Food','AnganvadiController::Add_Food');
$routes->post('/Add_stock','AnganvadiController::Add_stock');
$routes->post('/AdultCout','AnganvadiController::AdultCout');
$routes->post('/Add_Attendence','AnganvadiController::Add_Attendence');
$routes->post('/Add_ingredient','AnganvadiController::Add_ingredient');
$routes->get('/View_ingredient','AnganvadiController::View_ingredient');
$routes->get('/Fetch/(:num)','AnganvadiController::Fetch/$1');
$routes->get('/Addquantity/(:num)','AnganvadiController::Addquantity /$1');
$routes->post('/FetchAdd','AnganvadiController::FetchAdd');
$routes->post('/UserLogin','AnganvadiController::UserLogin');
$routes->post('/RegisterUser','AnganvadiController::RegisterUser');
$routes->get('/Logout','AnganvadiController::Logout');
$routes->get('/Approval','AnganvadiController::Approval');
$routes->get('/Decision/(:num)','AnganvadiController::Decision/$1');
$routes->get('/Reject/(:num)','AnganvadiController::Reject/$1');
$routes->get('/View_Attendence','AnganvadiController::View_Attendence');
$routes->get('/Admin_Attendence','AnganvadiController::Admin_Attendence');
$routes->get('/Admin_Ingredients','AnganvadiController::Admin_Ingredients');
$routes->get('/Remove/(:num)','AnganvadiController::Remove/$1');
$routes->get('/Report','AnganvadiController::Report');
$routes->get('/EditStock/(:num)','AnganvadiController::EditStock/$1');
$routes->post('/Edit_stocks/(:num)','AnganvadiController::Edit_stocks/$1');
$routes->post('/ajax/read','AnganvadiController::read');
//admin routes
$routes->get('/Ahome','AnganvadiController::Admin_Home');
$routes->get('/View_food','AnganvadiController::View_food');
$routes->get('/View_stock','AnganvadiController::View_stock');
$routes->get('/View_User','AnganvadiController::View_User');

//------


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
