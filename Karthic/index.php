<?php include 'header.php';?>
<html>
<head>
<script>
	$(document).ready(function() {
      alert("Welcome To Our Login page");
	    $("#btnlogin").click(function() {
	      var username=$("#uname").val();
	      var pass=$("#pwd").val();
	      if(username=="") { 
				alert("Enter your name");  return false; 
			} else if(pass=="") {
				alert("Enter password");   return false; 
			} else { 
				$("#formlogin").submit(); 
			}
		});
	});
</script>
	<title>RTB LOGIN PAGE</title>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $("#popup").modal({
        show: false,
        backdrop: 'static'
    });
    
    $("#click-me").click(function() {
       $("#popup").modal("show");             
    });
});
</script>
<center><h2>LOGIN</h2></center>
</head>
<body>
<form name="formlogin" id="formlogin" action="login.php">
<table>
<table border="2" align="center">
	<tr>
		<td bgcolor="24D83D">
			Name
		</td>
		<td>
			<input type="text" name="username" id="uname">
		</td>
	</tr>
	<tr>
		<td bgcolor="24D83D">
			Password
		</td>
		<td>
			<input type="password" name="pass" id="pwd">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="button" value="Login" id="btnlogin">
			<input type="reset">
			<a href="Registration.php">Sign Up</a>
		</td>
	</tr>		
</table>
</form>
<form name="mailsent" method="post" action="mailsent.php" >
<div class="modal" id="popup" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3>Enter Email Id</h3>
            </div>
            <div class="modal-body">

                <input type="text" name="mail" id="mail">

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div align="center">
        <a id="click-me" class="btn btn-primary">Forgot Password?</a> 
        </div>
        </form>
    </body>
        <script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.0/js/bootstrap.min.js"></script>
</html>