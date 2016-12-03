<div class="row ">
<?php
require("db.php");
$name=$_POST['search'];
$name_query="select * from users where first_name LIKE '%$name%'";
//var_dump($dob_query);
$result=mysqli_query($link,$name_query);
while($row=mysqli_fetch_object($result)){
	echo'<div class="col-xs-6">'.$row->first_name.'</div>';
	echo'<div class="col-xs-6">'.$row->last_name.'</div>';
}

?>
</div>