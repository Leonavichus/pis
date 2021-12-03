<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';

$books = R::findAll('books');
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <?php foreach ($books as $books) : ?>
                <ul>
                    <li><?= $books->title; ?></li>
                    <li><?= $books->yearwriting; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>