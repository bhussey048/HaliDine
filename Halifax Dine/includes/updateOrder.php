<?php

require_once('db.php');

session_start();

if(isset($_POST['deleteFromOrder'])) {

  $Sale_Item_ID = $_GET['Sale_item'];
  $MenuID = $_GET['Menu_id'];
  $Location = $_GET['RestID'];

  //delete a specific item from the sale_item table
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "DELETE FROM Sale_Item WHERE Sale_Item.Sale_id = '$Sale_Item_ID' AND Sale_Item.Menu_id = '$MenuID'");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../menu.php?RestID=$Location");
}

if(isset($_POST['updateOrder']))  {

  $Sale_Item_ID = $_GET['Sale_item'];
  $MenuID = $_GET['Menu_id'];
  $Location = $_GET['RestID'];
  $Quantity = $_POST['quantity'];

  //update the quantity of a selected item in the orders (updates quantity in sale_item where sale item id = sale id)
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "UPDATE Sale_Item SET Quantity = '$Quantity' WHERE Sale_Item.Sale_id = '$Sale_Item_ID' AND Sale_Item.Menu_id = '$MenuID'");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../menu.php?RestID=$Location");

}

?>
