<?php
namespace App\provider;

class App {
	public static function general() {
		self::libs();
		self::bd();
	}
	public static function libs() {
		$config = require_once 'config/app.php';
		foreach ($config['libs'] as $lib) {
			require_once 'libs/' . $lib . '.php';
		}
	}
	public static function bd() {
		//$config = require_once 'db/app.php';
		\R::setup( 'mysql:host=localhost;dbname=guestbook',
        '', '' ); //for both mysql or mariaDB

        if(!\R::testConnection()) {
        	die("Connection error");
        }
	}
}
