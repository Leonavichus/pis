<?php
require '../db.php';
$id_authors = $_GET['id_authors'];
$sql = 'SELECT * FROM authors WHERE id_authors=:id_authors';
$statement = $connection->prepare($sql);
$statement->execute([':id_authors' => $id_authors]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['middle_name']) && isset($_POST['birthday']) && isset($_POST['date_death'])) {
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $middle_name = $_POST['middle_name'];
  $birthday = $_POST['birthday'];
  $date_death = $_POST['date_death'];
  $sql = 'UPDATE authors SET surname=:surname,name=:name,middle_name=:middle_name,birthday=:birthday,date_death=:date_death WHERE id_authors=:id_authors';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':surname' => $surname, ':name' => $name, ':middle_name' => $middle_name, ':birthday' => $birthday, ':date_death' => $date_death, ':id_authors' => $id_authors])) {
    header("Location: /author/home_a.php");
  }
}
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update author</h2>
    </div>
    <div class="card-body">
      <?php if (!empty($message)) : ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="surname">Surname</label>
          <input value="<?= $person->surname; ?>" type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="middle_name">Middle_Name</label>
          <input value="<?= $person->middle_name; ?>" type="text" name="middle_name" id="middle_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="birthday">Birthday</label>
          <input value="<?= $person->birthday; ?>" type="text" name="birthday" id="birthday" class="form-control">
        </div>
        <div class="form-group">
          <label for="date_death">Date_Death</label>
          <input value="<?= $person->date_death; ?>" type="text" name="date_death" id="date_death" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update author</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>