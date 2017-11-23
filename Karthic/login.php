<?php session_start();
$userid=$_REQUEST['username'];
$pass=$_REQUEST['pass'];
$Password=md5($pass);
$con=mysql_connect("localhost","root","");
		mysql_select_db("bankproject",$con);
$query=mysql_query("SELECT * FROM mstUser Where userid='$userid' AND password='$Password'",$con);	
$login=mysql_fetch_array($query);
$_SESSION['uid']=$login['firstName'];
if ($login)
	{
	header('Location:success.php');
	}
	else
	{
	header('Location:index.php');
} 
?>