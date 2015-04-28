<html>
    <script src="jquery-2.1.3.js"></script>
    <script>        
        
    </script>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
		<script>
            function add(){
           $("#divContent").load("add_department.php");
       }
			
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader" >
				</td>
			</tr>
			<tr>
				<td id="mainnav">
<a href= "nursepage.php"><div class="menuitem"><br><i class= "fa fa-user">&nbsp; Nurses</i></div></a>
                    <a href= "assignedtasks.php"><div class="menuitem"><br><i class= "fa fa-tasks">Tasks</i></div></a>
                    <a href= "departmentpage.php"><div class="menuitem"><br><i class= "fa fa-building"> Departments</i></div></a>

				</td>
				<td id="content">
					<div id="divPageMenu">
                        <span onclick ="add()" class="menuitem" ><i class= "fa fa-user-plus"> Add Department</i></span></a>
						<input type="text" id="txtSearch" />
                        <span class="menuitem"><i class= "fa fa-search">search</i></span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent" >
						NURSES
						<span class="clickspot">click here </span>
						<table id="tableExample" class="reportTable" width="100%">
							<tr class="header"> 
							</tr>

							</tr>
					</div>
				</td>
			</tr>
            <div id = "departments">
            <?php

                require_once("department.php");
                $obj = new department( );
                $obj->select_all_departments();
                //$row = $obj->fetch();

                
                echo "<table class='reportTable' width='100%' border ='1' align ='center'>";
                echo "<tr style= 'background-color:green; color: white; text-align: center'>
                <td>Department ID</td><td>Department Name</td></tr>";

                $i = 0;
                while ($row = $obj->fetch()){
                    
                    if($i%2 == 0){
                    $style = "style ='background-color:lightgreen'";
                    }
                    else
                    {
                    $style="style ='background-color: floralwhite' ";
                    }
                    echo "<tr $style>";
                    echo "<td>";
                    echo $row["department_id"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["department_name"];
                    echo "</td>";



            echo "<tr>";
            $i++;
        //echo "<br>";
        }

			?>
            </div>
		</table>
	</body>
</html>	