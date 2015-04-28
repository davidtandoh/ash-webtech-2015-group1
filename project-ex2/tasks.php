<?php
	include_once ( "ntdb.php" );
class task extends ntdb
{	
    var $id;
    var $title;
    var $description;
	/**
	* Constructor for task
	**/
	function task ( ){}
	
	/**
	* A function to establish a connection
	**/
	function add_task ( $title,$description,$start_time,$end_time,$nurse_id,$collaborator )
	{
		$insert_query =  "insert into `system_tasks` ( `task_title`, `task_description`, `user_id`,"
                . " `task_collaborator`, `task_start_date`, `task_end_date` )"
                . "values ( '$title', '$description', '$nurse_id', '$collaborator', "
                . "'$start_time', '$end_time' )";
		return $this->query( $insert_query );
	}
    
    function edit_task( $id,$title,$description,$start_time,$end_time,$nurse,$collaborator )
    {
        $edit_query = "UPDATE system_tasks SET task_title = '$title', task_description = '$description',task_start_date='$start_time', task_end_date = '$end_time', user_id ='$nurse',task_collaborator = '$collaborator' where task_id = '$id'";
        return $this->query( $edit_query );
    }
    
    function delete_task( $id )
    {
        $delete_query = "delete from system_tasks where task_id = '$id'";
        return $this->query( $delete_query );
    }
    
    function get_tasktitle($id)
    {
        $name_query = "select task_title from tasks where task_id = '$id'";
        return $this->query( $name_query );
    }
    
    
    
    function select_task($id){
        $select_query = "select task_id, task_title,task_description, task_start_date, task_end_date, user_fname,user_sname from system_users, system_tasks where system_tasks.user_id = system_users.user_id and system_tasks.task_id= '$id'";
        return $this->query( $select_query );
    }
    
    
    function get_tasks(){
        $str_query = "select task_id, task_title,task_description, task_start_date, task_end_date, user_fname,user_sname from system_users, system_tasks where system_tasks.user_id = system_users.user_id order by task_id desc";
        return $this->query( $str_query );
    }
    
    function get_completed_tasks(){
        $str_query = "select task_id, task_title,task_description, task_start_date, task_end_date, user_sname from system_users, system_tasks where system_tasks.user_id = system_users.user_id and task_status='completed'";
        return $this->query( $str_query );
    }
    
    function get_ongoing_tasks(){
        $str_query = "select task_id, task_title,task_description, task_start_time, task_end_time, user_fname from system_users, system_tasks where tasks.nurse_id = Nurse.nurse_id and task_status='ongoing'";
        return $this->query( $str_query );
    }
    
}

?>