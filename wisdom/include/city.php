<?php
	include('connection.php');
	$state_id=$_POST['state_id'];
	$query="SELECT * FROM cities WHERE state_id=$state_id ORDER BY name";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)) {
		$HTML.="<option value='".$row['id']."'>".$row['name']."</option>";
	}
	echo $HTML;
?>