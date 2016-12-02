<?php
require("header.php");
require("db.php");

$user_id=$_SESSION['user_id'];

$select_qry="select active from users where id='$user_id'";

$select_exec_query=mysql_query($select_qry);
$result=mysql_fetch_object($select_exec_query);

if($result->active==1){
?>
<div class="col-md-4 col-md-offset-4 ">
<form method="post" class="form-horizontal" action="dashboard.php">
<div class="form-group">
    <label for="search">Search</label>
    <input type="text" class="form-control" id="search" >
  </div>

 <div class="checkbox">
    <label>
      <input type="checkbox" name="name" id="name"> Name
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="dob" id="dob"> Date of birth
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="hobby" id="hobby"> Hobby
    </label>
  </div>
 
</form>
</div>
</div>
<div class="container">

	<div id="result">
	</div>

</div>
<div class="container">
<div class = "panel panel-default">
   <div class = "panel-heading">
      <h3 class = "panel-title">
         Who's Online
      </h3>
   </div>
   
   <div class = "panel-body">
   		<ul>
			<?php    
			$online_query="SELECT  online_users.user_id ,users.first_name FROM users,online_users where online_users.user_id=users.id";
			            
			            $exec_query=mysql_query($online_query);

			            while($row=mysql_fetch_object($exec_query)){
			            	echo '<li>'.$row->first_name.'</li>';
			            }
			?>
		</ul>
   </div>
</div>
</div>

<?php
}
else{
	
	echo "Please login to view this page <a href='login.php'>Click here to login</a>";

}
require("footer.php");
?>
