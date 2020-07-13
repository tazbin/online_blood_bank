<?php
$page = 'change_password';
include 'inc/header.php';
?>
<!-- my code goes here -->

<?php
$err = '';

if (isset($_POST['change_password'])) {
  $new_pass1 = $_POST['new_pass1'];
  $new_pass2 = $_POST['new_pass2'];
  $old_pass = $_POST['old_pass'];

  if (empty($new_pass1) || empty($new_pass2) || empty($old_pass)) {
    $err = 'empty';
  } else if ($new_pass1 != $new_pass2) {
    $err = 'not_matched';
  } else{
    // check in database
    $sql = "SELECT * FROM admin WHERE id=1;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $database_pass = $row['pass'];
    if( $database_pass != md5($old_pass) ){
      $err = 'wrong_pass';
    } else{
      $new_pass1 = md5($new_pass1);
      $sql = "UPDATE admin SET pass='$new_pass1' WHERE id=1;";
      mysqli_query($conn, $sql);

      header('Location: logout.php');
    }
    // check in database
  }
}

 ?>


<div class="container">
  <div class="text-center mt-5">
    <p class="display-4">Change admin password</p>
  </div>
  <form class="pt-2 pb-5 mx-auto" method="post" action="#" style="max-width: 400px">
  <div class="form-group">
    <label>New password</label>
    <input name="new_pass1" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Re enter new password</label>
    <input name="new_pass2" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Old password</label>
    <input name="old_pass" type="password" class="form-control">
  </div>

  <!-- error message -->
  <?php
    if ($err == 'empty'){
      ?>
      <div class="alert alert-danger" role="alert">
        <b>ERROR!</b> Fill al fields
      </div>
      <?php
    } else if ($err == 'not_matched'){
      ?>
      <div class="alert alert-danger" role="alert">
        <b>ERROR!</b> New password did not match
      </div>
      <?php
    } else if($err == 'wrong_pass'){
      ?>
      <div class="alert alert-danger" role="alert">
        <b>SUCCESS!</b> Wrong old password
      </div>
      <?php
    }
   ?>
   <!-- error message -->
  <button type="submit" name="change_password" class="btn btn-primary btn-block">Change password</button>
</form>
</div>



<!-- my code ends here -->
<?php include 'inc/footer.php'; ?>
