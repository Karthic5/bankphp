<?php 
$page=$_GET['page'];
if($page<1){
	$page=1;
}
$con = mysql_connect("localhost","root","");
mysql_select_db("bankproject", $con);
$resultperpage=3;
$startresult=($page-1)*$resultperpage;
$count=mysql_query("SELECT count(*) FROM mstuser WHERE delFlg='0'",$con);
$row=mysql_fetch_array($count);
$noofrows=$row[0];
$totalpage=ceil($noofrows/$resultperpage);
$query=mysql_query("SELECT * FROM mstuser WHERE delFlg='0' LIMIT $startresult,$resultpage",$con);
?>