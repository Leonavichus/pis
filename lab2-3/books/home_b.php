<?php
session_start();
require '../db.php'; //подключение бд
$sql = "SELECT b.id_book as book_id,
b.name  as book_name,
b.description  as book_description,
b.year_writing as book_year_writing,
a.surname as authors_name, 
g.name as genre_name 
FROM books as b 
inner join authors as a on a.id_authors = b.id_a
join genre as g on g.id_genre = b.id_g"; //sql запрос
$statement = $connection->prepare($sql); //подготовка запроса к выполнению и возвращение объекта
$statement->execute(); //запускает подготовленный запрос на выполнение
$books = $statement->fetchAll(PDO::FETCH_OBJ); //возвращает массив, который состоит из всех строк, которые вернул запрос
?>
<?php require '../header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All books</h2>
    </div>
    <div class="container">
      <form action="" method="POST">
        <div class="form-inline">
          <input type="text" name="kyeword" class="form-control" placeholder="Search">
          <button class="btn btn-success" name="search">Search</button>
        </div>
      </form>
      <br>
      <form action="" method="GET">
        <select name='sort_r' class="custom-select">
          <option name="id_book" id="id_book" <?php if (isset($_GET['sort_r']) && $_GET['sort_r'] == "id_book") {
                                                echo "selected";
                                              } ?>>id_book</option>
          <option name="name" id="name" <?php if (isset($_GET['sort_r']) && $_GET['sort_r'] == "name") {
                                          echo "selected";
                                        } ?>>name</option>
          <option name="year_writing" id="year_writing" <?php if (isset($_GET['sort_r']) && $_GET['sort_r'] == "year_writing") {
                                                          echo "selected";
                                                        } ?>>year_writing</option>
        </select>

        <select name='sort' class="custom-select">
          <option name="ASC" id="ASC" <?php if (isset($_GET['sort']) && $_GET['sort'] == "ASC") {
                                        echo "selected";
                                      } ?>>ASC</option>
          <option name="DESC" id="DESC" <?php if (isset($_GET['sort']) && $_GET['sort'] == "DESC") {
                                          echo "selected";
                                        } ?>>DESC</option>
        </select>
        <button class="btn btn-info">Sort</button>
      </form>
      <?php
      include 'search.php';
      ?>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Year_writing</th>
          <th>Authors</th>
          <th>Genre</th>
          <th>Action</th>
        </tr>
        <?php foreach ($books as $person) : ?>
          <tr>
            <td><?= $person->book_id; ?></td>
            <td><?= $person->book_name; ?></td>
            <td><?= $person->book_description; ?></td>
            <td><?= $person->book_year_writing; ?></td>
            <td><?= $person->authors_name; ?></td>
            <td><?= $person->genre_name; ?></td>
            <td>
              <?php
              if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
                <a href="edit_b.php?id_book=<?= $person->book_id ?>" class="btn btn-info">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_b.php?id_book=<?= $person->book_id ?>" class='btn btn-danger'>Delete</a>
              <?php endif; ?>
              <a href="../commit/home_c.php?id_book=<?= $person->book_id ?>" class="btn btn-warning">Commit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require '../footer.php'; ?>