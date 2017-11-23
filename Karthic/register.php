<?php
	 $username   = $_REQUEST['uname'];
	 $password   = $_REQUEST['pwd'];
	 $pass      = md5($password);
	 $date 		=	date('Y-m-d H:i:s');
	 $delFlg=('0');
	 $gender     = $_REQUEST['gender'];
	 $userType   = $_REQUEST['utype'];
	 $address1   = $_REQUEST['address1'];
	 $contactNo	 = $_REQUEST['contact'];
	 $pincode    = $_REQUEST['pin'];
	 $Payment1   = $_REQUEST['check'];
	 $Payment2   = $_REQUEST['cash'];
	 $Payment3   = $_REQUEST['creditcard'];
	 $Payment    = $Payment1.",".$Payment2.",".$Payment3;
	 $Email		 = $_REQUEST['email'];
//echo $Image		 = $_REQUEST['pic']; 
	 $Image   	 = $_FILES['pic'];
print_r($Image); echo "</br>";
echo $imgname    = $Image['name'];
echo $imgtmpname = $Image['tmp_name'];
	 $Path		 = "upload/images/";
	 $ext		 = substr(strtolower(strrchr($imgname,'.')),1);
	 $array_ext	 = array('jpg','jpeg','png');
	 if(in_array($ext,$array_ext))
	 {
	 	move_uploaded_file($imgtmpname,$Path.$username.$imgname);
	 	$con=mysql_connect("localhost","root","");
	 	mysql_select_db("bankproject",$con);
	 	$count=mysql_query("SELECT COUNT(*)as Cnt FROM mstUser",$con);
	 	$total=mysql_fetch_array($count);
	 	$countdata=$total['Cnt']+1;
	 	$k="RIO";
	 	$uid=str_pad($countdata,4,"0",STR_PAD_LEFT);
	 	$userid=$k.$uid;
	 	$query=mysql_query("INSERT INTO mstUser(userid,userType,firstName,password,createdBy,createdDate,delFlg,gender,address1,contact,pin,Payment)
	 		VALUES('$userid','$userType','$username','$pass','$username','$date','$delFlg','$gender','$address1','$contactNo','$pincode','$Payment')",$con);
		//header('Location:index.html');
	}
	else
	 {
	 	echo"Invalid Image Format";
	 }		 
?>