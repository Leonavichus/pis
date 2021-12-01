<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';
// Update authors
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $authors = R::load('authors', $id);
    if (isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['middlename']) && isset($_POST['birthday']) && isset($_POST['dob'])) {
        $authors = R::load('authors', $id);
        $authors->surname = $_POST['surname'];
        $authors->name = $_POST['name'];
        $authors->middlename = $_POST['middlename'];
        $authors->birthday = $_POST['birthday'];
        $authors->dob = $_POST['dob'];
        R::store($authors);
    }
}
?>

<div class="card-header">
    <h2>Update author(Задание№2)</h2>
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
    <form method="post">
        <div class="form-group">
            <label for="surname">Surname</label>
            <input value="<?= $authors->surname; ?>" type="text" name="surname" id="surname" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input value="<?= $authors->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="middlename">Middle_Name</label>
            <input value="<?= $authors->middlename; ?>" type="text" name="middlename" id="middlename" class="form-control">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input value="<?= $authors->birthday; ?>" type="text" name="birthday" id="birthday" class="form-control">
        </div>
        <div class="form-group">
            <label for="dob">Date_Death</label>
            <input value="<?= $authors->dob; ?>" type="text" name="dob" id="dob" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Update author</button>
        </div>
    </form>
</div>