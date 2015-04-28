<html>
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
        
        
        
        
        function getNurse(id){
            var theUrl="nursecases.php?cmd=1&id="+id;
            var obj=sendRequest(theUrl);		//send request to the above url
            if(obj.result==1){					//check result
                $("#divStatus").text("Name: "+obj.nurse[0].user_sname+" Age:" +obj.nurse[0].age);		//set div with the description from the result
				$("#divStatus").css("top",event.y);	//set the location of the div
                $("#divStatus").css("left",event.x);	
				$("#divStatus").show();				//show the div element
            }else{
				//show error message
				$("#divStatus").text("error while getting nurse");
				$("#divStatus").css("backgroundColor","red");
            }

        }
        
        function deleteNurse(id){
            var theUrl="nursecases.php?cmd=2&id="+id;
            var obj=sendRequest(theUrl);
            
            if(obj.result==1){
				$("#divStatus").text(obj.message);
				//remove the product from the search table
                
                
                
            }else{
				$("#divStatus").text(obj.message);
				$("#divStatus").css("backgroundColor","red");
            }
				
        }
        
        
       function add(){
           $("#divContent").load("add_nurse.php");
       }
        
        function edit(id){
            
            $("#divContent").load("editnurse.php?id="+id);
        }
        
        function viewnurse(id){
            $("#divStatus").load("viewnurse.php?id="+id);
        }
        
        
        
        
        
        
        
        
    </script>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css"/>
		<script>
			
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
                        <span class="menuitem" onClick= add()><i class= "fa fa-user-plus"> Add nurse</i></span>
						<span class="menuitem" ></span>
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
            <div id = "allnurses">
            <?php

                require_once("nurse.php");
                $obj = new nurse( );
                $obj->select_all_nurses();
                //$row = $obj->fetch();

                
                echo "<table class='reportTable' width='100%' border ='1' align ='center'>";
                echo "<tr style= 'background-color:green; color: white; text-align: center'>
                <td>Nurse ID</td><td>Firstname</td><td>Surname</td><td>Age</td><td>Sex</td><td>Department</td><td></td><td></td></tr>";

                $i = 0;
                while ( $row = $obj->fetch()){
                    $id = $row['user_id'];
                    
                    if($i%2 == 0){
                    $style = "style ='background-color:lightgreen'";
                    }
                    else
                    {
                    $style="style ='background-color: floralwhite' ";
                    }
                    echo "<tr $style>";
                    echo "<td>";
                    echo $row["user_id"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["user_fname"];
                    echo "</td>";
                    echo "<td>";
                    echo "<span class='intable' onClick= getNurse($id)>{$row['user_sname']}</span>";
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
                    echo "<td><span class='intable' onClick= edit($id)><i class= 'fa fa-pencil'> edit</span></td>";
                    echo "<td><span class='intable' onClick= deleteNurse($id)><i class= 'fa fa-remove'>delete</a></span></td>";


            echo "<tr>";
            $i++;
        //echo "<br>";
        }

			?>
            </div>
		</table>
	</body>
</html>	