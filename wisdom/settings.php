<?php
session_start();
if(!(isset($_SESSION['id']) && ($_SESSION['username']) && $_SESSION['auth']=true)){
	header('location:index.php');	
}
include("include/settings.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delegate's register</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.validate.css" rel="stylesheet" type="text/css" media="all">
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
    <div class="main" style="margin-left:220px;">
    	<div class="registration" >
        	<h3>Settings</h3>
            <div class="reg-contain">
            <form action="" method="post" >
                <table>
                	<tr>
                    	<td><label>Username</label></td>
                        <td>:</td>
                        <td>
                       		<input type="text" class="control-1" name="username" size="19" value=""/>
                       </td>
                    </tr>
                    <tr>
                    	<td><label>Current Password</label></td>
                        <td>:</td>
                        <td>
                       		<input type="password" class="control-1" name="Cpass" size="19" value=""/>
                       </td>
                    </tr>
                    <tr>
                    	<td><label>New Password</label></td>
                        <td>:</td>
                        <td>
                       		<input type="password" class="control-1" name="Npass" size="19" value=""/>
                       </td>
                    </tr>
                    <tr>
                    	<td><label>Re-Type Password</label></td>
                        <td>:</td>
                        <td>
                       		<input type="password" class="control-1" name="Rpass" size="19" value=""/>
                       </td>
                    </tr>
                </table>
                <div align="right">
                	<?php if(isset($msg)){  
					if($msg==1){echo "<span id='msg1'><img src='images/ticks.png' /> Successfully Changed  </span>";}
					if($msg==2){echo "<span id='msg3'><img src='images/unchecked.gif' /> Invalid username or password </span>";}
					if($msg==3){echo "<span id='msg2'><img src='images/alert.png' /> Passwords are not match </span>";}
					}?><input type="submit" class="button-1" name="save" value="Save" />
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
    	<p>Copyright &copy; 2014 - All Rights Reserved - Developed by Weronix</p>
    </div>
    
</body>
<script src="js/jquery-1.9.1.min.js"></script>

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
            
            jQuery(function(){
                jQuery("#fname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter your First Name"
                });
				
				jQuery("#fname").validate({
                    expression: "if (VAL.length>1) return true; else return false;",
                    message: "First Name should have atleast 2 character"
                });
				jQuery("#lname").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter your Last Name"
                });
                jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email id"										
                });
				jQuery("#phone").validate({
                    expression: "if (VAL.match(/^[0-9][0-9]{9}$/)) return true; else return false;",
                    message: "Please enter a valid Mobile Number"
                });
				jQuery("#address1").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please enter address"
                });
				jQuery("#pincode").validate({
                    expression: "if (VAL.length==6) return true; else return false;",
                    message: "invalid pincode"
                });
				jQuery("#state").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please select state"
                });
				jQuery("#city").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "please select city"
                });
			});
				
				var count=function() {
					$.ajax({
					type:"POST",
					url:"include/count.php",
					cache:false,
					success:function(html){
						$('#count').html(html);
					}
					});
				}
				
				count();
		$('#state').change(function(){
			var state=$('#state').val();
			if(state!="") {
				$.ajax({
					type:"POST",
					url:"include/city.php",
					data:'state_id='+state,
					cache:false,
					success: function(html){
						$('#city').html("<option value=''>----------Choose City---------</option>").append(html);
					}
				});
			}
			else {
				$('#city').html("<option value=''>----------Choose City---------</option>");	
			}
		});
				$('#msg1').fadeOut(10000);
				$('#msg2').fadeOut(10000);
			
				$('#fname').keyup(function(e) {
				if (e.keyCode == 32) {
					$('#lname').focus();
				}
			});
        </script>


</html>