<?php
require 'rb.php';
R::setup('mysql:host=localhost; dbname=biblio1', 'root', 'usbw');
if (!R::testConnection()) {
    exit('Нет соединения с базой данных');
}
