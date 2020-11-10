<?php
function vd($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
require_once __DIR__ . '/../vendor/autoload.php';

use \Core\Application;

$app = new Application(dirname(__DIR__));
$app->router->get('/', [\Controllers\SiteController::class, 'home']);

$app->router->get('/login', [\Controllers\AuthController::class, 'login']);
$app->router->post('/login', [\Controllers\AuthController::class, 'login']);
$app->router->get('/register', [\Controllers\AuthController::class, 'register']);
$app->router->post('/register', [\Controllers\AuthController::class, 'register']);
$app->run();

//echo evenOrOdd("112");
//function evenOrOdd($nums){
//    $sumOdd = 0;
//    $sumEven = 0;
//    $nums = str_split($nums);
//    foreach ($nums as $num){
//        if($num % 2 === 0){
//            $sumEven += $num;
//        }else{
//            $sumOdd += $num;
//        }
//    }
//    if($sumEven === $sumOdd){
//        return 'Even and Odd the same';
//    }else{
//        return $sumEven > $sumOdd ? 'Even greater than odd' : 'Odd greater than Even';
//    }
//}
