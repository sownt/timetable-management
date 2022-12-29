<?php
$controllers = array(
    'pages' => []
);

$controller = 'pages';
$action = 'home';

include_once('controllers/' . $controller . '_controller.php');

$class = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$instance = new $class;
$instance->$action();
?>