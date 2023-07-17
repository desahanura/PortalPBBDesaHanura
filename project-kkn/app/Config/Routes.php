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

// PORTAL
$routes->get('/', 'UserPortal::index');
$routes->get('aboutUs/', 'UserPortal::viewAboutUs');

// $routes->addRedirect('/', 'home');

// PBB
$routes->get('lamanOverview/', 'PbbController\Overview::index');
$routes->get('daftarNopPbb/', 'PbbController\DaftarNopPbb::index');
$routes->get('daftarSudahBayar/', 'PbbController\DaftarSudahBayar::index');
$routes->get('daftarDihapus/', 'PbbController\DaftarDihapus::index');
$routes->get('daftarHarusDitagih/', 'PbbController\DaftarHarusDitagih::index');
$routes->get('daftarSpptTidakDitemukan/', 'PbbController\DaftarSpptTidakDitemukan::index');
$routes->get('settings/', 'PbbController\Settings::index');

// CRUD NOPPBB 
// $routes->get('daftarnoppbb', 'DaftarNopPbb::index');
$routes->get('daftarnoppbb/add', 'PbbController\DaftarNopPbb::create');
$routes->post('daftarnoppbb', 'PbbController\DaftarNopPbb::store'); //add
$routes->post('daftarnoppbb/sudahBayar', 'PbbController\DaftarNopPbb::sudahBayar'); //update (sudah bayar)
$routes->post('daftarnoppbb/delete/(:any)', 'PbbController\DaftarNopPbb::delete/$1'); //delete
$routes->get('daftarnoppbb/edit/(:num)', 'PbbController\DaftarNopPbb::edit/$1'); //edit
$routes->post('daftarnoppbb/(:any)', 'PbbController\DaftarNopPbb::update/$1'); //edit
// $routes->delete('daftarnoppbb/(:segment)', 'DaftarNopPbb::destroy/$1'); //edit

// restore
$routes->get('daftardihapus/restore/(:any)', 'DaftarDihapus::restore/$1');
$routes->get('daftardihapus/restore', 'DaftarDihapus::restore');
$routes->delete('daftardihapus/delete2/(:any)', 'DaftarDihapus::delete2/$1');
$routes->delete('daftardihapus/delete2/', 'DaftarDihapus::delete2');

// delete permanent

// Import Excel
$routes->post('noppbb/import', 'DaftarNopPbb::import'); //tambahkan filter

// DATABASE
$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('pbbDesaHanura')) {
        echo 'Database created!';
    }
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
