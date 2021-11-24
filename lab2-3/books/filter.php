<?php
require '../db.php';
require '../header.php';
?>


<div class="container">
    <div class="card mt-5">
        <h3>Filter:</h3>
        <form action="" method="POST">
            <div class="form-inline">
                <label for="" class="col-lg-2">ID: </label>
                <div>
                    <input type="text" class="form-control" name="id_book" placeholder="ID">
                </div>
            </div>
            <div class="form-inline">
                <label for="" class="col-lg-2">Name: </label>
                <div>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-inline">
                <label for="" class="col-lg-2">Year_writing: </label>
                <div>
                    <input type="text" class="form-control" name="year_writing" placeholder="Year_writing">
                </div>
            </div>
            <div class="form-inline">
                <label for="" class="col-lg-2">Authors: </label>
                <div>
                    <input type="text" class="form-control" name="id_a" placeholder="ID_a">
                </div>
            </div>
            <div class="form-inline">
                <label for="" class="col-lg-2">Genre: </label>
                <div>
                    <input type="text" class="form-control" name="id_g" placeholder="ID_g">
                </div>
            </div>

            <div class="form-inline">
                <label for="" class="col-lg-2"></label>
                <div>
                    <input type="submit" class="btn btn-info" name="submit">
                </div>
            </div>
        </form>
        <br>

        <table class="table table-bordered">
            <thead class="alert-info">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Year_writing</th>
                    <th>Authors</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    $id_book = $_POST['id_book'];
                    $name = $_POST['name'];
                    $year_writing = $_POST['year_writing'];
                    $id_a = $_POST['id_a'];
                    $id_g = $_POST['id_g'];

                    if ($id_book != "" || $name != "" || $year_writing != "" || $id_a != "" || $id_g != "") {
                        $sql = "SELECT * FROM books WHERE id_book = '$id_book' or name = '$name' or year_writing = '$year_writing' or id_a = '$id_a' or id_g = '$id_g'";
                        $statement = $connection->prepare($sql);
                        $statement->execute();
                    }
                    while ($books = $statement->fetch()) { ?>
                        <tr>
                            <td> <?php echo $books['id_book']; ?> </td>
                            <td> <?php echo $books['name']; ?> </td>
                            <td> <?php echo $books['description']; ?> </td>
                            <td> <?php echo $books['year_writing']; ?> </td>
                            <td> <?php echo $books['id_a']; ?> </td>
                            <td> <?php echo $books['id_g']; ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    <?php
                }
    ?>
    </div>
</div>