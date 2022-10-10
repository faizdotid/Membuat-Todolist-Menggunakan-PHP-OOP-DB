<?php

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . '/Helper/InputHelper.php';
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/Config/DB.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . "/Config/CekTable.php";

use \Repository\TodolistRepostoryImpl;
use \View\Todolistview;
use \Service\TodolistServiceImpl;

$db = Config\DB::getConnection();
Create::createTable();

echo "APLIKASI TODOLIST OOP";

$db = Config\DB::getConnection();
Create::createTable();
$todolistRepo = new TodolistRepostoryImpl($db);
$todolistServ = new TodolistServiceImpl($todolistRepo);
$todolistView = new Todolistview($todolistServ);


$todolistView->showTodolist();