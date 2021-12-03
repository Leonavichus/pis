<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';

$search = $_POST['kyeword'];
$books = R::findAll('books', 'title LIKE ?', ["%$search%"]);
?>
<div class="container">
    <form action="" method="POST">
        <div class="form-inline">
            <input type="text" name="kyeword" class="form-control" placeholder="Search">
            <button class="btn btn-success" name="search">Search</button>
        </div>
    </form>
    <div class="card mt-5">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Year_Writing</th>
                    <th>Id_authors</th>
                    <th>Id_genre</th>
                </tr>
                <?php foreach ($books as $books) : ?>
                    <tr>
                        <td><?= $books->id; ?></td>
                        <td><?= $books->title; ?></td>
                        <td><?= $books->description; ?></td>
                        <td><?= $books->yearwriting; ?></td>
                        <td><?= $books->ida; ?></td>
                        <td><?= $books->idg; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>