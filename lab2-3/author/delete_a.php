<?php
require '../db.php';
$id_authors = $_GET['id_authors'];
$sql = 'DELETE FROM authors WHERE id_authors=:id_authors';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_authors' => $id_authors])) {
  header("Location: /author/home_a.php");
}
