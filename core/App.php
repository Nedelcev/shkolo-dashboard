<?php
class App {
    protected $controller = 'DashboardController';  // Default controller
    protected $method = 'index';                    // Default method
    protected $params = [];                         // Parameters

	public function __construct() {
		$url = $this->parseUrl();

		// Check if a controller is specified in the URL
		if (isset($url[0]) && file_exists('controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once 'controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		// Check if a method is specified in the URL
		if (isset($url[1]) && method_exists($this->controller, $url[1])) {
			$this->method = $url[1];
			unset($url[1]);
		}

		$this->params = $url ? array_values($url) : [];

		// Call the controller method with parameters
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

    // Parse the URL
	private function parseUrl() {
		if (isset($_GET['url'])) {
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
		return []; // Return an empty array if 'url' is not set
	}
}
