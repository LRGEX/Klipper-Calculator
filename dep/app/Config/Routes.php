<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// $routes->match(['get', 'post'], '/', 'MyFirstApp::index');


$routes->get('/', 'Klipper::index');
$routes->post('klipper/calculate', 'Klipper::calculate');


