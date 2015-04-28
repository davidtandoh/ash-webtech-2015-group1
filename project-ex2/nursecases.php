<?php

if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
		view_nurse();	
		break;
	case 2:
		delete_nurse();
		break;
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}


function view_nurse(){
    require_once ("nurse.php");
    $nurseid = $_REQUEST['id'];
    $obj = new nurse ();
    $obj->select_nurse($nurseid);
    if(!$row = $obj-> fetch()){
        echo'{"result":0,"message:"error getting nurse details"}';
    }
    else
    {   
//        $row=$obj->fetch();
        echo '{"result":1 ,"nurse":[';
        echo json_encode($row);
    echo "]}";
    
}
}


function delete_nurse(){
     require_once ("nurse.php");
    $nurseid = $_REQUEST['id'];
    $obj = new nurse ();
    if($obj->delete_nurse($nurseid)){
		echo '{"result":1,"message": "Nurse details have been removed"}';
	}else{
		echo '{"result":0,"message": "Nurse details not removed."}';
	}
	//break;
    
}


?>