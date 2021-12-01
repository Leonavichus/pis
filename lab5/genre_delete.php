<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';
// Update authors
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $genre = R::load('genre', $id);
    R::trash($genre);
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Delete genre(Задание№3)</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Select</button>
                </div>
            </form>
        </div>
    </div>
</div>