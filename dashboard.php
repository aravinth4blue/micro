<?php
require("header.php");
require("db.php");
class Result{
	public $active;
}
// $data = json_decode(file_get_contents('php://input'), true);
// print_r($data);
if(isset($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$select_qry="select active from users where id='$user_id'";
	$select_exec_query=mysqli_query($link,$select_qry);
	$result=mysqli_fetch_object($select_exec_query);
}else{
	$result=new Result();
	$result->active==0;
}



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
			$online_query="SELECT  first_name FROM users where active=1";
			            
			            $exec_query=mysqli_query($link,$online_query);

			            while($row=mysqli_fetch_object($exec_query)){
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
