<?php

namespace App\Models;

abstract class Main
{
    const TABLE = '';
    public $user_id;
    public $datetime;

    public function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = '
    			INSERT INTO ' . static::TABLE . '
    			(' . implode(',', $columns) . ')
    			VALUES
    			(' . implode(',', array_keys($values)) . ')
            	';
        $db = Db::instance();
        $lastId = $db->execute($sql, $values);
        return $lastId;
    }
}