<?php include 'header.php';?>
<?php
session_start();

$id = $_REQUEST['id'];
 $con=mysql_connect("localhost", "root", "");
          mysql_select_db("bankproject",$con);
$query=mysql_query("SELECT * FROM mstuser Where id='$id'",$con);
?>
<html>
<head>
    <title>Detail page</title>
    <script>
        function popup(a){
            if (confirm("State to Inactive")) {

                var d=a;
                window.location.href =a;
            }
        }
    </script>
</head>
<body class="detail">
    <h3 align="center" style="color:#6699ff; font-variant: small-caps; font-size: 150%;">Single Persons Detail</h3>
<h4 align="right"><a href="chngpass.php?d=<?php echo $id;?>">Change Password</a></h4> 
<h4 align="right"><a onclick="javascript:popup(this.href); return false;" href="delete.php?d=<?php echo $id;?>">Delete This Record</a></h4> 

<h3 align="right"><a href="index.php">Logout(<?php echo $_SESSION['uid']; ?>)</a></h3>



<form action="updated.php" method="POST" enctype="multipart/form-data">
<table style="font-family:sans serif;" align="center" border="1">
    <?php $i=0;
    while ($data=mysql_fetch_array($query)) { ?>

    <tr><td>ID</td><td><input type="text" id="id" name="upid" value="<?php echo $data ['id']; ?> " readonly></td></tr>
    <tr><td>USERID</td><td><input type="text" id="upusid" name="upusid" value="<?php echo $data ['userid']; ?> " readonly></td></tr>
    <tr><td>NAME</td><td><input type="text" name="upname" id="upname"  value="<?php echo $data ['firstName']; ?> "></td></tr>
    <tr><td>GENDER</td><td>
    <input type="radio" name="gen" <?php echo ($data ['gender']=='1')? 'checked':'' ?> value="1">Male
    <input type="radio" name="gen" <?php echo ($data ['gender']=='2')? 'checked':'' ?> value="2">Female<br></td>
    </tr>

    <tr><td>USERTYPE</td>
    <td>
<select name="upusertype">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                    <option value="business">Business</option>
                    <option value="student">Student</option>
</select>
    </td></tr>
    <tr><td>ADDRESS</td><td><input type="text" id="upadd" name="upadd" value="<?php echo $data ['address1']; ?> " ></td></tr>
    <tr><td>CONTACT</td><td><input type="text" id="upcon" name="upcon" value="<?php echo $data ['contact']; ?> "></td></tr>
    <tr><td>PINCODE</td><td><input type="text" id="uppin" name="uppin" value="<?php echo $data ['pin']; ?> "></td></tr>
    <tr><td colspan="1">PAYMENT</td><td>
        <input type="checkbox" id="uppin" name="check" value="1" <?php if($check=="1"){echo "checked";} ?>><label>Check</label>
        <input type="checkbox" id="uppin" name="cash" value="2" <?php if($cash=="2"){echo "checked";} ?>><label>Cash</label>
        <input type="checkbox" id="uppin" name="credit card" value="3" <?php if($card=="3"){echo "checked";} ?>><label>Credit Card</label>
    </td></tr>

    <tr><td>EMAIL</td><td><input type="text" id="upemail" name="upemail" value="<?php echo $data ['email']; ?> " ></td></tr>

    <tr><td>IMAGE</td><td><img src="upload/images<?php echo $data ['image']; ?> " height="100px" width="60px"></td></tr>
   <?php } ?>  
          
 </table>
       
<center><input type="submit" name="Submit" value="UPDATE" /></center>
</form>

</body>
</html>
