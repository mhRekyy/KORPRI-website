<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('visi-misi', 'Pages::visiMisi');
$routes->get('kontak-kami', 'Pages::kontakKami');

