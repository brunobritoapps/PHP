<?php
include_once("config.php");
$db = mysqli_connect('127.0.0.1','root','','bdvitrine');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
        $mobile=$_POST['mobile'];
	$status=0;
	$activationcode=md5($email.time());
	$query=mysqli_query($db,"insert into userregistration(name,email,password,mobile,activationcode,status) values('$name','$email','$password','$mobile','$activationcode','$status')");
	if($query)
	{
$to=$email;
$msg= "Thanks for new Registration.";   
$subject="Email Verification";
$headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'From:W3tweaks <admin@w3tweaks.com>'."\r\n";
        
$ms.="<html></body><div><div>Dear $name,</div></br></br>";
$ms.="<div style='padding-top:8px;'>Your account information is successfully updated in our server, Please click the following link For verifying and activate your account.</div>
<div style='padding-top:10px;'><a href='http://localhost/login/email_verification.php?code=$activationcode'>Click Here</a></div>
<div style='padding-top:4px;'> powered by <a href='w3tweaks.com'>w3tweaks.com</a></div></div>
</body></html>";
mail($to,$subject,$ms,$headers);
		    	echo "<scriptSql RELATORIO PERFORMANCE>alert('Registration successful, please verify in the registered Email-Id');</scriptSql RELATORIO PERFORMANCE>";
				 echo "<scriptSql RELATORIO PERFORMANCE>window.location = 'login.php';</scriptSql RELATORIO PERFORMANCE>";;
	}
	else
	{
		echo "<scriptSql RELATORIO PERFORMANCE>alert('Data not inserted');</scriptSql RELATORIO PERFORMANCE>";
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Signup Form Email Verification PHP | W3tweaks</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>

	<body style="background-color:pink">
<div class="container-fluid">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        
		<form name="insert" action="" method="post">
     <table width="100%"  border="0">
    <tr>
    <th height="62" scope="row">Name </th>
    <td width="71%"><input type="text" name="name" id="name" value=""  class="form-control" required /></td>
  </tr>  
  <tr>
    <th height="62" scope="row">Email id </th>
    <td width="71%"><input type="email" name="email" id="email" value=""  class="form-control" required /></td>
  </tr>
  <tr>
    <th height="62" scope="row">Password </th>
    <td width="71%"><input type="password" name="password" id="password" value=""  class="form-control" required /></td>
  </tr>
<tr>
    <th height="62" scope="row">Mobile Number </th>
    <td width="71%"><input type="text" name="mobile" id="mobile" value=""  class="form-control" required /></td>
  </tr>
 <tr>
    <th height="62" scope="row"></th>
    <td width="71%"><input type="submit" name="submit" value="Submit" class="btn-group-sm" /> </td>
  </tr>
</table>
 </form>
      </div>
    </div>
  </div>
</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>