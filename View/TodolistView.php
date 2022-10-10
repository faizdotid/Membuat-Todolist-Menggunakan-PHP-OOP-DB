<?php


namespace View {

    use Helper\InputHelper;
    use Service\TodolistService;

    class Todolistview {

        private TodolistService $todolistService;

        function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist(): void{
            $this->todolistService->showTodolist();
            $menu = <<<MENU
            \t MENU
            1. Tambah Todo
            2. Hapus Todo
            3. Keluar
        
            MENU;
            echo $menu;
            (int) $pilihanMu = InputHelper::input("Pilihan");
            switch ($pilihanMu) {
                case 1:
                    $this->addTodolist();
                    break;
                case 2:
                    $this->removeTodolist();
                    break;
                case 3:
                    echo "Selamat pergi" . PHP_EOL;
                    exit();
                    break;
                default:
                    echo "Pilihan tidak tersedia" . PHP_EOL;
                    break;
                }
            $this->showTodolist();
        }
    
        function addTodolist(): void{
            echo "Menambah Todo" . PHP_EOL;

            $todo = InputHelper::input("Todo (x untuk batal)");
            if ($todo == "x") {
                echo "Batal menambah todo" . PHP_EOL;
            } else {
                $this->todolistService->addTodolist($todo);
            }
        }
    
        function removeTodolist():void {
            echo "Menghapus Todo" . PHP_EOL;
            $pilihan = InputHelper::input("Nomor (x untuk batal) ");
            
            if ($pilihan == "x") {
                echo "Batal menambah todo" . PHP_EOL;
            } else {
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}