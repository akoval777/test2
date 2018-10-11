<?php

namespace App\Controllers;

class Statistics extends Main
{
    /**
     * Статистика по конкретному user_id по часам, в указанном временном диапазоне
     */
    protected function actionHours()
    {
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 1;
        $from = isset($_GET['from']) ? $_GET['from'] : '2018-10-01 00:00:00';
        $to = isset($_GET['to']) ? $_GET['to'] : '2018-10-02 00:00:00';
        $this->view->title = 'Тест';
        $this->view->stat = \App\Models\Statistics::getByHours($user_id, $from, $to);
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    /**
     * Статистика за текущий месяц с разбивкой по user_id
     */
    protected function actionMonth()
    {
        $this->view->title = 'Тест';
        $this->view->stat = \App\Models\Statistics::getByCurrentMonth();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }

    /**
     * Общая статистика по месяцам за прошедший год
     */
    protected function actionYear()
    {
        $this->view->title = 'Тест';
        $this->view->stat = \App\Models\Statistics::getGeneralStat();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }
}