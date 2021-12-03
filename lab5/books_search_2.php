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
            <table class="table table-bordered">
                <tr>
                    <th>Marker</th>
                    <th>Title</th>
                    <th>Year_Writing</th>
                </tr>
                <?php foreach ($books as $books) : ?>
                    <tr>
                        <th>
                            <ul>
                                <li></li>
                            </ul>
                        </th>
                        <td><?= $books->title; ?></td>
                        <td><?= $books->yearwriting; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>