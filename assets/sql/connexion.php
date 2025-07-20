<?php
require $_SERVER['DOCUMENT_ROOT'] .'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$conexion = new PDO(
                "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";charset=utf8",
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );