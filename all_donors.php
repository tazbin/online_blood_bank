<?php
$page = 'all_donors';
include 'inc/header.php';
?>
<!-- my code goes here -->
<div class="text-center mt-5">
  <p class="display-4">All donor list</p>
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
  $sql = "SELECT * FROM donor_list WHERE del=0;";
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
?>

</tbody>
</table>
</div>



<!-- my code ends here -->
<?php include 'inc/footer.php'; ?>
