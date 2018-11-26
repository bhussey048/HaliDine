<?php include('includes/header.php'); ?>

<?php

$sql = "SELECT * FROM Menu ORDER BY Menu_name";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
  {

  $Menu_id = $row['Menu_id'];
  $Menu_name = $row['Menu_name'];
  $Menu_diet = $row['Menu_diet'];
  $Menu_price = $row['Menu_price'];

  echo $Menu_id . " " . $Menu_name . " " . $Menu_diet . " " . $Menu_price . " " . "<form action=includes/deleteFromMenu.php?Menu_id=$Menu_id method=post><button class=btn btn-lg btn-primary btn-block type=submit name=deleteFromMenu>Delete From Menu</button></form>";

  echo "<br />";
  }

?>

<?php include('includes/footer.php'); ?>
