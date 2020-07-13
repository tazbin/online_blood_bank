<?php
$page = 'home';
include 'inc/header.php';
?>
<!-- my code goes here -->

<?php
$err = '';

if (isset($_POST['add_donor'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $group = $_POST['group'];
  $count = $_POST['count'];
  if ($count == null || $count < 0) {
    $count = 0;
  }

  if (empty($name) || empty($phone)) {
    $err = 'empty';
  } else{
    // check in database
    $sql = "INSERT INTO donor_list(name, phone, blood_group, donation_count) VALUES('$name', '$phone', '$group', '$count');";

    mysqli_query($conn, $sql);
    $err = 'success';
    // check in database
  }
}

 ?>


<div class="container">
  <div class="text-center mt-5">
    <p class="display-4">Add new donor</p>
  </div>
  <form class="pt-2 pb-5 mx-auto" method="post" action="#" style="max-width: 400px">
  <div class="form-group">
    <label>Donor name</label>
    <input name="name" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input name="phone" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Blood Group</label>
    <select name="group" class="form-control" id="exampleFormControlSelect1">
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
    </select>
  </div>
  <div class="form-group">
    <label>Donation count</label>
    <input name="count" type="number" class="form-control">
    <small id="emailHelp" class="form-text text-muted">This field is optional.</small>
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
    else if($err == 'success'){
      ?>
      <div class="alert alert-success" role="alert">
        <b>SUCCESS!</b> New donor added.
      </div>
      <?php
    }
   ?>
   <!-- error message -->

  <button type="submit" name="add_donor" class="btn btn-primary btn-block">Add donor</button>
</form>
</div>



<!-- my code ends here -->
<?php include 'inc/footer.php'; ?>
