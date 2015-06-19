<?php

namespace Framework;

class Application
{
	const BASE_CONTROLLER_NAMESPACE = 'Application\controller';
	private $currentController;
	private $routeCollection = array();

	public function with($controllerName)
	{
		$this->currentController = $controllerName;
		return $this;
	}

	public function get($route, $actionName, array $constrains = null)
	{
		$routeData = array(
			'controller' => $this->currentController,
			'action' => $actionName,
            'constrains' => $constrains,
		);

		$this->routeCollection[$route] = $routeData;

		return $this;
	}

	public function run()
	{
		$requestUri = strtok($_SERVER["REQUEST_URI"],'?');

		foreach ($this->routeCollection as $route => $routeData) {
            $isRouteMatch = $this->resolveMatchRoute($route, $requestUri, $routeData['constrains']);

            if ($isRouteMatch) {
				$controllerName = $routeData['controller'];
				$actionName = $routeData['action'];
				
				$controllerNamespace = self::BASE_CONTROLLER_NAMESPACE . '\\' . $controllerName;
				
				$controller = new $controllerNamespace();
				$controller->$actionName();
				
				exit;
			}
		}

        throw new \HttpUrlException('Not found', 404);
	}

    /**
     * @param string $route
     * @param string $requestUri
     * @return bool
     */
    private function resolveMatchRoute($route, $requestUri, $constrains)
    {
        if ($route == $requestUri) {
            return true;
        }

        $hasRouteVariable = strstr($route, ':');

        if (!$hasRouteVariable) {
            return false;
        }

        $routeTokens = explode('/', $route);
        $requestTokens = explode('/', $requestUri);

        if (count($routeTokens) != count($requestTokens)) {
            return false;
        }

        for ($i = 1; $i < count($routeTokens); $i++) {
            $isRouteVariable = strstr($routeTokens[$i], ':');

            if ($isRouteVariable) {
                $subject = $requestTokens[$i];
                $pattern = '/'.$constrains[$isRouteVariable].'/';
                if (preg_match($pattern, $subject)){
                    continue;
                }

                return false;
            } elseif ($routeTokens[$i] != $requestTokens[$i]) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $route
     * @return string array
     */
    protected function pathTokenizer($path)
    {
        return explode('/', $path);
    }

}