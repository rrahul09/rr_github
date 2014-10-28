<?php
session_start();
if(!(isset($_SESSION['id']) && ($_SESSION['username']) && $_SESSION['auth']=true)){
	header('location:index.php');	
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>delegates's Search</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

<style type="text/css" media="print">
    @media print
    {
		.registration {
			border:2px solid #FFF;
			-webkit-box-shadow: #FFF 0px 0px 0px;
		}
		.reg-contain{
			background-color:#fff;
			
		}
		table {
			 border-collapse: collapse;
			}
		th,tr,td {
			border:2px solid black;
			}
        .control-1,.button-1,.menu,.option,.delete,.footer
        {
            display: none !important;
        }
    }
</style>


</head>
<body>
    <div class="">
    	<div class="logo"><img src="images/logo.png" width="175" height="80" /></div>
        <div class="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="registration.php">Registration</a></li> 
				<li class="active"><a href="search.php">Search</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
    </div>
    <div class="main">
    	<div class="registration">
        	<h3>Search</h3>
            <div class="reg-contain">
                <table class="option" style="margin-left:30px;">
                	<tr>
                        <td><input type="text" class="control-1" id="search" size="" /></td>
                        <td>
                        	<select name="" class="control-1" id="state">
                            	<option value="">-----  Choose State  -----</option>
                            	<?php 
									include('include/connection.php');
									$result=mysql_query("SELECT * FROM states");
									while($row=mysql_fetch_array($result)) {
										echo "<option value='".$row['id']."'>".$row['name']."</option>";
									}
								?>
                            </select>
					 <img id="close_state" src="images/delete_new.png" />
                        </td>
                        <td>
                        	<select name="" class="control-1" id="city">
                            	<option value="">------  Choose City ------</option>
                            </select>
					 <img id="close_city" src="images/delete_new.png" />
                        </td>
                        <td>
                        	<select id="status" class="control-1">
                            	<option value="">-- Payment wise--</option>
                                <option value="Paid">Paid</option>
                                <option value="Not Paid">Not Paid</option>
                            </select>
                        </td>
                        <td><input type="button" onClick="window.print();" class="button-1" name="" value="Print" /></td>
                    </tr>
                </table>
                <div class="result" align="center">
                	<table class="tbl" rule="all">
                    	<tr class="tr-color">
                        <th>Slno</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>City</th>
                        <th class="delete">Action</th>
                        </tr>
                        <tbody id="search_result"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    	<p>Copyright &copy; 2014 - All Rights Reserved - Developed by Weronix</p>
    </div>
</body>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
	var search_doc=function(keyword,state,city,status) {
		var dataString='keyword='+keyword+'&state='+state+'&city='+city+'&status='+status;
			//alert(dataString);
			$('#search_result').html("<img src='images/loading.gif' />");
			$.ajax({
				type:"POST",
				url:"include/search.php",
				data:dataString,
				cache:false,
				success:function(data) {
					$('#search_result').html(data);
				}
			});
	}
	$(document).ready(function(){
		$('#close_state').hide();
		$('#close_city').hide();
		search_doc('','','','');
		$('#search').keyup(function(){
			$('#result').html(" <img src='loading.gif' />");
			var keyword=$('#search').val();
			var state=$('#state').val();
			var city=$('#city').val();
			var status=$('#status').val();
			search_doc(keyword,state,city,status);
		});
		
		$('#state').change(function(){
			var keyword=$('#search').val();
			var state=$('#state').val();
			$('#city').val('');
			var city=$('#city').val();
			var status=$('#status').val();
			if(state!="") {
				$('#close_state').show();
				$.ajax({
					type:"POST",
					url:"include/city.php",
					data:'state_id='+state,
					cache:false,
					success: function(html){
						$('#city').html("<option value=''>------  Choose City ------</option>").append(html);
					}
				});
			}
			else{
				$('#close_state').hide();
				$('#city').html("<option value=''>------  Choose City ------</option>");
			}
			search_doc(keyword,state,city,status);
		});
		
		$('#city').change(function(){
			$('#close_city').show();
			var keyword=$('#search').val();
			var state=$('#state').val();
			var city=$('#city').val();
			var status=$('#status').val();
			search_doc(keyword,state,city,status);							 
		});
		
		$('#status').change(function(){
			var keyword=$('#search').val();
			var state=$('#state').val();
			var city=$('#city').val();
			var status=$('#status').val();
			search_doc(keyword,state,city,status);							 
		});

		$('#close_city').click(function(){
			$('#city').val('');
			var keyword=$('#search').val();
			var state=$('#state').val();
			var city=$('#city').val();
			var status=$('#status').val();
			search_doc(keyword,state,city,status);
			$('#close_city').hide();
		});

		$('#close_state').click(function(){
			$('#city').html("<option value=''>------  Choose City ------</option>");
			$('#state').val('');
			var keyword=$('#search').val();
			var state=$('#state').val();
			var city=$('#city').val();
			var status=$('#status').val();
			search_doc(keyword,state,city,status);
			$('#close_state').hide();
			$('#close_city').hide();
		});
	});									
</script>
<script>
	function delete_row(id) {
		var c=confirm('Are you sure want to delete?');
		if(c) {
			$.ajax({
				type:"POST",
				url:"include/delete.php",
				data:'id='+id,
				cache:false,
				success:function(data) {
					alert(data);
					var keyword=$('#search').val();
					var state=$('#state').val();
					var city=$('#city').val();
					var status=$('#status').val();
					search_doc(keyword,state,city,status);
				}
			});	
		}
		else{
			return false;	
		}
	}
</script>
</html>