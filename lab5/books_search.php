<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Genre</th>
                    <th>Count_Book</th>
                </tr>
                <?php foreach ($genre as $genre) : ?>
                    <tr>
                        <td><?= $genre->name; ?></td>
                        <td><?= $countBook = R::count('books', 'idg = ?', [$genre->id]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>