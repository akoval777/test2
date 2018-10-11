<?php
require_once __DIR__ . '/autoload.php';

$request = $_SERVER['REQUEST_URI'];
$parsed = parse_url($request);
$splits = explode('/', trim($parsed['path'], '/'));
$_controller = !empty($splits[1]) ? '\App\Controllers\\' . ucfirst($splits[1]) : '\App\Controllers\Statistics'; //по умолчанию выбирается контроллер Statistics
$action = !empty($splits[2]) ? ucfirst($splits[2]) : 'Hours'; //по умолчанию выбирается действие Hours

$controller = new $_controller();

if (method_exists($controller, 'action' . $action)) {
    $controller->action($action);
} else {
    echo 'Запрашиваемой страницы не существует';
    exit;
}