<?php
session_start();
if(!(isset($_SESSION['id']) && ($_SESSION['username']) && $_SESSION['auth']=true)){
	header('location:index.php');	
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Delegate's register</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/jquery.validate.css" rel="stylesheet" type="text/css" media="all">
<?php include("include/insert.php");?>
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
    <div class="doctor">
    	<img src="images/stethoscope.png">
    </div>
    <div class="main" style="margin-left:300px;">
    	<div class="registration" >
        	<h3>Delegate's register</h3>
            <div class="reg-contain">
            <form action="registration.php" method="post" >
                <table>
                	<tr>
                    	<td><label>Registration Id</label></td>
                        <td>:</td>
                        <td>
                        	<label><div id="count"></div></label>
                       </td>
                    </tr>
                	<tr>
                    	<td><label>Name</label></td>
                        <td>:</td>
                        <td>
                        	<label for="prefix">Dr.</label>
                       		<input type="text" class="control-1" id="fname" name="fname" size="19" placeholder=" First name"/>
                        	<input type="text" class="control-1" id="lname" name="lname" size="" placeholder=" Last name" />
                       </td>
                    </tr>
                    <tr>
                    	<td><label>Phone</label></td>
                        <td>:</td>
                        <td><input type="text" class="control-1" id="phone" name="phone" size="23" placeholder=" Phone" /></td>
                    </tr><tr>
                    	<td><label>Email</label></td>
                        <td>:</td>
                        <td><input type="text" class="control-1" id="email" name="email" size="23" placeholder=" Email"/></td>
                    </tr>
                    <tr>
                    	<td><label>Address Line1</label></td>
                        <td>:</td>
                        <td><input type="text" class="control-1" id="address1" name="address1" size="23" /></td>
                    </tr>
                    <tr>
                    	<td><label>Address Line2</label></td>
                        <td>:</td>
                        <td><input type="text" class="control-1" id="address2" name="address2" size="23" /></td>
                    </tr>
                    <tr>
                    	<td><label>Pincode</label></td>
                        <td>:</td>
                        <td><input type="text" class="control-1" id="pincode" name="pincode" size="23" /></td>
                    </tr>
                    <tr>
                    	<td><label>State</label></td>
                        <td>:</td>
                        <td>
                        	<select name="state" class="control-1" id="state">
                            	<option value="">-----Choose State-----</option>
                            	<?php 
									include('include/connection.php');
									$result=mysql_query("SELECT * FROM states");
									while($row=mysql_fetch_array($result)) {
										echo "<option value='".$row['id']."'>".$row['name']."</option>";
									}
								?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td><label>City</label></td>
                        <td>:</td>
                        <td>
                        	<select name="city" class="control-1" id="city">
                            	<option value="">----------Choose City---------</option>
                            </select>
                        </td>
                    </tr>
                     <tr>
                    	<td><label>Payment</label></td>
                        <td>:</td>
                        <td>
                        	<input type="radio" id="status" name="status" value="Paid" checked required /><label>Paid</label>  <input type="radio" name="status" value="Not Paid" required/><label>Not Paid</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"></td>
                    </tr>
                </table>
                <div id="sa"></div>
                <div align="right">
                	<?php if(isset($msg)){ if($msg==1){echo "<span id='msg1'><img src='images/ticks.png' /> Sucessfully Added New Doctor  </span>";}else{echo "<span id='msg2'><img src='images/alert.png' /> Deligate already Exist  </span>";}}?><input type="submit" class="button-1" name="register" value="Register" />
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