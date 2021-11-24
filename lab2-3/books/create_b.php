<?php
require '../db.php'; //подключение бд
$message = '';
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['year_writing']) && isset($_POST['id_a']) && isset($_POST['id_g'])) {
  $name = $_POST['name']; //определяем, установлена ли переменная.
  $description = $_POST['description']; 
  $year_writing = $_POST['year_writing'];
  $id_a = $_POST['id_a'];
  $id_g = $_POST['id_g'];
  $sql = "INSERT INTO books (name,description,year_writing,id_a,id_g) 
          VALUES(:name,:description,:year_writing,:id_a,:id_g)"; //sql запрос
  $statement = $connection->prepare($sql); //подготовка запроса к выполнению и возвращение объекта
  if ($statement->execute([':name' => $name, ':description' => $description, ':year_writing' => $year_writing, ':id_a' => $id_a, ':id_g' => $id_g]))  //возвращает массив, который состоит из всех строк, которые вернул запрос
  {
    $message = 'data inserted successfully'; 
  }
};
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a book</h2>
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
          <label for="description">Description</label>
          <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
          <label for="year_writing">Year_Writing</label>
          <input type="text" name="year_writing" id="year_writing" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_a">ID_a</label>
          <input type="text" name="id_a" id="id_a" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_g">ID_g</label>
          <input type="text" name="id_g" id="id_g" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a book</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>