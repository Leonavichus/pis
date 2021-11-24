<?php
session_start();
require '../db.php';
$sql = 'SELECT * FROM authors';
$statement = $connection->prepare($sql);
$statement->execute();
$author = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All authors</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Surname</th>
          <th>Name</th>
          <th>Middle_Name</th>
          <th>Birthday</th>
          <th>Date_Death</th>
          <?php
          if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
            <th>Action</th>
          <?php endif; ?>
        </tr>
        <?php foreach ($author as $person) : ?>
          <tr>
            <td><?= $person->id_authors; ?></td>
            <td><?= $person->surname; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->middle_name; ?></td>
            <td><?= $person->birthday; ?></td>
            <td><?= $person->date_death; ?></td>
            <td>
              <?php
              if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
                <a href="edit_a.php?id_authors=<?= $person->id_authors ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_a.php?id_authors=<?= $person->id_authors ?>" class='btn btn-danger'>Delete</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>