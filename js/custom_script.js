
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

$(document).ready(function() {
    setInterval("check_user()",10000);
});
function check_user(){
$.ajax({
    url: "check_user.php",
    type: "POST",
    //timeout: 100,
    dataType: 'json',
    error: function(){
        //do something
    },
    success: function(data){
        //do something
        
        if(data.status="Online"){
        
        	$("#logIcon").html( data.first_name+' is online');
        $('#over').popover();
        } 
    }
});
}
$("#date_of_birth").datepicker({
	 format: "yyyy-mm-dd"
});
