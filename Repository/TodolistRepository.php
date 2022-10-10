<?php

namespace Repository {

    use Entity\Todolist;
    use PDO;

    interface TodoListRepository {

        function save(Todolist $todolist): void;

        function remove(int $number): bool;

        function findAll(): array;
    }

    class TodolistRepostoryImpl implements TodoListRepository {

        public array $todolist = array();

        private \PDO $connection;

        public function __construct(\PDO $connection)
        {
            $this->connection = $connection;
        }

        public function save(Todolist $todolist): void {
            // $number = sizeof($this->todolist) + 1;
            // $this->todolist[$number] = $todolist;
            $sql = "insert into todolist(todo) values(?)";
            $statement = $this->connection->prepare($sql);
            // $statement->bindParam("todo", $todolist->getTodo());
            $statement->execute([$todolist->getTodo()]);
        }


        public function remove(int $number): bool {
            // if ($number > sizeof($this->todolist)) {
            //     return false;
            // }
            // for ($i = $number; $i < sizeof($this->todolist); $i++) {
            //     $this->todolist[$i] = $this->todolist[$i +1];
            // }
            // unset($this->todolist[sizeof($this->todolist)]);
            // return true;

            $sql = "select * from todolist where id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                $sql = "delete from todolist where id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }
        }

        public function findAll(): array {
           // return $this->todolist;
           $sql = "select id, todo from todolist";
           $statement = $this->connection->prepare($sql);
           $statement->execute();

           $result = [];

           foreach ($statement as $row){
                $todo = new Todolist();
                $todo->setId($row["id"]);
                $todo->setTodo($row["todo"]);
                $result[] = $todo;
           }

           return $result;
        }
    }
}