<?php

namespace App\Controllers;

class Impression extends Main
{
    protected function actionAdd()
    {
        $obj = new \App\Models\Impression();
        $obj->impression_id = $_POST['impression_id'];
        $obj->user_id = $_POST['user_id'];
        $obj->datetime = $_POST['datetime'];
        $obj->insert();
    }
}