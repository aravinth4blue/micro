<?php
require("header.php");
require("db.php");
session_start();
$current_user_id=$_SESSION['user_id'];
if(isset($_POST['submit_btn'])){
	if(isset($_FILES['user_pic'])){
      $errors= array();
      $file_name = $_FILES['user_pic']['name'];
      $file_size =$_FILES['user_pic']['size'];
      $file_tmp =$_FILES['user_pic']['tmp_name'];
      $file_type=$_FILES['user_pic']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['user_pic']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
      	 $file_perm="images/".$file_name;
         move_uploaded_file($file_tmp,$file_perm);
         //echo "Success";
      }else{
         print_r($errors);
      }
   }
    $user_pic=$file_perm;
	$short_bio=$_POST['short_bio'];
	$date_of_birth=$_POST['date_of_birth'];
	$reln_status=$_POST['reln_status'];
	$hobby=$_POST['hobby'];

	$update_qry="UPDATE users
				SET profile_pic='$user_pic',short_bio = '$short_bio', date_of_birth = '$date_of_birth',reln_status='$reln_status',hobby='$hobby'
				WHERE id=$current_user_id ";
	
	$exec_query=mysql_query($update_qry);
	header('Location: dashboard.php');
}
?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<form method="post" class="form-horizontal" action="next_step.php" enctype='multipart/form-data'>
<div class="form-group">
 		<label for="user_pic">Profile picture</label>
 		<input type="file" id="user_pic" class="form-control" name="user_pic" value="" required>
</div>

<div class="form-group">
 		<label for="short_bio">Bio</label>
 		<input type="text" id="short_bio" class="form-control" name="short_bio" value="" required>
</div>
<div class="form-group">
 		<label for="date_of_birth">DOB</label>
 		<input type="text" id="date_of_birth" class="form-control" name="date_of_birth" value="" required>
</div>
<div class="form-group">
 		<label for="reln_status">Relationship status</label>
 		<select name="reln_status" class="form-control" id="reln_status">
 			<option value="0">Single</option>
  			<option value="1">Married</option>
 		</select>
</div>
<div class="form-group">
 		<label for="hobby">Hobby</label>
 		<input type="text" id="hobby" class="form-control" name="hobby" value="" data-role="tagsinput" required>
</div>
<div class="form-group">
		<input type="submit" name="submit_btn" class="btn btn-default" value="Update">
		<input type="button" id="skip_btn" name="skip_btn" class="btn btn-default" value="Skip and Continue">
</div>

</form>
</div>
</div>


<?php
require('footer.php');
?>
<script>
$("#skip_btn").click(function(){
	window.location='dashboard.php';
});
$("#hobby").tagsinput('items')
</script>