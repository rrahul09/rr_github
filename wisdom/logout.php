<?php
ob_start();
session_start();
if(isset($_SESSION['id'])&&($_SESSION['username'])&&($_SESSION['auth']=true)){
	session_unset();
	session_destroy();
}
ob_end_clean();
header("location:index.php");
?>