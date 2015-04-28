<?php
	include_once ( "ntdb.php" );
class department extends ntdb
{	
    
    var $department_id;
    var $department_name;

	/**
	* Constructor for department
	**/
	function department(){}
	
	/**
	* A function to establish a connection
	**/
	function add_department($department_name)
	{
		$insert_query = "insert into system_department set department_name='$department_name'";
		return $this->query ( $insert_query );
	}
    
    function select_all_departments()
    {
        $select_query = "select department_id,department_name from system_department";
        return $this->query($select_query);
    }
    
}
    ?>