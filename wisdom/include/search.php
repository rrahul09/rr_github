<?php
	$keyword=$_POST['keyword'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$status=$_POST['status'];
	$condition=0;
	$HTML="";
	include('connection.php');
	$query="SELECT * FROM doctors";
	if($keyword) {
		$query.=" WHERE (fname LIKE '%$keyword%' OR lname LIKE '%$keyword%' OR phone LIKE '%$keyword%' OR email LIKE '%$keyword%')";	
		$condition=1;
	}
	
	if($state) {
		if($condition) {
			$query.=" AND state=$state";
		}
		else {
			$query.=" WHERE state='$state'";
			$condition=1;
		}
	}
	if($city) {
		if($condition) {
			$query.=" AND city='$city'";
		}
		else {
			$query.=" WHERE city=city";
			$condition=1;
		}
	}
	
	if($status) {
		if($condition) {
			$query.=" AND status='$status'";
		}
		else {
			$query.=" WHERE status='$status'";
			$condition=1;
		}
	}
		//echo $query; exit();
		$result=mysql_query($query);
		if(mysql_num_rows($result)) {
			$i=1;
			while($row=mysql_fetch_array($result)) {
				$HTML.="<tr>";
				$HTML.="<td>$i</td><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['phone']}</td><td>{$row['email']}</td><td>";
				$state=mysql_query("SELECT * FROM states WHERE id=".$row['state']);
				while($state_row=mysql_fetch_array($state)) {
					$HTML.="{$state_row['name']}</td>";	
				}
				$city=mysql_query("SELECT * FROM cities WHERE id=".$row['city']);
				while($city_row=mysql_fetch_array($city)) {
					$HTML.="<td>{$city_row['name']}</td>";	
				}
				$HTML.="<td class='delete'><img class='delete' src='images/delete.png' width='30' height='25' onclick='delete_row(".$row['id'].");'/></td></tr>";
				$i++;
			}
		}
		else {
			$HTML.="<tr><td colspan=\"8\"><font color='#4277b5'>No record found</font></td></tr>";	
		}
		echo $HTML;
?>