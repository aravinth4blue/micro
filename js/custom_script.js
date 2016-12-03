
$( document ).ready(function() {
	$("#submit_btn").click(function(e){
		//alert('btn pressed');
		e.preventDefault();
    first_name=$("#first_name").val();
    last_name=$("#last_name").val();
    user_email=$("#user_email").val();
    user_pass=$("#user_pass").val();
    confirm_pass=$("#confirm_pass").val();
    var name_regex = /^[a-zA-Z]+$/;
	var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if (first_name.length == 0) {
			$("#first_name").focus();
			return false;
	}
	// Validating Name Field.
	else if (!first_name.match(name_regex) || first_name.length == 0) {
		$('#p1').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
		$("#first_name").focus();
		return false;
	}else if (last_name.length == 0) {
			$("#last_name").focus();
			return false;
	}// Validating Name Field.
	else if (!last_name.match(name_regex) || last_name.length == 0) {
		$('#p2').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
		$("#last_name").focus();
		return false;
	}else if (!user_email.match(email_regex) || user_email.length == 0) {
		$('#p3').text("* Please enter a valid email address *"); // This Segment Displays The Validation Rule For Email
		$("#user_email").focus();
		return false;
	}else if( user_pass!=confirm_pass){
		$('#p4').text("* Cofirm password not matches *"); // This Segment Displays The Validation Rule For Email
		$("#user_pass").focus();
		return false;
	}else{
		$("#register").submit();
		return true;
	}
});

});

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
        
        	$("#logIcon").html( data.name+' is online');
        $('#over').popover();
        } 
    }
});
}
$("#date_of_birth").datepicker({
	 format: "yyyy-mm-dd"
});
