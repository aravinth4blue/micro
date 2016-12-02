<?php
require("header.php");
require("db.php");

if(isset($_POST['submit_btn'])){
		$first_name=mysql_real_escape_string($_POST['first_name']);
		$last_name=mysql_real_escape_string($_POST['last_name']);
		$user_email=mysql_real_escape_string($_POST['user_email']);
		$user_pass=mysql_real_escape_string($_POST['user_pass']);

		$insert_qry = "INSERT INTO users (first_name, last_name, user_email,user_pass) 
				VALUES ('$first_name', '$last_name', '$user_email', '$user_pass')";
		

		$exec_query=mysql_query($insert_qry);
		
echo '<div class="alert alert-success" role="alert">User registered sucessfully</div>';

	}

if(isset($_SESSION['user_email'])){
	header('Location: dashboard.php');
}else{


?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<form method="post" class="form-horizontal" action="register.php">
<div class="form-group">
 		<label for="first_name">First name</label>
 		<input type="text" id="first_name" class="form-control" name="first_name" value="" required>
</div>
<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" id="last_name" class="form-control" name="last_name" value="" required>
</div>
<div class="form-group">

		<label for="user_name">Email</label>
		<input type="email" id="user_email" class="form-control" name="user_email" value="" required>

</div>
<div class="form-group">
		<label for="user_pass">Password</label>
		<input type="password" id="user_pass" class="form-control" name="user_pass" value="" required>
</div>
<div class="form-group">
		<label for="user_pass">Confirm Password</label>
		<input type="password" id="confirm_pass" class="form-control" name="confirm_pass" value="" required>
</div>

<div class="form-group">
		<input type="submit" name="submit_btn" class="btn btn-default" value="Register">
</div>
</form>
</div>
</div>
<?php
}
require("footer.php");

?>
<script>
$( document ).ready(function() {
    first_name=$("#first_name").val();
    last_name=$("#last_name").val();
    user_email=$("#user_email").val();
    user_pass=$("#user_pass").val();
    confirm_pass=$("#confirm_pass").val();
    



});
</script>