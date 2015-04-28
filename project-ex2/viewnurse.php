<!DOCTYPE html>

<html>
    <script type="text/JavaScript">
    </script>
	<head>
		<title>View nurse</title>
        <link rel="stylesheet" href="css/style.css">
	</head>
    <link rel="stylesheet" href="css/style.css">
		<body>
			
			<?php
                require_once ("nurse.php");
                $nurseid = $_REQUEST['id'];
                $obj = new nurse ();
                $obj->select_nurse($nurseid);
                $row = $obj-> fetch();
                echo "<b>NURSE ID: </b>";
                echo $row['nurse_id'];
                echo "<br>";
                echo "<b>PRODUCT NAME: </b>";
                echo $row['nurse_name'];
                echo "<br>";
                echo "<b>AGE: </b>";
                echo $row['age'];
                echo "<br>";
                echo "<b>SEX: </b>";
                echo $row['sex'];
                echo "<br>";
                echo "<b>DEPARTMENT: </b>";
                echo $row['department'];
                 
			?>
            
		
		</body>
</html>