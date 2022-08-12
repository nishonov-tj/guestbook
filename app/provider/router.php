<?php
namespace App\provider;
class Router {
	private static $list = [];

	public static function page($url, $file_name) {
		self::$list[] = [
			"url" => $url,
			"file" => $file_name
		];
	}

	public static function post($url, $class, $method) {
		self::$list[] = [
			"url" => $url,
			"class" => $class,
			"method" => $method,
			"post" => true
		];
	}

	public static function start() {
		$query = $_GET['q'];

		foreach (self::$list as $key => $route) {
			if($route['url'] === '/' . $query) {
				if($route["post"] === true && $_SERVER['REQUEST_METHOD'] === "POST") {
					$action = new $route["class"];
					$method = $route["method"];
					$action->$method($_POST);
					die();
				} else {
				require_once 'template/views/' . $route['file'] . '.php';
				die();
			}
			}
		}
		self::not_found();
	}
	private static function not_found() {
		require_once 'template/views/redirect.php';
	}
}