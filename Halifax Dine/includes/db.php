<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "halifax_dine";

$conn = new mysqli ($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
  die ("Cannot connect to the database.<br>" . $db->connect_error);
}

 ?>
