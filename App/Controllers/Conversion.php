<?php

namespace App\Controllers;

class Conversion extends Main
{
    protected function actionAdd()
    {
        $obj = new \App\Models\Conversion();
        $obj->conversion_id = $_POST['conversion_id'];
        $obj->user_id = $_POST['user_id'];
        $obj->payout = $_POST['payout'];
        $obj->datetime = $_POST['datetime'];
        $obj->insert();
    }
}