<?php

require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Config/DB.php";
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Config\DB;
use Repository\TodolistRepostoryImpl;
use Service\TodolistServiceImpl;

function addTodolist() {
    $koneksi = DB::getConnection();
    $todoRep = new TodolistRepostoryImpl($koneksi);
    $todoSer = new TodolistServiceImpl($todoRep);


    $todoSer->addTodolist("Belajar PHP");
    $todoSer->addTodolist("Belajar PHP DB");
    $todoSer->addTodolist("Belajar PHP OOP");
}

function removeTodolist() {
    $koneksi = DB::getConnection();
    $todoRep = new TodolistRepostoryImpl($koneksi);
    $todoSer = new TodolistServiceImpl($todoRep);


    echo $todoSer->removeTodolist(6);
}

function showTodolist() {
    $koneksi = DB::getConnection();
    $todoRep = new TodolistRepostoryImpl($koneksi);
    $todoSer = new TodolistServiceImpl($todoRep);


    echo $todoSer->showTodolist();
}

showTodolist();