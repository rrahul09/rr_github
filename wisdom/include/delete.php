<?php 
include('connection.php');
	$query="DELETE FROM doctors WHERE id=".$_POST['id'];
	mysql_query($query);
	if(mysql_affected_rows()==1) 
	{
		echo "Suceessfully Deleted";
	}
?>