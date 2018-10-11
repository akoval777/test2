<?php

namespace App\Models;

trait Singleton
{
    private static $instance;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}