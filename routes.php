<?php
$controllers = array(
    'auth' => ['login', 'reset', 'request'],
    'home' => ['display', 'error'],
    'lecture' => ['search', 'register', 'register_confirm', 'register_complete', 'update', 'update_confirm', 'update_complete'],
    'schedule' => ['search', 'register', 'register_confirm', 'register_complete', 'update', 'update_confirm', 'update_complete'],
    'teacher' => ['search', 'register', 'register_confirm', 'register_complete', 'update', 'update_confirm', 'update_complete'],
);

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'display';
    }
} else {
    $controller = 'home';
    $action = 'display';
}

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
};

include_once('app/controllers/' . $controller . '_controller.php');

$t = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$instance = new $t;
$instance->$action();
