<?php

require_once('db.php');

session_start();

$MenuID = $_GET['Menu_id'];
$Location = $_GET['RestID'];

$getSaleID = mysqli_query($conn, "SELECT * FROM Sale ORDER BY Sale_id DESC LIMIT 1");

  while ($row = mysqli_fetch_array($getSaleID)) {
    $saleId = $row['Sale_id'];
  }

if(isset($_POST['addToOrder'])) {

  $Quantity = $_POST['quantity'];

  //add an item to the sale_item table to be displayed as an item in an order
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "INSERT INTO Sale_Item (Sale_id, Menu_id, Quantity) VALUES ('$saleId', '$MenuID', '$Quantity')");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../menu.php?RestID=$Location");
}

?>
