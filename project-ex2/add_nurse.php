<!DOCTYPE html>

<html>
    <script type="text/JavaScript">
        function validateForm(){
            var r = new RegExp("[a-z]");
            var name = $("#name").value;
            if(r.test(name)){
                
            }
        }
    </script>
	<head>
		<title>Add nurse</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
		<body>
            
			<form class = "contact_form" method="POST" action="add_nurse.php">
				Firstname: <input id="fname" type="text" placeholder="firstname" name="fn" required><br>
                Surname: <input id="sname" type="text" placeholder="surname" name="sn" required><br>
                Age: <input type="text" placeholder="age" name="na" required><br>
                Sex: <select name="ns">
                        <option value="Male">M</option>
                        <option value="Female">F</option>
                    </select><br>
                Department:             <?php
                require_once ( "department.php" );
                $obj = new department();
                $obj->select_all_departments();
                
                echo "<select name=nd value=''>Dropdown</option>";
                while($row = $obj->fetch()){
                echo "<option value=$row[department_name]>$row[department_name]</option>";
                }
                echo "</select>";
            ?>
                <br>
				<input type="submit" name="button" value="Insert" onClick = validateName()>
			</form>
			
			<?php
				if ( isset ( $_REQUEST [ 'button' ] ) )
				{
					require_once ( "nurse.php" );
					
					$obj = new nurse ( );
					$fname = $_REQUEST [ 'fn' ];
                    $sname = $_REQUEST [ 'sn' ];
                    $age = $_REQUEST [ 'na' ];
                    $sex = $_REQUEST [ 'ns' ];
                    $department = $_REQUEST [ 'nd' ];

					if ( !$obj->add_nurse ( $fname,$sname,$age,$sex,$department ) )
						{
							echo "Error Adding to nurse";
						}
					else
						{
							//$name = "";
							echo "Successfully added to nurse";
						}
                    header("Location: nursepage.php");
				}
                 
			?>
            
            <form class = "contact_form" method="POST" action="nursepage.php">
                <input type="submit" name="button" value="Back to Nurses" >
            </form>
		
		</body>
</html>