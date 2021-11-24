<?php
require '../db.php'; //подключение бд
$id_book = $_GET['id_book'];
$sql = 'DELETE FROM books WHERE id_book=:id_book'; //sql запрос
$statement = $connection->prepare($sql); //подготовка запроса к выполнению и возвращение объекта
if ($statement->execute([':id_book' => $id_book])) //возвращает массив, который состоит из всех строк, которые вернул запрос
{
  header("Location: /books/home_b.php");
}
