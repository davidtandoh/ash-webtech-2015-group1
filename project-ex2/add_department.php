<!DOCTYPE html>

<html>
    <script type="text/JavaScript">

    </script>
	<head>
		<title>Add department</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
		<body>
            
			<form class = "contact_form" method="POST" action="add_department.php">
				Department Name: <input id="name" type="text" placeholder="name" name="dn" required><br>
				<input type="submit" name="button" value="Insert" >
			</form>
			
			<?php
				if ( isset ( $_REQUEST [ 'button' ] ) )
				{
					require_once ( "department.php" );
					
					$obj = new department ( );
					$dptname = $_REQUEST [ 'dn' ];

					if (!$obj->add_department( $dptname) )
						{
							echo "Error Adding to department";
						}
					else
						{
							//$name = "";
							echo "Successfully added to department";
						}
                    header("Location: departmentpage.php");
				}
                 
			?>
            
            <form class = "contact_form" method="POST" action="departmentpage.php">
                <input type="submit" name="button" value="Back to Departments" >
            </form>
		
		</body>
</html>