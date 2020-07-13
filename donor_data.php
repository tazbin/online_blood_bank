<?php
$page = 'data';
include 'inc/header.php';
?>
<!-- my code goes here -->
<!-- <div class="text-center mt-5">
  <p class="display-4">Donor data</p>
</div> -->

<?php
$err = '';

if (isset($_GET['id'])) {
  $donor_id = $_GET['id'];

  // action
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'donate_now') {
      $sql = "SELECT * FROM donor_list WHERE id='$donor_id';";
      $result = mysqli_query($conn, $sql);
      $result_check = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);
      $new_donation_count = $row['donation_count'] + 1;

      $sql = "UPDATE donor_list SET donation_count='$new_donation_count' WHERE id='$donor_id';";
      mysqli_query($conn, $sql);

      $err = 'updated';
    } else if ($action == 'delete_donor') {
      $sql = "UPDATE donor_list SET del=1 WHERE id='$donor_id';";
      mysqli_query($conn, $sql);

      header('Location: index.php');
    }
  }
  // action

  $sql = "SELECT * FROM donor_list WHERE id='$donor_id';";
  $result = mysqli_query($conn, $sql);
  $result_check = mysqli_num_rows($result);

  if( $result_check > 0 ){
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="container">
          <div class="text-center mt-5">
            <p class="display-4">Donor data</p>
          </div>
          <form class="pt-2 pb-5 mx-auto" method="post" action="#" style="max-width: 400px">
          <div class="form-group">
            <label>Donor name</label>
            <input name="name" disabled value="<?php echo $row['name']; ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input name="phone" disabled value="<?php echo $row['phone']; ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Blood Group</label>
            <input name="phone" disabled value="<?php echo $row['blood_group']; ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Donation count</label>
            <input name="count" disabled value="<?php echo $row['donation_count']; ?>" type="number" class="form-control">
          </div>

          <!-- error message -->
          <?php
            if($err == 'updated'){
              ?>
              <div class="alert alert-success" role="alert">
                <b>SUCCESS!</b> Donotion received.
              </div>
              <?php
            }
           ?>
           <!-- error message -->
           <a href="donor_data.php?id=<?php echo $donor_id; ?>&action=donate_now" class="btn btn-primary btn-block">Donate now</a>
           <a href="donor_data.php?id=<?php echo $donor_id; ?>&action=delete_donor" class="btn btn-danger btn-block">Delete donor</a>
        </form>
        </div>
        <?php
    }
  }
}
?>


<!-- my code ends here -->
<?php include 'inc/footer.php'; ?>
