<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			// Ação de IndexController.php
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			// Ação de IndexController.php
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			// Ação de IndexController.php
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			// Ação de AuthController.php
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['timeline'] = array(
			'route' => '/timeline',
			// Ação de AppController.php
			'controller' => 'AppController',
			'action' => 'timeline'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			// Ação de AuthController.php
			'controller' => 'AuthController', // Esta rota ficou em AuthController, pois se trata de um processo que envolve o login
			'action' => 'sair'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			// Ação de AuthController.php
			'controller' => 'AuthController', // Esta rota ficou em AuthController, pois se trata de um processo que envolve o login
			'action' => 'sair'
		);

		$this->setRoutes($routes);
	}

}

?>