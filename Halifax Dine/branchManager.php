<?php include('includes/header.php');?>
<!--
<p class="lead">
  <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Select Location
    </button>
    <div class="dropdown-menu">
      <?php
        $sql = "SELECT * FROM Restaurant";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {

          $RestID = $row['Rest_id'];
          $RestCity = $row['Rest_City'];

          echo  "<a class=dropdown-item name=location method=post href=branchManager.php?Rest_id=$RestID&Rest_City=$RestCity>$RestCity</a>";
          echo  "<div class=dropdown-divider></div>";

        }

      ?>

    </div>
  </div>
</p>-->
<h3>Select Dates</h3>
<form method=post>
  <input type="date" min="1000-01-01" name="start">
  <input type="date" name="end">
  <p>
    <input type="submit" name="filter" value="Filter Dates">
  </p>
</form>
<?php

$RestID = $_GET['Rest_id'];
$RestCity = $_GET['Rest_City'];

$start = $_POST['start'];
$end = $_POST['end'];

echo $RestCity . " " . " sales: ";
echo "<br />";

if(isset($_POST['filter'])) {

  $sql = "SELECT * FROM Sale WHERE Rest_id = $RestID AND Sale_date BETWEEN '$start' AND '$end'";

} else {

  $sql = "SELECT * FROM Sale WHERE Rest_id = $RestID";

}

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $totalSales += $Sale_amount;
  echo "<br />";
  }

  mysqli_close($conn);

  echo "Total Sales: " . " " . "$" . $totalSales;

?>


<?php include('includes/footer.php'); ?>
