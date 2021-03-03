<?php
/**
 * Routes.php
 *
 * @package Config
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Config;

$routes->group('informations', ['namespace' => 'Information\Controllers'], function ($routes) {
	$routes->get('', 'Informations::index', ['as' => 'information.index']);
	$routes->get('new', 'Informations::new', ['as' => 'information.new']);
	$routes->get('new/(:segment)', 'Informations::new/$1', ['as' => 'information.copy']);
	$routes->get('edit/(:segment)', 'Informations::edit/$1', ['as' => 'information.edit']);
	$routes->get('remove/(:segment)', 'Informations::remove/$1', ['as' => 'information.remove']);
	$routes->post('create', 'Informations::create');
	$routes->post('update/(:segment)', 'Informations::update/$1');
	$routes->post('delete/(:segment)', 'Informations::delete/$1');
});
