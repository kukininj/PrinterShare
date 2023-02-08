<?php

require_once __DIR__ . '/../../Database.php';

class Repository
{
    private static ?Database $database = null;

    public static function database()
    {
        if (is_null(self::$database))
            self::$database = new Database();
        return self::$database;
    }
}
