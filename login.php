<?php
require("header.php");
require("db.php");
if(isset($_POST['login_btn'])){
			$user_email=$_POST['user_email'];
			$user_pass=$_POST['user_pass'];
			

		$select_qry ="select * from users where user_email='$user_email' and user_pass='$user_pass'";
		
		$exec_query=mysql_query($select_qry);
		if(!$exec_query) {
    		die("Database query failed: " . mysql_error());
		}
		$row=mysql_fetch_object($exec_query);
		$num_rows=mysql_num_rows($exec_query);
		
		
		if($num_rows>0){
			session_start();
			
			
			$_SESSION['user_email']=$row->user_email;
			$_SESSION['first_name']=$row->first_name;
			$_SESSION['user_id']=$row->id;
			$_SESSION['session_id']=session_id();
			$user_id=$row->id;
			$session_id= session_id();
			

				$session_qry = "INSERT INTO online_users (sessionid, user_id)
				VALUES ('$session_id', '$user_id')";


		$exec_query=mysql_query($session_qry);
		header('Location: next_step.php');
		}
		
}
if(isset($_SESSION['user_email'])){
	//header('Location: dashboard.php');
}else{
?>
<div class="col-md-4 col-md-offset-4 ">
<form method="post" class="form-horizontal" action="login.php">
 <div class="form-group">
 			<label for="user_name">Email</label>
 			<input class="form-control" type="text" name="user_email">
</div>
<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="password" name="user_pass">
</div>
<div class="form-group">
		<input class="btn btn-default" type="submit" name="login_btn" value="Login">
</div>
</form>
</div>
<?php
}
require("footer.php");

?>