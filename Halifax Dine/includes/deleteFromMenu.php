<?php

require_once('db.php');

session_start();

if(isset($_POST['deleteFromMenu'])) {

  $Menu_id = $_GET['Menu_id'];

  mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($conn, "DELETE FROM Menu WHERE Menu.Menu_id = '$Menu_id'");
  mysqli_commit($conn);
  mysqli_close($conn);

  header("Location: ../menu.php");
}

?>
