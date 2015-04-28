<!DOCTYPE html>

<html>
	<head>
		<title>Edit nurse</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
		<body>
            <?php

                require_once ( "nurse.php" );
                $nurseid = $_REQUEST['id'];
                require_once("nurse.php");
                $obj = new nurse ();
                $obj->select_nurse($nurseid);
                $row = $obj->fetch();

                $theid = $row['user_id'];
                $fname = $row['user_fname'];
                $sname = $row['user_sname'];
                $theage = $row['age'];
                $thesex = $row['sex'];
                $thedepartment = $row['department'];
                
                
            ?>
			<form class="contact_form" method="POST" action="editnurse.php">
				Firstname: <input type="text" placeholder="firstname" name="fn" value ="<?php echo $fname; ?>" required><br>
                Surname: <input type="text" placeholder="surname" name="sn" value ="<?php echo $sname; ?>" required><br>
                Age: <input type="text" placeholder="age" name="na" value = "<?php echo $theage; ?>" required><br>

                Sex: <select name="ns" >
                        <option value="Male" selected><?php echo $thesex; ?></option>
                        <option value="Male">M</option>
                        <option value="Female">F</option>
                    </select><br>
                Department: <input type="text" placeholder="department" name="nd" value = "<?php echo $thedepartment; ?>" required>
                <br>
				<input type="submit" name="button" value="Make Changes">
                <div><input type ="hidden" name= "userid" value="<?php echo $nurseid; ?>"></div>
			</form>
			
			<?php
				if ( isset ( $_REQUEST [ 'button' ] ) )
				{
					require_once ( "nurse.php" );
					
					$obj = new nurse ( );
                    $id = $_REQUEST [ 'userid' ];
                    $fname = $_REQUEST [ 'fn' ];
                    $sname = $_REQUEST [ 'sn' ];
                    $age = $_REQUEST [ 'na' ];
                    $sex = $_REQUEST [ 'ns' ];
                    $department = $_REQUEST [ 'nd' ];
					
					if ( !$obj->edit_nurse ( $id,$fname,$sname,$age,$sex,$department ) )
						{
							echo "Error updating to nurse";
						}
					else
						{
							//$name = "";
							echo "Successfully updated nurse";
						}
                    header("Location: nursepage.php");
				}

                




			?>
		           <form class = "contact_form" method="POST" action="nursepage.php">
                <input type="submit" name="button" value="Back to Nurses" >
            </form>
		</body>
</html>