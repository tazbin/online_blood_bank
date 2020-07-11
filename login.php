<!DOCTYPE html>
<?php
session_start();
  if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
    header('Location: index.php');
  }
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood donation system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
<!-- my code goes here -->

<?php
$err = '';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($password);

  if (empty($email) || empty($password)) {
    $err = 'empty';
  } else{
    // check in database
    include 'inc/dbh.php';
    $sql = "SELECT * FROM admin WHERE email = '$email' AND pass = '$password';";
        $result = mysqli_query($conn, $sql);
        $result_check = mysqli_num_rows($result);

        if( $result_check > 0 ){
          $_SESSION['login'] = 1;
          header('Location: index.php');
        } else{
          $err = 'not_matched';
        }
    // check in database
  }
}

 ?>


<div class="container pt-5 mb-5">
  <form class="mx-auto pt-5" action="#" method="post" style="max-width: 400px">
  <div class="form-group">
    <div class="text-center mb-5">
      <p class="display-4">Admin Login</p>
      <hr>
    </div>
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- error message -->
  <?php
    if ($err == 'empty'){
      ?>
      <div class="alert alert-danger" role="alert">
        <b>ERROR!</b> Fill al fields
      </div>
      <?php
    }
    else if($err == 'not_matched'){
      ?>
      <div class="alert alert-danger" role="alert">
        <b>ERROR!</b> Invalied Email or Password
      </div>
      <?php
    }
   ?>
   <!-- error message -->
  <button type="submit" name="login" class="btn btn-success btn-block">Log in</button>
  <hr class="mt-5">
  <p class="lead text-center"> Copyright &copy; <?php echo date('Y'); ?> | All Rights Reserved <b>Tazbinur Rahaman</b> </p>
</form>
</div>




<!-- my code ends here -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
