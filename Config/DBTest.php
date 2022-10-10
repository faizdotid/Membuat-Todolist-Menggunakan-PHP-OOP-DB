<?php

require_once __DIR__ . "/DB.php";

use Config\DB;

$db = DB::getConnection("db");

echo "Sukses membuat koneksi";