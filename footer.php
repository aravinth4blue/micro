<?php 
?>
</div>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
</body>
</html>
<script>
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
</script>