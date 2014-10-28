<?php include("include/login.php");?>
<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Login</title>
</head>
<body>
	<div class="header"></div>
	<div class="banner">
		<img src="images/logo.png" width="70%" height="200" style="opacity:0.9;" />
	</div>
	<div class="login">
		<div class="login-head">Login</div>
            <form action="" method="post" >
				<table class="login-body">
    				<tr>
        				<td><label>Username</label></td>
            			<td><label>:</label></td>
        				<td><input type="text" name="username" size="26"/></td>
        			</tr>
        			<tr>
        				<td><label>Password</label></td>
            			<td><label>:</label></td>
        				<td><input type="password" name="password" size="26" /></td>
        			</tr>
        			<tr>
        				<td colspan="3" align="right">
                        <?php if(isset($msg)){  
					if($msg==1){echo "<span id='msg3'><img src='images/unchecked.gif' /> Invalid username or password </span>";}
					}?>
                        <input type="submit" class="button-1" name="login" value="Login" /></td>
        			</tr>
    			</table>
            </form>
		</div>
<div class="footer">
	<p>Copyright &copy; 2014 Weronix. All rights reserved</p>
</div>
</body>
</html>
