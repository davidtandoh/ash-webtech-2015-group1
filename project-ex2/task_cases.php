<?php
//type of request
//1: get description of product
//2: delete product
//3: edit price
if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
		delete_task();	
		break;
  
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}


function delete_task(){
    $id = $_REQUEST["id"];
    require_once("tasks.php");
    $obj = new task( );
    if($row=$obj-> delete_task($id)){
		echo '{"result":1,"message": "Task deleted.....refresh page"}';
	}else{
		echo '{"result":0,"message": "Task not deleted"}';
	}
	//break;
    
}
