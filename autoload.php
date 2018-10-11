<?php
function my_autoloader($class)
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        exit('Запрашиваемой страницы не существует');
    }
}

spl_autoload_register('my_autoloader');