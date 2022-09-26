<?php //entrypoint

include_once('./router/routes.php');

$router = new router();
$router->routes();