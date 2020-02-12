<?php

class Database{
    public static function connect(){
        $host  = getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
        $user  = getenv('DB_USER') ? getenv('DB_USER') : 'forge';
        $pass  = getenv('DB_PASS') ? getenv('DB_PASS') : 'forge';
        $database  = getenv('DB_DATABASE') ? getenv('DB_DATABASE') : 'forge';
        $db = new mysqli($host, $user, $pass, $database);
        $db->query("set NAMES 'utf-8");
        return $db;
    }
}