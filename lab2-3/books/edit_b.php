<?php
require '../db.php'; //подключение бд
$id_book = $_GET['id_book'];
$sql = 'SELECT * FROM books WHERE id_book=:id_book'; //sql запрос
$statement = $connection->prepare($sql); //подготовка запроса к выполнению и возвращение объекта
$statement->execute([':id_book' => $id_book]); //запускает подготовленный запрос на выполнение
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['year_writing']) && isset($_POST['id_a']) && isset($_POST['id_g'])) //определяем, установлена ли переменная.
{
  $name = $_POST['name'];
  $description = $_POST['description'];
  $year_writing = $_POST['year_writing'];
  $id_a = $_POST['id_a'];
  $id_g = $_POST['id_g'];
  $sql = 'UPDATE books SET name=:name,description=:description,year_writing=:year_writing,id_a=:id_a,id_g=:id_g WHERE id_book=:id_book'; //sql запрос
  $statement = $connection->prepare($sql); //подготовка запроса к выполнению и возвращение объекта
  if ($statement->execute([':name' => $name, ':description' => $description, ':year_writing' => $year_writing, ':id_a' => $id_a, ':id_g' => $id_g, ':id_book' => $id_book])) //запускает подготовленный запрос на выполнение
  {
    header("Location: /books/home_b.php");
  }
}
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update book</h2>
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
          <label for="description">Description</label>
          <input value="<?= $person->description; ?>" type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
          <label for="year_writing">Year_Writing</label>
          <input value="<?= $person->year_writing; ?>" type="text" name="year_writing" id="year_writing" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_a">ID_a</label>
          <input value="<?= $person->id_a; ?>" type="text" name="id_a" id="id_a" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_g">ID_g</label>
          <input value="<?= $person->id_g; ?>" type="text" name="id_g" id="id_g" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update book</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>