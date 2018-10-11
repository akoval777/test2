<?php

namespace App\Models;

class Statistics
{
    /**
     * Статистика по конкретному user_id по часам, в указанном временном диапазоне
     * @param int $user_id
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public static function getByHours($user_id, $from, $to)
    {
        $db = Db::instance();
        return $db->query(
            'SELECT date, hour, SUM(impressions) AS impressions, SUM(conversions) AS conversions, payout FROM
              (SELECT DATE(`datetime`) AS date, HOUR(`datetime`) AS hour, 0 AS impressions, COUNT(`conversion_id`) AS conversions, SUM(`payout`) AS payout
                  FROM `conversions` WHERE `conversions`.`user_id` = :user_id AND `datetime` >= :from AND `datetime` < :to GROUP BY date, hour
              UNION ALL
              SELECT DATE(`datetime`) AS date, HOUR(`datetime`) AS hour, COUNT(`impression_id`) AS impressions, 0 AS conversions, 0 AS payout
                  FROM `impressions` WHERE `impressions`.`user_id` = :user_id AND `datetime` >= :from AND `datetime` < :to GROUP BY date, hour) T 
            GROUP BY date, hour',
            [':user_id' => $user_id, ':from' => $from, ':to' => $to],
            static::class
        );
    }

    /**
     * Статистика за текущий месяц с разбивкой по user_id
     */
    public static function getByCurrentMonth()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT user_id, SUM(impressions) AS impressions, SUM(conversions) AS conversions, payout FROM
              (SELECT user_id, 0 AS impressions, COUNT(`conversion_id`) AS conversions, SUM(`payout`) AS payout
                 FROM `conversions` WHERE MONTH(datetime) = MONTH(CURRENT_DATE()) AND YEAR(datetime) = YEAR(CURRENT_DATE()) GROUP BY user_id
              UNION ALL
              SELECT user_id, COUNT(`impression_id`) AS impressions, 0 AS conversions, 0 AS payout
                 FROM `impressions` WHERE MONTH(datetime) = MONTH(CURRENT_DATE()) AND YEAR(datetime) = YEAR(CURRENT_DATE()) GROUP BY user_id) T
            GROUP BY user_id',
            [],
            static::class
        );
    }

    /**
     * Общая статистика по месяцам за прошедший год
     */
    public static function getGeneralStat()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT month, SUM(impressions) AS impressions, SUM(conversions) AS conversions, payout FROM
               (SELECT MONTH(`datetime`) AS month, 0 AS impressions, COUNT(`conversion_id`) AS conversions, SUM(`payout`) AS payout
                  FROM `conversions` WHERE datetime BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW() GROUP BY month
               UNION ALL
               SELECT MONTH(`datetime`) AS month, COUNT(`impression_id`) AS impressions, 0 AS conversions, 0 AS payout
                  FROM `impressions` WHERE datetime BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW() GROUP BY month) T
            GROUP BY month',
            [],
            static::class
        );
    }
}