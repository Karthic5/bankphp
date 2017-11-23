<?php include 'header.php';?>
<?php session_start();?>
<h3 align="right"><a href="index.php">Logout(<?php echo $_SESSION['uid']; ?>)</a></h3>
<?php
	 $id   = $_REQUEST['d'];
	 
$con=mysql_connect("localhost","root","");
mysql_select_db("bankproject",$con);
$query=mysql_query("UPDATE mstuser SET delFlg='1' WHERE id='$id'",$con);
if ($query) {
	header('location:success.php');
}
else{
	echo 'fail';
}
?>