<?php

namespace Service {

    use Entity\Todolist;
    use Repository\TodoListRepository;

    interface TodolistService {

        function showTodolist(): void;

        function addTodolist(string $todo): void;

        function removeTodolist(int $number): void;
    }

    class TodolistServiceImpl implements TodolistService {

        private TodoListRepository $TodolistRepository;

        public function __construct($todolistRepository)
        {
            $this->TodolistRepository = $todolistRepository;
        }

        public function showTodolist(): void {

            echo "TODOLIST" . PHP_EOL;

            foreach ($this->TodolistRepository->findAll() as $num => $value) {
                echo $value->getId(). ". " . $value->getTodo() . PHP_EOL;
            }
        }

        public function addTodolist(string $todo): void {
            $todolist = new Todolist($todo);
            $this->TodolistRepository->save($todolist);
            echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
        }

        public function removeTodolist(int $number): void {
            if ($this->TodolistRepository->remove($number)){
                echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
            }
        }
    }
}