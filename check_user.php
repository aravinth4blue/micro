<?php
require("db.php");
//Get all user id from 

session_start();

if(isset($_SESSION['user_id'])){
	$current_user_id=$_SESSION['user_id'];
}
$select_qry="select id,first_name from users where active =1 and id!=$current_user_id";
$exec_query=mysqli_query($link,$select_qry);

while($row=mysqli_fetch_object($exec_query)){

   if($row->first_name){
        $arr['name']=$row->first_name;
        $arr['status']='Online';
        

    }else{
         $arr['status']='Offline';
        //  echo json_encode($arr);
    }

}

echo json_encode($arr);

?>