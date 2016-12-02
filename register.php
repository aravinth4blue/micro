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
<script>
$( document ).ready(function() {
	$("#submit_btn").click(function(e){
		//alert('btn pressed');
		e.preventDefault();
    first_name=$("#first_name").val();
    last_name=$("#last_name").val();
    user_email=$("#user_email").val();
    user_pass=$("#user_pass").val();
    confirm_pass=$("#confirm_pass").val();
    var name_regex = /^[a-zA-Z]+$/;
	var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if (first_name.length == 0) {
			$("#first_name").focus();
			return false;
	}
	// Validating Name Field.
	else if (!first_name.match(name_regex) || first_name.length == 0) {
		$('#p1').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
		$("#first_name").focus();
		return false;
	}else if (last_name.length == 0) {
			$("#last_name").focus();
			return false;
	}// Validating Name Field.
	else if (!last_name.match(name_regex) || last_name.length == 0) {
		$('#p2').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
		$("#last_name").focus();
		return false;
	}else if (!user_email.match(email_regex) || user_email.length == 0) {
		$('#p3').text("* Please enter a valid email address *"); // This Segment Displays The Validation Rule For Email
		$("#user_email").focus();
		return false;
	}else if( user_pass!=confirm_pass){
		$('#p4').text("* Cofirm password not matches *"); // This Segment Displays The Validation Rule For Email
		$("#user_pass").focus();
		return false;
	}else{
		alert("Form submitted sucessfully");
		return true;
	}
});

});
</script>