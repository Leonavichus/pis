<?php
require '../db.php';
$message = '';
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $sql = "INSERT INTO genre (name) VALUES(:name)";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name])) {
    $message = 'data inserted successfully';
  }
};
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a genre</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a genre</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>