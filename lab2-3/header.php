<!doctype html>
<html lang="en">
<?php
session_start(); ?>

<head>
  <title>PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../header.php">PHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/genre/home_g.php">Genre<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/author/home_a.php">Authors<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/books/home_b.php">Books<span class="sr-only">(current)</span></a>
        </li>
        <?php
        if ($_SESSION['admin'] == 1 && $login = $_COOKIE['login']) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/genre/create_g.php">Create a genre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/author/create_a.php">Create a authors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/books/create_b.php">Create a books</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="/books/filter.php">Filter a books</a>
        </li>
      </ul>
      <button class="btn btn-info">
        <a class="text-light" href="../signup.php">SignUp</a>
      </button>
    </div>
  </nav>