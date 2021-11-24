<?php
require 'db.php';
// Получаем все записи, ID которых указаны в массиве ids
$ids = [1, 2, 3];
$book = R::loadAll('books', $ids);
foreach ($book as $books) {
    echo $books->title . '<br>';
}
