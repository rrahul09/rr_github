<?php
session_start();
if(!(isset($_SESSION['id']) && ($_SESSION['username']) && $_SESSION['auth']=true)){
	header('location:index.php');	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Home</title>
</head>

<body>
<div class="">
    	<div class="logo"><img src="images/logo.png" width="175" height="80" /></div>
        <div class="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li class="active"><a href="registration.php">Registration</a></li> 
				<li><a href="search.php">Search</a></li>
             	<li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
    </div>
     <div class="main">
<div class="banner">
<img src="images/logo.png" width="70%" height="200" style="opacity:0.1;" />
</div>
</div>
<div class="divbg">
<a href="registration.php"><img src="images/register-button_0.jpg" width="300" height="100" /></a>
</div>
<div class="divbg">
<a href="search.php"><img src="images/Button_search.png" width="300" height="70" /></a>
</div>
<div class="footer">
	<p>Copyright &copy; 2014 Weronix. All rights reserved</p>
</div>
</body>
</html>
