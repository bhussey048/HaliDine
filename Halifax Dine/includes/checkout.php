<?php
//when checking out shoudl get last sale id and + 1 to start a new Sale
//this will represent the next sale

//the sale id for sql query is the last record
require_once('db.php');

session_start();

//need to put in the delete from sale_item query in order to be able to alter menu

//initiate a new sale id
$getSaleID = mysqli_query($conn, "SELECT * FROM Sale ORDER BY Sale_id DESC LIMIT 1");

  while ($row = mysqli_fetch_array($getSaleID)) {
    $saleId = $row['Sale_id'];
  }

  $newSaleId = $saleId + 1;

  $Location = $_GET['RestID'];
  $total = $_GET['Total'];

if($_SESSION['username'] == 'attender') {

  $EmpID = $_GET['EmpID'];
  $TableNum = $_GET['TableNum'];

  //create the new sale
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "INSERT INTO Sale (Sale_id, Sale_date, Employee_id, Table_id, Rest_id, Sale_amount) VALUES ($newSaleId, now(), $EmpID, $TableNum, $Location, $total)");
  mysqli_commit($conn);
  //mysqli_close($conn);

  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "DELETE FROM Sale_Item WHERE Sale_Item.Sale_id = $saleId");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../index.php");

} else {
  //create the new sale
  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "INSERT INTO Sale (Sale_id, Sale_date, Employee_id, Table_id, Rest_id, Sale_amount) VALUES ($newSaleId, now(), NULL, NULL, $Location, $total)");
  mysqli_commit($conn);
  //mysqli_close($conn);


  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "DELETE FROM Sale_Item WHERE Sale_Item.Sale_id = $saleId");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../index.php");
}

 ?>
