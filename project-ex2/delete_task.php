<html>
    <head>
    </head>
    <body>
        
        <?php
            $id = $_REQUEST["id"];
            require_once("tasks.php");
            $obj = new task( );
            if(!$row=$obj-> delete_task($id)){
                echo "error deleting task";
            }
            else{
                echo "task deleted";
            }
            
            //header("Location: assignedtasks.php");
        ?>
        
        
        
        
        
    </body>
</html>