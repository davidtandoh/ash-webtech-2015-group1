<?php
	include_once ( "ntdb.php" );
class nurse extends ntdb
{	
    
    var $id;
    var $name;
    var $age;
    var $sex;    
    var $department;
	/**
	* Constructor for nurse
	**/
	function nurse(){}
	
	/**
	* A function to establish a connection
	**/
	function add_nurse ( $fname,$sname,$age,$sex,$department )
	{
		$insert_query = "insert into system_users set user_fname='$fname', user_sname='$sname', age='$age', sex= '$sex', department = '$department'";
		return $this->query ( $insert_query );
	}
    
    function edit_nurse( $id,$fname,$sname,$age,$sex,$department )
    {
        $edit_query = "UPDATE system_users SET user_fname = '$fname', user_sname = '$sname', age='$age', sex= '$sex', department = '$department' where user_id = '$id'";
        return $this->query ( $edit_query );
    }
    
    function delete_nurse( $id )
    {
        $delete_query = "delete from system_users where user_id = $id";
        return $this->query ( $delete_query );
    }
    
    function select_all_nurses()
    {
        $select_query = "select user_id ,user_fname, user_sname, age, sex, department from system_users ";
        return $this->query($select_query);
    }
    
    function select_nurse( $id )
    {
        $select_query = "select user_id ,user_fname,user_sname, age, sex, department from system_users where user_id = $id";
        return $this->query($select_query);
    }
    
       function search_nurse( $st )
    {
        $select_query = "select user_id ,user_fname,user_sname, age, sex, department from system_users where nurse_name LIKE $st";
        return $this->query($select_query);
    }
    

    
    
    
}