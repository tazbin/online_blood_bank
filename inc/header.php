<!DOCTYPE html>
<?php
  session_start();
  if( !isset($_SESSION['login']) || $_SESSION['login'] == 0 ){
    header('Location: login.php');
  }
  include 'dbh.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Blood Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#">Online Blood Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php echo $page=='home' ? 'active': ''; ?>">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item <?php echo $page=='all_donors' ? 'active': ''; ?>">
        <a class="nav-link" href="all_donors.php">All donors</a>
      </li>
      <li class="nav-item <?php echo $page=='search_donors' ? 'active': ''; ?>">
        <a class="nav-link" href="search_donors.php">Search donors</a>
      </li>
      <li class="nav-item <?php echo $page=='deleted_donors' ? 'active': ''; ?>">
        <a class="nav-link" href="deleted_donors.php">Deleted donors</a>
      </li>
      <li class="nav-item <?php echo $page=='change_password' ? 'active': ''; ?>">
        <a class="nav-link" href="change_password.php">Change password</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-sm btn-danger mt-1" href="logout.php">Logout</a>
      </li>
  </div>
</div>
</nav>
  <!-- navbar ends -->
