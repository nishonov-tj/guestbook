<?php
use App\provider\Router;
use App\Controller\Func;

Router::page('/', 'home');
Router::page('/guestbook', 'guestbook');

Router::post('/func/guestbook', Func::class, 'guestbook');

Router::start();