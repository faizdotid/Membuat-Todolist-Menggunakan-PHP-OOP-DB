<?php

namespace Helper {

    class InputHelper {
        static function input(string $info): string {
            echo "$info : ";
            $result = fgets(fopen("php://stdin", "r"));
            //fgets(STDIN)
            return trim($result);
        }
    }
}