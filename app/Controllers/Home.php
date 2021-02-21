<?php
/**
 * Home.php
 *
 * @package App\Controllers
 * @author  tomomo <eclairpark@gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace App\Controllers;

/**
 * Class Home
 *
 * @package App\Controllers
 */
class Home extends BaseController
{
	/**
	 * ホーム画面表示
	 *
	 * @return void
	 */
	public function index()
	{
		phpinfo();
		// return view('welcome_message');
	}
}
