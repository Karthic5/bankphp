<?php include 'header.php';?>
<html>
<head>
	<h2 align="center" style="color:blue">Enter The Details</h2>
	<h3 align="center" style="color:blue">To Change The Password</h3>
</head>
<title>Change Password</title>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<body>
<form action="process.php" method="post" align="center">
<table border="0" cellpadding="3" cellspacing="0">
    <tr>
        <td>
            Password:
        </td>
        <td>
            <input type="password" id="txtPassword" />
        </td>
    </tr>
    <tr>
        <td>
            Confirm Password:
        </td>
        <td>
            <input type="password" id="txtConfirmPassword" />
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            <input type="button" id="btnSubmit" value="Submit" onclick="return Validate()" />
        </td>
    </tr>
</table>

</form>
</body>
</html>