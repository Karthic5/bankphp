<?php include 'header.php'; ?>
<html>
<head>
	<title>REGISTRATION</title>
	<style type="text/css">
		.head {
			background-color: #9877e5;
			height: 100px;
		}
		.admin {
			float: right;
		}
		sup {
			color: red;
		}
	</style>
	<script type="text/javascript" src="jquery.min.js"></script>
<script>
	$(document).ready(function(){
        $("#reg").click(function()
        {
          var Name=$("#uname").val();
          var Password=$("#pwd").val();
          var Gender=$("#gender").val();
          var Usertype=$("#utype").val();
          var Address1=$("#addr1").val();
          var ContactNo=$("#cno").val();
          var Pincode=$("#pcode").val();
          var Check = $("input[name='check']:checked").size();
          var Cash = $("input[name='cash']:checked").size();
          var CreditCard = $("input[name='creditcard']:checked").size();
          var Email=$("#mail").val();
          var Image=$("#pic").val();
          var ext=img.substring(img.lastIndexOf('.')+1).toLowerCase();
          var alpha=/^[A-Za-z]+$/;
              var num=/^[0-9]+$/;
              var alphanum=/^[A-Za-z0-9]+$/;
          var emailid=/^[A-Za-z]([A-Za-z0-9_-]|(\.[A-Za-z0-9]))+@[A-Za-z0-9](([A-Za-z0-9]|(-[A-Za-z0-9]))+)\.([A-Za-z]{2,6})(\.([A-Za-z]{2}))?$/;
          if(Name=="")
            { alert("Enter your name");  return false; }
            else if(!alpha.test(uname))
              { alert("Enter characters only in Name"); return false;}
          else if(password=="")
            { alert("Enter password");   return false; }
            else if(pwd.length<6)
              { alert("Password must be above 6 characters"); return false;}
          else if($("input[name='gender']:checked").size()==0)
            { alert('Pick your Gender'); return false; }
          else if(Usertype=="")
            { alert("Pick your usertype"); return false;} 
          else if(Address1=="")
            { alert("Enter address");   return false; }  
          else if(ContactNO=="")
            { alert("Enter contact");  return false; }
            else if(!num.test(contact))
              { alert("Enter Numeric only in Contact"); return false;}
              else if(contact.length<10)
                { alert("Contact must be above 10 characters"); return false;}
          else if(Pincode=="")
            { alert("Enter pin");    return false; }
            else if(!num.test(Pincode))
              { alert("Enter Numeric only in Pincode"); return false;}
              else if(pcode.length<6)
                { alert("Pincode must be above 6 characters"); return false;}
          else if (check==0 && cash==0 && credit==0 )
            { alert('Select Payment');   return false; }
          else if(Email=="")
            { alert("Enter Email");      return false; }
            else if(!emailid.test(email))
                { alert("Invalid email id"); return false;}
          else if(img=="")
            { alert("Select an Image");  return false; }
              else if(ext != "jpg")
              { alert("Invalid Image");    return false; }
          else
            { 
            if(confirm("Do you want to Register ?"))
              { alert("Registration Success");
                return true; }
            else
              { return false; }
            }
        });
      });
    </script>
</head>
<body>
	<form action="register.php" method="POST" enctype="multipart/form-data">
<center><h2>REGISTRATION</h2></center>
	<table>
	<table align="center">
			<tr>
				<td>Name<sup>*</sup>
				</td>
				<td>
					<input type="text" name="username" id="uname">
				</td>
			</tr>
			<tr>
				<td>Password<sup>*</sup>
				</td>
				<td>
					<input type="password" name="pass" id="pwd">
				</td>
			</tr>
			<tr>
				<td>Gender<sup>*</sup>
				</td>
				<td>
  					<input type="radio" name="gender" value="1"> Male
  					<input type="radio" name="gender" value="2"> Female
  					<input type="radio" name="gender" value="3"> Other
				</td>
			</tr>
			<tr>
				<td>
					Usertype<sup>*</sup>
				</td>
				<td>
			<select name="userType" id="utype">
					<option value="">Select</option>
  					<option value="admin">Admin</option>
  					<option value="employee">Employee</option>
  					<option value="customer">Customer</option>
			</select>
				</td>
			</tr>
			<tr>
				<td>Address1<sup>*</sup>
				</td>
				<td>
					<textarea rows="3" cols="25" name="address1" id="addr1"></textarea>
				</td>
			</tr>
			<tr>
				<td>Address2
				</td>
				<td>
					<textarea rows="3" cols="25" name="address2" id="addr2"></textarea>
				</td>
			</tr>
			<tr>
				<td>ContactNo<sup>*</sup>
				</td>
				<td>
					<input type="number" name="contact" id="cno">
				</td>
			</tr>
			<tr>
				<td>Pincode<sup>*</sup>
				</td>
				<td>
					<input type="number" name="pin" id="pcode">
				</td>
			</tr>
			<tr>
				<td>Payment<sup>*</sup>
				</td>
				<td>
					<input type="checkbox" name="check" value="1"> Check
  					<input type="checkbox" name="cash" value="2"> Cash
					<input type="checkbox" name="creditcard" value="3"> CreditCard
				</td>
			</tr>
			<tr>
				<td>Email<sup>*</sup>
				</td>
				<td>
					<input type="text" name="email" id="mail">
				</td>	
			</tr>
			<td>Image<sup>*</sup>
			</td>
			<td>
  					<input type="file" name="pic" accept="image/*">
  			</td>
			<tr>
				<td>
					<input type="submit" value="Register" id="reg">
				</td>
				<td>
					<input type="Reset">
				</td>
			</tr>
	</table>
	</form>
</body>
</html>