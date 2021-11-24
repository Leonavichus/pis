<?php
$dsn = 'mysql:host=localhost;dbname=biblio;charset=utf8';
$username = 'root';
$password = 'usbw';
try {
    $connection = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Error";
}
