<?php
$page = 'search_donors';
include 'inc/header.php';
?>
<!-- my code goes here -->

<?php
$option = '';
if (isset($_POST['search_donors'])) {
  $option = $_POST['group'];
}
?>

<div class="container">
  <div class="text-center mt-5">
    <p class="display-4">Search donors</p>
  </div>
  <form class="pt-2 pb-5 mx-auto form-inline" method="post" action="#" style="max-width: 400px">
  <div class="form-group">
    <select name="group" class="custom-select px-5 ml-3 mr-5" id="exampleFormControlSelect1">
      <option <?php echo $option=='A+'? 'selected': '' ?> value="A+">A+</option>
      <option <?php echo $option=='A-'? 'selected': '' ?> value="A-">A-</option>
      <option <?php echo $option=='B+'? 'selected': '' ?> value="B+">B+</option>
      <option <?php echo $option=='B-'? 'selected': '' ?> value="B-">B-</option>
      <option <?php echo $option=='O+'? 'selected': '' ?> value="O+">O+</option>
      <option <?php echo $option=='O-'? 'selected': '' ?> value="O-">O-</option>
      <option <?php echo $option=='AB+'? 'selected': '' ?> value="AB+">AB+</option>
      <option <?php echo $option=='AB-'? 'selected': '' ?> value="AB-">AB-</option>
    </select>
  </div>
  <button type="submit" name="search_donors" class="btn btn-primary px-5">Search donors</button>
</form>
</div>

<div class="container mt-5 mb-5 pb-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Blood group</th>
        <th scope="col">Donation count</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

<?php
if (isset($_POST['search_donors'])) {
  $_group = $_POST['group'];

  $sql = "SELECT * FROM donor_list WHERE blood_group='$_group';";
  $result = mysqli_query($conn, $sql);
  $result_check = mysqli_num_rows($result);

  if( $result_check > 0 ){
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <th scope="row"> <?php echo $row['id']; ?> </th>
          <td> <?php echo $row['name']; ?> </td>
          <td> <?php echo $row['phone']; ?> </td>
          <td> <?php echo $row['blood_group']; ?> </td>
          <td> <?php echo $row['donation_count']; ?> </td>
          <td> <a class="btn btn-sm btn-secondary" href="donor_data.php?id=<?php echo $row['id']; ?>">View details</a> </td>
        </tr>
        <?php
    }
  }
}
?>

</tbody>
</table>
</div>



<!-- my code ends here -->
<?php include 'inc/footer.php'; ?>
