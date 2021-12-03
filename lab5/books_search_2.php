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
                    <th>Title</th>
                    <th>Year_Writing</th>
                </tr>
                <?php foreach ($books as $books) : ?>
                    <tr>
                        <td><?= $books->title; ?></td>
                        <td><?= $books->yearwriting; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>