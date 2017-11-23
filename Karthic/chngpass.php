<?php
session_start();
include 'header.php';


$id=$_REQUEST['d'];
echo "$id";
$con=mysql_connect("localhost", "root", "");// or die (mysql_error()); //Connect to server
          mysql_select_db("bankproject",$con);// or die ("Cannot connect to database"); //Connect to database


if(count($_POST)>0) {
$result = mysql_query("SELECT *from mstuser WHERE id='$id'");
$row=mysql_fetch_array($result);


// $ps=$row["password"];
// echo "$ps";
// $passw=md5($ps);
// echo "$passw";

$cp=$_POST["currentPassword"];
$cpp=md5($cp);

$np=$_POST["newPassword"];
$npp=md5($np);


if($cpp == $row["password"]) {
mysql_query("UPDATE mstuser set password='$npp' WHERE id='$id'");
$message = "Password Changed";

} else $message = "Current Password is not correct";
}
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="css/sty.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
    currentPassword.focus();
    document.getElementById("currentPassword").innerHTML = "required";
    output = false;
}
else if(!newPassword.value) {
    newPassword.focus();
    document.getElementById("newPassword").innerHTML = "required";
    output = false;
}
else if(!confirmPassword.value) {
    confirmPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "required";
    output = false;
}
if(newPassword.value != confirmPassword.value) {
    newPassword.value="";
    confirmPassword.value="";
    newPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "not same";
    output = false;
}   
return output;
}
</script>
</head>
<body>
    <h3 align="right"><a href="index.php">Logout(<?php echo $_SESSION['uid']; ?>)</a></h3> 

<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2"><b>Change Password</b></td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>