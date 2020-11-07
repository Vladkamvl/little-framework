<?php
function vd($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
require_once __DIR__ . '/../vendor/autoload.php';

use \Core\Application;

$app = new Application(dirname(__DIR__));
$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');
$app->router->get('/mobile', ['Mobile::class', 'mobile_method']);
$app->run();