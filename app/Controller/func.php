<?php


namespace App\Controller;



class Func {
	public function guestbook($data) {
$addd = \R::dispense('book');
$addd->name = $_POST['name'];
$addd->email = $_POST['email'];
$addd->msg = $_POST['soob'];
$addd->ipad = $_SERVER['REMOTE_ADDR'];
\R::store($addd);
header('Location: /guestbook');
	}
}
