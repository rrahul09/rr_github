<?php
	if(isset($_POST['save']))
	{
		include("connection.php");
		$id=$_SESSION['id'];
		$username=$_POST['username'];
		$Cpass=md5($_POST['Cpass']);
		$query="SELECT * FROM login WHERE username='$username' AND password='$Cpass'";
		$res=mysql_query($query);
		$num_rows=mysql_num_rows($res);
		if($num_rows==1) {
			$Npass=md5($_POST['Npass']);
			$Rpass=md5($_POST['Rpass']);
			if($Npass!=$Rpass)
			{
				$msg=3;
			}
			else
			{
				$query="UPDATE login SET username='$username',password='$Npass' WHERE id=$id";
				$update_res=mysql_query($query);
				if(mysql_affected_rows()==1)
				{
					$msg=1;
					$query="SELECT * FROM login WHERE username='$username' AND password='$Npass'";
					$res=mysql_query($query);
					while($row=mysql_fetch_array($res)) {
						$_SESSION['id']=$row['id'];
						$_SESSION['username']=$row['username'];
						$_SESSION['auth']=true;
					}
				}
			}
		}
		else {
			$msg=2;	
		}
	}
?>