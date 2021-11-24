<?php
require '../db.php';
$id_genre = $_GET['id_genre'];
$sql = 'SELECT * FROM genre WHERE id_genre=:id_genre';
$statement = $connection->prepare($sql);
$statement->execute([':id_genre' => $id_genre]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $sql = 'UPDATE genre SET name=:name WHERE id_genre=:id_genre';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':id_genre' => $id_genre])) {
    header("Location: /genre/home_g.php");
  }
}
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update genre</h2>
    </div>
    <div class="card-body">
      <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update genre</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>