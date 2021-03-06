<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components and
 * performing functions that are needed by all your controllers. Extend this
 * class in any new controllers: class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon class instantiation.
	 * These helpers will be available to all other controllers that extend
	 * BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [
		'form',
		'app_utility',
		'cookie',
	];



	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		$this->nbn = model('App\Models\NbnQueryCached', false);
		$this->page = ! empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
		$this->currentUrl = strtok($_SERVER["REQUEST_URI"], '?');
	}

	/**
	 * Determine if this is a post back so you can do that isPostBack thing like they do in ASP and ASP.NET.  Strange
	 * that you don't really see it elsewhere but there you go.
	 */
	protected function isPostBack()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	protected function getPageInfo()
	{

	}
}
