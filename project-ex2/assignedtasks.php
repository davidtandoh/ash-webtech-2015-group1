<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
        <script src="jquery-2.1.3.js"></script>
		<script>
            
        function sendRequest(u){
            // Send request to server
            //u a url as a string
            //async is type of request
            var obj=$.ajax({url:u,async:false});
            //Convert the JSON string to object
            var result=$.parseJSON(obj.responseText);
            return result;	//return object	
        }
        
            
            
            
            
            function assigntask(){
                $("#divContent").load("assigntask.php");
            }
            
            function edittask(id){
            $("#divSpace").load("edit_task.php?id="+id);
        }
            
            function deletetask(id){
                var theUrl="task_cases.php?cmd=1&id="+id;
            var obj=sendRequest(theUrl);
            
            if(obj.result==1){
				$("#divStatus").text(obj.message);
				//remove the product from the search table
                
                
                
            }else{
				$("#divStatus").text(obj.message);
				$("#divStatus").css("backgroundColor","red");
            }
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
						<span class="menuitem" onClick = assigntask()><i class= "fa fa-plus-circle">Assign task</i></span>
						<input type="text" id="txtSearch" />
                        <span class="menuitem"><i class= "fa fa-search">search</i></span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
                    <div id="divSpace" class="">

					</div>
					<div id="divContent">
						Content space
						<span class="clickspot">click here </span>
						<table id="tableExample" class="reportTable" width="100%">

                        <?php

                        require_once("tasks.php");
                        $obj = new task( );
                        $obj->get_tasks();
                
                echo "<table class='reportTable' width='100%' border ='1' align ='center'>";
                echo "<tr style= 'background-color:green; color: white; text-align: center'>
                <td>Nurse Name</td><td>Task title</td><td>Description</td><td>Start time</td><td>End time</td><td></td><td></td></tr>";

                $i = 0;
                while ($row = $obj->fetch()){
                    $id = $row["task_id"];
                    
                    if($i%2 == 0){
                    $style = "style ='background-color:lightgreen'";
                    }
                    else
                    {
                    $style="style ='background-color: floralwhite' ";
                    }
                    echo "<tr $style>"; 
                    echo "<td>";
                    echo $row["user_sname"];
                    echo " "; 
                    echo $row["user_fname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["task_title"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["task_description"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["task_start_date"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["task_end_date"];
                    echo "</td>";
                    echo "<td><span class='intable' onClick= edittask($id)><i class= 'fa fa-pencil'> edit</span></td>";
                    echo "<td><span class='intable' onClick= deletetask($id)><i class= 'fa fa-remove'>delete</a></span></td>";


            echo "<tr>";
            $i++;
        //echo "<br>";
        }

			?>
                        
                            
                            
                            
                            
                            
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	