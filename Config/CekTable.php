<?php

require_once __DIR__ . "/DB.php";

class Create {
        
    static function createTable() {

        $koneksi = \Config\DB::getConnection();
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS todolist
(
id INT NOT NULL AUTO_INCREMENT,
todo VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE = InnoDB;
SQL;
        $koneksi->exec($sql);
    }
}