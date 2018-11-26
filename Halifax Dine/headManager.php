<?php include('includes/header.php'); ?>

<?php
ECHO "<h3>Sales for Halifax location</h3><br>";
$sql = "SELECT * FROM Sale WHERE Rest_id = '1000' ORDER BY Rest_id";

$result = mysqli_query($conn, $sql);

/* possible query to do price without sale amount field
*
* $sql = "SELECT * FROM Sale join Sale_Item on Sale.Sale_id = Sale_Item.Sale_id join Menu on Sale_Item.Menu_id = Menu.Menu_id";
*
*
*/

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $halifaxSales += $Sale_amount;
  echo "<br />";
  }

  echo "Total Sales: " . " " . "$" . $halifaxSales;

?>

<?php
ECHO "<br><br><h3>Sales for Moncton location</h3><br>";
$sql = "SELECT * FROM Sale WHERE Rest_id = '2000' ORDER BY Rest_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $monctonSales += $Sale_amount;
  echo "<br />";
  }

  echo "Total Sales: " . " " . "$" . $monctonSales;

?>

<?php
ECHO "<br><br><h3>Sales for St.John's location</h3><br>";
$sql = "SELECT * FROM Sale WHERE Rest_id = '3000' ORDER BY Rest_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $stjohnsSales += $Sale_amount;
  echo "<br />";
  }

  echo "Total Sales: " . " " . "$" . $stjohnsSales;

?>

<?php
ECHO "<br><br><h3>Sales for Toronto location</h3><br>";
$sql = "SELECT * FROM Sale WHERE Rest_id = '4000' ORDER BY Rest_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $torontoSales += $Sale_amount;
  echo "<br />";
  }

  echo "Total Sales: " . " " . "$" . $torontoSales;

?>

<?php
ECHO "<br><br><h3>Sales for Montreal location</h3><br>";
$sql = "SELECT * FROM Sale WHERE Rest_id = '5000' ORDER BY Rest_id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Sale_id = $row['Sale_id'];
  $Sale_date = $row['Sale_date'];
  $Sale_amount = $row['Sale_amount'];

  echo $Sale_id . " " . $Sale_date . " " . "$" . $Sale_amount;
  $montrealSales += $Sale_amount;
  echo "<br />";
  }

  mysqli_close($conn);

  echo "Total Sales: " . " " . "$" . $montrealSales;

?>

<?php include('includes/footer.php'); ?>
