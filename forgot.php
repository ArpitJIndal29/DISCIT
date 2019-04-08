<?php
  SESSION_START();
  require 'info.php';
?>
<head>
<center>
<title></title>
<link rel="stylesheet" type="text/css" href="style2.css">
</center>
</head>
<body bgcolor="#3498db">
   <form  action="forgot.php" method="post">
   <br><br>
   <div id="style2">
   <br>
   <br>
   <center>
   <h1>Password Recovery!</h1>
   </center>
   <center><input type="email" class="val1" name="email" placeholder="Please enter your email id."required/></center><br>
   <center><input type="submit" name="forgot" value="Request Password."/></center>
   <br>
   </form>
</div>
</form>
</body>
<?php
  if(isset($_POST["fogot"]))
  {
	  $email=mysqli_real_escape_string($info,$_POST['email']);
	  $q1="SELECT userid FROM user_info2 WHERE email='$email'";
	  $q1_try=mysqli_query($info,$q1);
	  if(mysqli_num_rows($q1_try)>0)
	  {
		  $str="asdfghjklqwertyuiop123";
		  $str=str_shuffle($str);
		  $str=substr(str,0,10);
		  $url="example.com"
		  mail($email,"Reset password","To reset password,please visit this website:$url","From:")
		   $q2="UPDATE user_info2 SET token='$str' WHERE email='$email'";
	       $q1_try=mysqli_query($info,$q2);
		   
	  }
	  else
	  echo '<script type="text/javascript"> alert("PLEASE CHECK YOUR INPUTS.")</script>'; 
  }
?>