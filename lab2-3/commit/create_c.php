<?php
require '../db.php';
if (isset($_POST['comm_text'])) {

    $id_b = $_POST['id_b'];
    $id_u = $_POST['id_u'];
    $comm_text = $_POST['comm_text'];

    $sql = "INSERT INTO commit (id_b,id_u,comm_text,date_time) VALUES(:id_b,:id_u,:comm_text,CURRENT_TIMESTAMP())";
    $statement = $connection->prepare($sql);
    $statement->execute([':id_b' => $id_b, ':id_u' => $id_u, ':comm_text' => $comm_text]);
    header("Location: /commit/home_c.php?id_book=" . $id_b . "");
};
