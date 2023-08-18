<?php
use App\Controllers\UserController;

$router = new AltoRouter();

$router->map('GET', '/', function () {
    include('views/signup.php');
});

$router->map('POST', '/signup', [UserController::class, 'signup']);
$router->map('POST', '/signin', [UserController::class, 'signin']);

$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}
