<!DOCTYPE html>

<html>
	<head>
		<title>Edit task</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
        <script>

        </script>
    
    
    
    
		<body>
            <?php

                require_once ("tasks.php");
                $taskid = $_REQUEST['id'];
                $obj = new task();
                $obj->select_task($taskid);
                $row = $obj->fetch();

                $theid = $row['task_id'];
                $title = $row['task_title'];
                $description = $row['task_description'];
                $starttime = $row['task_start_date'];
                $endtime = $row['task_end_date'];
                
            ?>
                
            
			<form class = "contact_form" method="POST" action="edit_task.php">
				Nurse:     <?php
                require_once ( "nurse.php" );
                $obj = new nurse();
                $obj->select_all_nurses();
                
                echo "<select name='nurse'>Dropdown</option>";
                while($row = $obj->fetch()){
                echo "<option value=$row[user_id]> $row[user_sname]</option>";
                }
                echo "</select>";
            ?>
                <br>
                Title: <input type="text" placeholder="Title" name="title" value="<?php echo $title; ?>" required><br>
                Task Description: <textarea type = "textbox" placeholder="description" name="description" value="<?php echo $description; ?>" required></textarea><br>
                Collaborator:<?php
                require_once ( "nurse.php" );
                $obj = new nurse();
                $obj->select_all_nurses();
                
                echo "<select name='collab'>Dropdown</option>";
                while($row = $obj->fetch()){
                echo "<option value=$row[user_id]> $row[user_sname]</option>";
                }
                echo "</select>";
            ?>
                <br>
                Start Time:<input type = "datetime-local" name="starttime" value="<?php echo $startime; ?>"required><br>
                End Time:<input type = "datetime-local" name="endtime" value="<?php echo $endtime; ?>"required><br>
                <div><input type ="hidden" name= "taskid" value="<?php echo $taskid; ?>"></div>
                <input type="submit" name="button" value="Make changes" >
			</form>
			
			<?php
				if ( isset ( $_REQUEST ['button']) )
				{
					require_once ("tasks.php");
					
					$obj = new task ( );
                    
                    $id = $_REQUEST['taskid'];
					$nurse = $_REQUEST [ 'nurse' ];
                    $title = $_REQUEST [ 'title' ];
                    $title_description = $_REQUEST [ 'description' ];
                    $start_time = $_REQUEST [ 'starttime' ];
                    $end_time = $_REQUEST [ 'endtime' ];
                    $collab = $_REQUEST ['collab'];

					if ( !$obj->edit_task ( $id,$title,$title_description,$start_time,$end_time,$nurse,$collab ) )
						{
							echo "Error editing task";
						}
					else
						{
							echo "Successfully edited task";
						}
                   header("Location: assignedtasks.php");
				}
                 
			?>
            
            <form class = "contact_form" method="POST" action="assigntask.php">
                <input type="submit" name="button" value="Back to Tasks" >
            </form>
            
		
		</body>
</html>