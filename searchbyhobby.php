<div class="row ">
<?php
require("db.php");
$hobby=$_POST['search'];

$hobby_query="SELECT * FROM users WHERE hobby LIKE '%,$hobby,%' 
      OR
      hobby LIKE '$hobby,%' 
      OR
      hobby LIKE '%,$hobby' 
      OR 
      hobby =  '$hobby'";

//var_dump($hobby_query);
$result=mysql_query($hobby_query);
while($row=mysql_fetch_object($result)){
	echo '<div class="col-xs-6">'.$row->first_name.'</div>';
	echo '<div class="col-xs-6">'.$row->hobby.'</div>';
}

?>
</div>