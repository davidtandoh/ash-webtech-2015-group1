<!DOCTYPE html>

<html>
	<head>
		<title>Assign task</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
		<body>
            
			<form class = "contact_form" method="POST" action="assigntask.php">
				Nurse:     <?php
                require_once ( "nurse.php" );
                $obj = new nurse();
                $obj->select_all_nurses();
                
                echo "<select name='nurse'>Dropdown</option>";
                while($row = $obj->fetch()){
                echo "<option value=$row[user_id]>$row[user_fname] $row[user_sname]</option>";
                }
                echo "</select>";
            ?>
                <br>
                Title: <input type="text" placeholder="Title" name="title" required><br>
                Task Description: <textarea type = "textbox" placeholder="description" name="description" required></textarea><br>
                Collaborator:<?php
                require_once ( "nurse.php" );
                $obj = new nurse();
                $obj->select_all_nurses();
                
                echo "<select name='collab'>Dropdown</option>";
                while($row = $obj->fetch()){
                echo "<option value=$row[user_id]>$row[user_fname] $row[user_sname]</option>";
                }
                echo "</select>";
            ?>
                <br>
                Start Time:<input type = "datetime-local" name="starttime" required><br>
                End Time:<input type = "datetime-local" name="endtime" required><br>
                <input type="submit" name="button" value="Assign task" >
			</form>
			
			<?php
				if ( isset ( $_REQUEST [ 'button' ] ) )
				{
					require_once ( "tasks.php" );
					
					$obj = new task ( );
					$nurse = $_REQUEST [ 'nurse' ];
                    $title = $_REQUEST [ 'title' ];
                    $title_description = $_REQUEST [ 'description' ];
                    $start_time = $_REQUEST [ 'starttime' ];
                    $end_time = $_REQUEST [ 'endtime' ];
                    $collab = $_REQUEST ['collab'];

					if ( !$obj->add_task ( $title,$title_description,$start_time,$end_time,$nurse,$collab ) )
						{
							echo "Error Assigning task";
						}
					else
						{
							//$name = "";
							echo "Successfully assigned task";
						}
                   header("Location: assignedtasks.php");
				}
                 
			?>
            
            <form class = "contact_form" method="POST" action="assigntask.php">
                <input type="submit" name="button" value="Back to Tasks" >
            </form>
            
		
		</body>
</html>