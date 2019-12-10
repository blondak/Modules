<?php
/**
 * Class RouterFactory
 *
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 * @date: 20.07.13
 */
namespace Flame\Modules\Application;

use Flame\Modules\Application\Routers\IRouteMock;
use Nette\Application\Routers\RouteList;
use Nette\InvalidStateException;
use Nette;

class RouterFactory
{

	/**
	 * @throws \Nette\StaticClassException
	 */
	public function __constructor()
	{
		throw new Nette\StaticClassException;
	}

	/**
	 * @param Nette\Application\IRouter $router
	 * @param array $routes
	 * @throws \Nette\InvalidStateException
	 * @throws \Nette\Utils\AssertionException
	 */
	public static function prependTo(Nette\Application\IRouter &$router, $extensionRoute)
	{
		if (!$router instanceof RouteList) {
			throw new Nette\Utils\AssertionException(
				'If you want to use Flame/Modules then your main router ' .
				'must be an instance of Nette\Application\Routers\RouteList'
			);
		}

		// Add extension route to router
		$router[] = $extensionRoute;

		$lastKey = count($router) - 1;

		foreach ($router as $i => $route) {
		    if ($i === $lastKey) {
		        break;
		    }

		    $router[$i+1] = $route;
		}

		$router[0] = $extensionRoute;
	}
}
