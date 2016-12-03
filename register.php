<?php
require("header.php");
require("db.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$first_name=mysqli_real_escape_string($link,$_POST['first_name']);
		$last_name=mysqli_real_escape_string($link,$_POST['last_name']);
		$user_email=mysqli_real_escape_string($link,$_POST['user_email']);
		$user_pass=mysqli_real_escape_string($link,md5($_POST['user_pass']));

		$insert_qry = "INSERT INTO users (first_name, last_name, user_email,user_pass) 
				VALUES ('$first_name', '$last_name', '$user_email', '$user_pass')";


		$exec_query=mysqli_query($link,$insert_qry);
		
		echo '<div class="alert alert-success" role="alert">User registered sucessfully</div>';

	}

if(isset($_SESSION['user_email'])){
	header('Location: dashboard.php');
}else{


?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<form id="register" method="post" class="form-horizontal" action="register.php">
<div class="form-group">
 		<label for="first_name">First name</label>
 		<input type="text" id="first_name" class="form-control" name="first_name" value="" required>
 		<div id="p1"></div>
</div>
<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" id="last_name" class="form-control" name="last_name" value="" required>
		<div id="p2"></div>
</div>
<div class="form-group">

		<label for="user_name">Email</label>
		<input type="email" id="user_email" class="form-control" name="user_email" value="" required>
		<div id="p3"></div>
</div>
<div class="form-group">
		<label for="user_pass">Password</label>
		<input type="password" id="user_pass" class="form-control" name="user_pass" value="" required>
		<div id="p4"></div>
</div>
<div class="form-group">
		<label for="user_pass">Confirm Password</label>
		<input type="password" id="confirm_pass" class="form-control" name="confirm_pass" value="" required>
		<div id="p5"></div>
</div>

<div class="form-group">
		<input type="submit" id="submit_btn" name="submit_btn" class="btn btn-default" value="Register">
</div>
</form>
</div>
</div>
<?php
}
require("footer.php");

?>
