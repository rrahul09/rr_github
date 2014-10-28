<?php
if(isset($_POST['register'])){
	include('connection.php');
	$date=date('Y-m-d H:i:s');
	$sel_query="SELECT * FROM doctors WHERE fname='".$_POST['fname']."' AND lname='".$_POST['lname']."'";
	mysql_query($sel_query);
	if(mysql_affected_rows()>=1) 
	{
		$msg=2;
	}
	else{
	$query="INSERT INTO doctors(prefix,fname,lname,phone,email,address1,address2,state,city,pincode,status,created,modified) VALUES('Dr.','".$_POST['fname']."','".$_POST['lname']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['state']."','".$_POST['city']."','".$_POST['pincode']."','".$_POST['status']."','$date','$date')";
	mysql_query($query);
	if(mysql_affected_rows()==1) 
	{
		$msg=1;
	}
	}
}
?>