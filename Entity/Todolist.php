<?php

namespace Entity {

    class Todolist {

        private string $todo;

        private int $id;

        public function __construct(string $todo = "")
        {
            $this->todo = $todo;
        }

        public function getTodo(): string {
            return $this->todo;
        }
        
        public function setTodo($todo) {
            $this->todo = $todo;
        }

        function setId(int $id) {
            $this->id = $id;
        }

        function getId(): int {
            return $this->id;
        }
    }
}