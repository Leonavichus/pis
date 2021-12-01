<?php
// Modules
require 'db.php';
require 'header.php';
require 'footer.php';
// Create authors
if (isset($_POST['surname']) || isset($_POST['name']) || isset($_POST['middlename']) || isset($_POST['birthday']) || isset($_POST['dob'])) {
    $authors = R::dispense('authors');
    $authors->surname = $_POST['surname'];
    $authors->name = $_POST['name'];
    $authors->middlename = $_POST['middlename'];
    $authors->birthday = $_POST['birthday'];
    $authors->dob = $_POST['dob'];
    R::store($authors);
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a author(Задание№1)</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="Surname">Surname</label>
                    <input type="text" name="surname" id="surname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="middlename">Middle_Name</label>
                    <input type="text" name="middlename" id="middlename" class="form-control">
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="text" name="birthday" id="birthday" class="form-control">
                </div>
                <div class="form-group">
                    <label for="dob">Date_Death</label>
                    <input type="text" name="dob" id="dob" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create a author</button>
                </div>
            </form>
        </div>
    </div>
</div>