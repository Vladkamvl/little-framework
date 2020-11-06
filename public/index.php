<?php
function vd($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
require_once __DIR__ . '/../vendor/autoload.php';

use \Core\Application;

$app = new Application();

$app->router->get('/', function(){
    return 'index';
});

$app->router->get('/contact', function(){
    return 'contact';
});
$app->router->get('/mobile', ['Mobile::class', 'mobile_method']);
$app->run();