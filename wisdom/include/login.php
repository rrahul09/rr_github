<?php
	if(isset($_POST['login']))
	{
		include("connection.php");
		$username=$_POST['username'];
		$pass=md5($_POST['password']);
		$query="SELECT * FROM login WHERE username='$username' AND password='$pass'";
		$res=mysql_query($query);
		$num_rows=mysql_num_rows($res);
		if($num_rows==1) {
			while($row=mysql_fetch_array($res)) {
				session_start();
				$_SESSION['id']=$row['id'];
				$_SESSION['username']=$row['username'];
				$_SESSION['auth']=true;
				header('location:home.php');
			}
		}
		else {
			$msg=1;	
		}
	}
?>