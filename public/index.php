<?php
require_once '../vendor/autoload.php';
const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'src/config/helpers.php';
require_once base_path('src/config/database.php');

$router = new Iamgerwin\PhpTest\Core\Router();
require_once base_path('src/router.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);