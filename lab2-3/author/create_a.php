<?php
require '../db.php';
$message = '';
if (isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['middle_name']) && isset($_POST['birthday']) && isset($_POST['date_death'])) {
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $middle_name = $_POST['middle_name'];
  $birthday = $_POST['birthday'];
  $date_death = $_POST['date_death'];
  $sql = "INSERT INTO authors (surname,name,middle_name,birthday,date_death) VALUES(:surname,:name,:middle_name,:birthday,:date_death)";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':surname' => $surname, ':name' => $name, ':middle_name' => $middle_name, ':birthday' => $birthday, ':date_death' => $date_death])) {
    $message = 'data inserted successfully';
  }
};
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a author</h2>
    </div>
    <div class="card-body">
      <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="Surname">Surname</label>
          <input type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="middle_name">Middle_Name</label>
          <input type="text" name="middle_name" id="middle_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="birthday">Birthday</label>
          <input type="text" name="birthday" id="birthday" class="form-control">
        </div>
        <div class="form-group">
          <label for="date_death">Date_Death</label>
          <input type="text" name="date_death" id="date_death" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a author</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>