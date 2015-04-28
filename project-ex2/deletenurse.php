<!DOCTYPE html>

<html>
    <script type="text/JavaScript">
    </script>
	<head>
		<title>Delete nurse</title>
	</head>
    <link rel="stylesheet" href="css/style.css">
		<body>
			
			<?php
                require_once ( "nurse.php" );
                $nurseid = $_REQUEST['id'];
                $obj = new nurse ();
                $obj->delete_nurse($nurseid);
                header("Location: nursepage.php");
                 
			?>
            
		
		</body>
</html>