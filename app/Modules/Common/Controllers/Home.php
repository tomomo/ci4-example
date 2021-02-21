<?php
/**
 * File.php
 *
 * @package Common\Controllers
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Common\Controllers;

use App\Controllers\BaseController;

/**
 * Class Home
 *
 * @package Common\Controllers
 */
class Home extends BaseController
{
	/**
	 * Index
	 *
	 * @return view
	 */
	public function index()
	{
		helper('form');
		return view('Common\Views\home.html');
	}
}
