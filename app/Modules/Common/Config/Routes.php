<?php
/**
 * Routes.php
 *
 * @package Common\Config
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Common\Config;

$routes->group('file', ['namespace' => 'Common\Controllers'], function ($routes) {
	$routes->post('upload', 'File::upload', ['namespace' => 'Common\Controllers']);
	$routes->get('show/(:any)', 'File::show/$1', ['namespace' => 'Common\Controllers']);
	$routes->get('download/(:any)', 'File::download/$1', ['namespace' => 'Common\Controllers']);
});

// FileUpload Example
$routes->get('examples/fileupload', 'Home::index', ['namespace' => 'Common\Controllers']);
