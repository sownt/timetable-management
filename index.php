<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'UserController';
$action = isset($_GET['action']) ? $_GET['action']: 'getUser';

require_once('./app/controller/UserController.php');
$usercontroller = new $controller();
$usercontroller -> $action();

?>
