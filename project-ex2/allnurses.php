<!DOCTYPE html>

<html>
	<head>
		<title>All nurses</title>
	</head>
		<body>
			<?php

                require_once("nurse.php");
                $obj = new nurse( );
                $obj->select_all_nurses();
                //$row = $obj->fetch();

                
                echo "<table border ='1' align ='center'>";
                echo "<tr style= 'background-color:olive; color: white; text-align: center'>
                <td>Nurse ID</td><td>Nurse name</td><td>Age</td><td>Sex</td><td>Department</td></tr>";

                $i = 0;
                while ( $row = $obj->fetch()){
                    $id = $row['nurse_id'];
                    
                    if($i%2 == 0){
                    $style = "style ='background-color: green'";
                    }
                    else
                    {
                    $style=" ";
                    }
                    echo "<tr $style>";
                    echo "<td>";
                    echo $row["nurse_id"];
                    echo "</td>";
                    echo "<td>";
                    echo "<a href= 'viewnurse.php?id=$id'>$row[nurse_name]</a>";
                    echo "</td>";
                    echo "<td>";
                    echo $row["age"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["sex"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["department"];
                    echo "</td>";
                    echo "<td><a href= 'editnurse.php?id=$id'>edit</a></td>";
                    echo "<td><a href= 'deletenurse.php?id=$id'>delete</a></td>";


            echo "<tr>";
            $i++;
        //echo "<br>";
        }

			?>
		
		</body>
</html>