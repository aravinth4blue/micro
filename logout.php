<?php
require("db.php");
session_start();
$user_id=$_SESSION['user_id'];
session_unset();
session_destroy();

	$session_qry = "DELETE FROM online_users  where user_id='$user_id'";
				

		$exec_query=mysql_query($session_qry);
header("location:index.php");
exit();
?>