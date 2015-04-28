<?php
     require_once ("tasks.php");
    $taskid = $_REQUEST['id'];
    $obj = new task();
    $obj->select_task($taskid);
    if(!$row = $obj->fetch()){
        echo'{"result":0,"message:"error getting task details"}';
    }
    else{
        echo '{"result":1 ,"task":[';
        echo json_encode($row);
    echo "]}";
    }

    exit;

?>