<?php

namespace Config {

    use PDO;

    class DB {
    
        public static function getConnection(): PDO {
            $host = "localhost";
            $port = 3306;
            $db_name = "belajar_php_todolist";
            $db_user = "root";
            $db_pass = "Faiz1410";

            return new PDO("mysql:host=$host;port=$port;dbname=$db_name", $db_user, $db_pass);
        }
    }
}