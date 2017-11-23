<?php include 'header.php';
session_start();
?>
<title>DB Managed Page</title>
<center>
<?php
$gender=$_REQUEST['gen'];
if($gender==''){echo "ALL"; }else{?>
<a href="success.php">All</a>
<?php }
if($gender=='1'){echo "MALE";}else{ ?>
<a href="success.php?gen=1">Male</a>
<?php }
if($gender=="2"){echo"FEMALE";}else{?>
<a href="success.php?gen=2">Female</a>
<?php
}
?>
&nbsp;&nbsp;
&nbsp;&nbsp;
<tr>
<td>
	<label>Sort</label>
	<select onchange="test(this)" id="selectid">
	<option value="">Select</option>
  	<option value="userType">USER TYPE</option>
  	<option value="firstName">NAME</option>
  	<option value="gender">GENDER</option>
	</select>
<form name="frmhome" action="success.php" method="POST">
	<input type="text" name="search" id="search">
	<input type="submit" value="search">
<?php $s=$_REQUEST['search'];
echo"$s";
?> 
</form>
</td>
</tr>
&nbsp;&nbsp;
&nbsp;&nbsp;
</center>
<html>
<body bgcolor="skyblue">
<h3 align="right"><a href="index.php">Logout(<?php echo $_SESSION['uid']; ?>)</a></h3>
<head>
	<h2 style="color:green;">
		Login Successfully!
	</h2>
	<center><h1 style="color:blue;">Account Maintain Details</h1></center>
</head>
<script>
	function test(a) {
		var x = (a.value || a.options[a.selectedIndex].value);
		window.location.href="success.php?x="+x;
	}
</script>
<?php
$ut=$_REQUEST['x'];
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 mysql_select_db("bankproject", $con);

$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$query=mysql_query("SELECT COUNT(id) FROM mstuser",$con);
$row = mysql_fetch_row($query);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);


 //$result = mysql_query("SELECT userid,firstName,gender,address1,contact,pin,Payment FROM mstuser");
		if (!empty($gender)) {
		$query=mysql_query("SELECT * FROM mstuser WHERE gender='$gender'AND delFlg='0'",$con);
		}
		elseif (!empty($s)) {
 	$query=mysql_query("SELECT * FROM mstuser WHERE firstName LIKE '%$s%'",$con);
 }
		elseif(!empty($ut)) {
		$query=mysql_query("SELECT * FROM mstuser ORDER BY $ut ASC",$con); }
		elseif(!empty($page)) {
		$query=mysql_query("SELECT * FROM mstuser WHERE delFlg='0' LIMIT $start_from,$limit",$con); }
 else {
 	$query=mysql_query("SELECT * FROM mstuser WHERE delFlg='0'",$con);
 }
echo "<table border='1' table align='center'>
<tr>
<th>ID</th>
<th>USERID</th>
<th>USER TYPE</th>
<th>NAME</th>
<th>CREATED BY</th>
<th>DELFLAG</th>
<th>GENDER</th>
<th>ADDRESS</th>
<th>CONTACT NO</th>
<th>PINCODE</th>
<th>PAYMENT TYPE</th>
</tr>";
while($row = mysql_fetch_array($query))
{
	$U_id=$row[0];
			$url='detail.php?id='.$U_id;
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td><a href='$url'>". $row['userid'] ."</a></td>";
echo "<td>" . $row['userType'] . "</td>";
echo "<td>" . $row['firstName'] . "</td>";
echo "<td>" . $row['createdBy'] . "</td>";
echo "<td>" . $row['delFlg'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['address1'] . "</td>";
echo "<td>" . $row['contact'] . "</td>";
echo "<td>" . $row['pin'] . "</td>";
echo "<td>" . $row['Payment'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>
<h4 align="right"><a href="pdf.php">Download as PDF</a></h4>
<h5 align="right"><a href="excel.php">Download as EXCEL</a></h5>
<?php  
  // code for pagenation
if ($page>1) {
	echo '<a href="?page=1"><b>First</b></a>&nbsp;';
	echo '<a href="?page='.($page-1).'"><b>Prevoius</b></a>&nbsp;';
}else{
	echo'First';
	echo'Prevoius';
}
$start=1;
$end=3;
if ($page>3) {
	$start=$page-1;
	$end=$page+1;
	if ($end>$total_pages) {
		$start=$total_pages-2;
		$end=$total_pages;
	}
}
for($i=$start;$i<=$end;$i++){
    if($i==$page){
    echo '<strong>'.$i.'</storng>&nbsp;';		
    }
    else{
      echo '<a href="?page='.$i.'">'.$i.'</a>&nbsp;';
  }
}
if($page<$total_pages){
	echo '<a href="?page='.($page+1).'"><b>Next</b></a>&nbsp;';
	echo '<a href="?page='.$total_pages.'"><b>Last</b></a>&nbsp;';
}
else{
	echo 'Next';
	echo 'Last';
}
?>
</body>
</html>