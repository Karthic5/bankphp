<?php include 'header.php';?>
<html>
<head>
	<h2 align="center" style="color:blue">Enter The Details</h2>
	<h3 align="center" style="color:blue">To Change The Password</h3>
<script type="text/javascript">
	$(document).ready(function() {
      alert("This is password change page");
	    $("#btn-save").click(function() {
	      var userid=$("#uid").val();
	      var currentPassword=$("#curntpass").val();
	      if(userid=="") { 
				alert("Enter your userid");  return false; 
			} else if(currentPassword=="") {
				alert("Enter current password");   return false; 
			} else { 
				$("#formchange").submit(); 
			}
		});
	});

    function Validate() {
        var password = document.getElementById("txtnewPassword").value;
        var confirmnewpassword = document.getElementById("txtconfirmnewPassword").value;
        if (password != confirmnewpassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>	
</head>
<title>Forgot Password</title>

<body>
<form action="process.php" name="formchange" method="post" align="center">
<table align="center">
	<tr>
		<td>
			UserId:
		</td>
		<td>
			<input class="input" type="text" placeholder="Enter userid" name="userid" id="uid" required><br><br>
		</td>
	</tr>
	<tr>
		<td>
			Current Password:
		</td>
		<td>
			<input class="input" type="password" placeholder="*********" name="currentPassword" id="curntpass" required><br><br>
		</td>
	</tr>	

	<tr>
		<td>
			New Password:
		</td>
		<td>
			<input class="input" type="password" placeholder="*********" name="newPassword" id="txtnewPassword" required><br><br>
		</td>
	</tr>
	<tr>
		<td>
			Confirm New Password:
		</td>
		<td>
			<input class="input" type="password" placeholder="*********" name="confirmnewPassword" id="txtconfirmnewPassword" required><br><br>
		</td>
	</tr>
</table>
<button type="submit" name="btn-save">Submit</button>
<button type="reset" name="btn-reset">Reset</button>
</form>
</body>
</html>