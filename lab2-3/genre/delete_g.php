<?php
require '../db.php';
$id_genre = $_GET['id_genre'];
$sql = 'DELETE FROM genre WHERE id_genre=:id_genre';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_genre' => $id_genre])) {
  header("Location: /genre/home_g.php");
}
