<?php
require("db.php");
//Get all user id from 

session_start();
$select_qry="select id from users where active =1";
if(isset($_SESSION['user_id'])){
	$current_user_id=$_SESSION['user_id'];
}
$exec_query=mysql_query($select_qry);

while($row=mysql_fetch_object($exec_query)){
//	echo $row->id;
	$user_id[]=$row->id;
}
if (($key = array_search($current_user_id, $user_id)) !== false) {
    unset($user_id[$key]);
}
foreach($user_id as $usr_id){
            $session_query="SELECT  online_users.user_id ,users.first_name FROM users,online_users 
                            where online_users.user_id=$usr_id";
            var_dump($session_query);

            $session_query_exec=mysql_query($session_query);
            $online_id=mysql_fetch_object($session_query_exec);
            if($online_id->sessionid){
                $arr['name']=$online_id->first_name;
            	$arr['sessionid']=$online_id->sessionid;
            	$arr['status']='Online';
            	echo json_encode($arr);
            }else{
            	$arr['status']='Offline';
            	echo json_encode($arr);
            }
       }
?>