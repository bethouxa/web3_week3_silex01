<?php
require_once __DIR__ . '/../vendor/autoload.php';


$app = new Silex\Application();

$app->get('/', 'Itb\MainController::indexAction');
$app->get('/about', 'Itb\MainController::aboutAction');

$app->run();