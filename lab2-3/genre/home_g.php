<?php
session_start();
require '../db.php';
$sql = 'SELECT * FROM genre';
$statement = $connection->prepare($sql);
$statement->execute();
$genre = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All genres</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <?php
          if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
            <th>Action</th>
          <?php endif; ?>
        </tr>
        <?php foreach ($genre as $person) : ?>
          <tr>
            <td><?= $person->id_genre; ?></td>
            <td><?= $person->name; ?></td>
            <td>
              <?php
              if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
                <a href="edit_g.php?id_genre=<?= $person->id_genre ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_g.php?id_genre=<?= $person->id_genre ?>" class='btn btn-danger'>Delete</a>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>