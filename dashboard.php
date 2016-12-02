<?php
require("header.php");
require("db.php");
session_start();
$user_id=$_SESSION['user_id'];

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
require("footer.php");
?>
<script>
$("#name").change(function(){
	if($(this).is(':checked')){
		$( "#dob" ).prop( "disabled", true );
		$( "#hobby" ).prop( "disabled", true );
		$("#search").change(function(){
			$.ajax({ 
				url: 'searchbyname.php',
		        type: 'post',
		        data:{
		        	search:$("#search").val()
		    	},
		        dataType : 'html',
		        success: function(data) {
		                      $("#result").html(data);
		                  }
				});
			});
	}
	else{
		$( "#dob" ).prop( "disabled", false );
		$( "#hobby" ).prop( "disabled", false );
		$('#search').val("");
	}
});
$('#dob').change(function(){
if($(this).is(':checked')){
	//$("#search").datepicker();
	$( "#name" ).prop( "disabled", true );
	$( "#hobby" ).prop( "disabled", true );
			$("#search").datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(e){
			$.ajax({ 
				url: 'searchbydob.php',
		        type: 'post',
		        data:{
		        	search:$("#search").val()
		    	},
		        dataType : 'html',
		        success: function(data) {
		                      $("#result").html(data);
		                  }
				});
			});
}else{
	$("#search").datepicker("destroy");
	$( "#name" ).prop( "disabled", false );
	$( "#hobby" ).prop( "disabled", false );
	$('#search').val("");

}
});
$("#hobby").change(function(){
	if($(this).is(':checked')){
		$( "#name" ).prop( "disabled", true );
		$( "#dob" ).prop( "disabled", true );
		$('#search').tagsinput('refresh');
			$("#search").change(function(){
			$.ajax({ 
				url: 'searchbyhobby.php',
		        type: 'post',
		        data:{
		        	search:$("#search").val()
		    	},
		        dataType : 'html',
		        success: function(data) {
		                      $("#result").html(data);
		                  }
				});
			});
	}else{
		$('#search').tagsinput('destroy');
		$( "#name" ).prop( "disabled", false );
		$( "#dob" ).prop( "disabled", false );
		$('#search').val("");
	}
});
</script>