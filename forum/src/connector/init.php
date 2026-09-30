<?php

require_once "conn.php";

// Konfigurace databáze
define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'svecrobert');
define('DB_PASS', '4XkeLYhUJRyqeJaH');
define('DB_NAME', 'svecrobert');
// Vytvoření jediné instance DB
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Globální handler výjimek
set_exception_handler(function ($e) {
    error_log($e->getMessage());
    echo "Chyba: " . $e->getMessage();
    echo "<br>Soubor: " . $e->getFile();
    echo "<br>Řádek: " . $e->getLine();

});