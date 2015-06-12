<?php

namespace Framework;

class Application
{
	const BASE_CONTROLLER_NAMESPACE = 'Application\controller';
	private $currentController;
	private $routing = array();

	public function with($controllerName)
	{
		$this->currentController = $controllerName;
		return $this;
	}

	public function get($path, $actionName)
	{
		$route = array(
			'controller' => $this->currentController,
			'action' => $actionName,
		);

		$this->routing[$path] = $route;

		return $this;
	}

	public function run()
	{
		$requestUri = strtok($_SERVER["REQUEST_URI"],'?');

		foreach ($this->routing as $route => $data) {
            $resolveRoute = $this->resolveMatchRoute($route, $requestUri);

            if ($resolveRoute) {
				$controllerName = $data['controller'];
				$actionName = $data['action'];
				
				$controllerNamespace = self::BASE_CONTROLLER_NAMESPACE . '\\' . $controllerName;
				
				$controller = new $controllerNamespace();
				$controller->$actionName();
				
				exit;
			}
		}
	}

    /**
     * @param string $route
     * @param string $requestUri
     * @return bool
     */
    private function resolveMatchRoute($route, $requestUri)
    {
        $salsa = pathTokenizer($route);
        return true;
    }

    private function pathTokenizer($path)
    {
        return explode('/', $path);
    }



}