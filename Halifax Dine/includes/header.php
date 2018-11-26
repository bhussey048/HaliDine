<?php

require_once('includes/db.php');

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v4-alpha.getbootstrap.com/favicon.ico">

    <title>Halifax Dine</title>

    <!-- Bootstrap core CSS -->
    <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v4-alpha.getbootstrap.com/examples/cover/cover.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><a class="nav-link active" href="index.php">Halifax Dine</a></h3>
              <nav class="nav nav-masthead">
                <?php

                if($_SESSION['user_id'] == '1000')  {

                  echo "<a class=nav-link active href=../headManager.php>Sales Overview</a>";

                } elseif($_SESSION['user_id'] == '2000'){

                  echo "<a class=nav-link active href=../branchManager.php?Rest_id=2000&Rest_City=Moncton>Sales Overview</a>";

                } elseif($_SESSION['user_id'] == '3000'){

                  echo "<a class=nav-link active href=../branchManager.php?Rest_id=3000&Rest_City=St. John's>Sales Overview</a>";

                } elseif($_SESSION['user_id'] == '4000'){

                  echo "<a class=nav-link active href=../branchManager.php?Rest_id=4000&Rest_City=Toronto>Sales Overview</a>";

                } elseif($_SESSION['user_id'] == '5000'){

                  echo "<a class=nav-link active href=../branchManager.php?Rest_id=5000&Rest_City=Montreal>Sales Overview</a>";

                } elseif ($_SESSION['user_id'] == '0') {

                  echo "<a class=nav-link active href=chef.php>Chef Portal</a>";
                }

                ?>

                <?php
                if(isset($_SESSION['username']))  {

                  echo "<a class= nav-link active href=../logout.php>Logout</a>";
                } else {
                  echo "<a class= nav-link active href=../login.php>Portal Login</a>";
                }
                ?>
              </nav>
            </div>
          </div>
  </body>
