<div class="row ">
<?php
require("db.php");
$dob=$_POST['search'];
$dob_query="select * from users where date_of_birth='$dob'";
//var_dump($dob_query);
$result=mysql_query($dob_query);
while($row=mysql_fetch_object($result)){
	echo '<div class="col-xs-6">'.$row->first_name.'</div>';
	echo '<div class="col-xs-6">'.$row->date_of_birth.'</div>';
}

?>
</div>