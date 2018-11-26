<?php include('includes/header.php'); ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username" required>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password" required>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="login" value="Login">
	</div>
</form>

<?php

if(isset($_POST['login']))  {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM Login WHERE username = '$username'";

  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result)) {

		$id = $row['user_id'];
    $user = $row['username'];
    $pass = $row['password'];


    if($username == $user && $password == $pass)  {
      $_SESSION['username'] = $user;
			$_SESSION['user_id'] = $id;

      header("Location: index.php");
    }
  }
}

?>

<?php include('includes/footer.php'); ?>
