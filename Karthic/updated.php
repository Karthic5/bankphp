<?php include 'header.php';?>
<title>Update</title>
<?php session_start();?>
<h3 align="right"><a href="index.php">Logout(<?php echo $_SESSION['uid']; ?>)</a></h3>
<?php
	 $idd   = $_REQUEST['upid'];
	 $username   = $_REQUEST['upname'];
	 $gender     = $_REQUEST['gen'];
	 $userType   = $_REQUEST['upusertype'];
	 $address1   = $_REQUEST['upadd'];
	 $contactNo	 = $_REQUEST['upcon'];
	 $pincode    = $_REQUEST['uppin'];
	 $Payment1   = $_REQUEST['check'];
	 $Payment2   = $_REQUEST['cash'];
	 $Payment3   = $_REQUEST['credit card'];
	 $Payment    = $Payment1.",".$Payment2.",".$Payment3;
	 $Email		 = $_REQUEST['upemail'];
//echo $Image		 = $_REQUEST['pic']; 
	 $Image   	 = $_FILES['pic'];
print_r($Image); echo "</br>";
echo"$username";
echo"$gender";
echo"$userType";
echo"$address1";
echo"$contactNo";
echo"$pincode";
echo"$Payment";
echo"$Email";
$con=mysql_connect("localhost","root","");
mysql_select_db("bankproject",$con);
$query=mysql_query("UPDATE mstuser SET firstName='$username',userType='$userType',address1='$address1',contact='$contactNo',
	pin='$pincode',Payment='$Payment',email='$Email' WHERE id='$idd'",$con);
?>