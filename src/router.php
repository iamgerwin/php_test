<?php
use Iamgerwin\PhpTest\Core\Router;
use Iamgerwin\PhpTest\Controllers\NewsController;

$router = new Router;
$router->get('/', 'NewsController');
