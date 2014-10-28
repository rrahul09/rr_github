<?php
	include('connection.php');
	$query=mysql_query("SELECT * FROM doctors");
	$count=mysql_num_rows($query);
	echo $count+=1;
?>