<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>


<style>
body 
{
  background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-smart-robot-arm-advertising-background-backgroundrobotblue-backgrounddark-backgroundlightlight-image_68405.jpg' );
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.bigbox{
top: 50%;
  left: 50%;
  position: absolute;
  margin: 0;
  transform: translate(-50%, -50%);
      line-height: 1.34;
}
.table {
background-color: #fff;
padding: 20px;
border: 1px solid #ddd;
}
.table {
  border-spacing: 0;
  width: 400px;
  border: 1px solid #ddd;
}
.headtext{
  text-align: center;
  text-decoration: bold;
  font-size: 25px;
  font-weight: 600;
}
.subtext{
  text-align: center;
}
.email{
   width: 399px;
   height: 36px;
}
.submit{
  background-color: #00a400;
   width: 200px;
   height: 36px;
   font-size: 19px;
   text-align: center;
   font-weight: 600;
   color: #fff;
   border-radius: 8px;
   border: none;
   outline: none;

}
.submitbut{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>	
<title>Registration Page</title>
<link rel="stylesheet" href="css/stylex.css">
</head>
<body>
	<div class="bigbox">
  <div class="table">
    <div class="headtext">
    	 <span>Create a new account</span>
			<div class="imgcontainer">
			<img src="image/user_avatar.png" class="avatar"/>
		</div>
    </div>
    <div class="subtext">
    <h2><strong>Sign Up</strong></h2>
  </div>
  <hr>
    <form action="index.php"method="post">
      <input class="email" name="username" type="text"  placeholder="Type your username" required/><br><br>
      <input class="email" name="email" type="text"  placeholder="Type your email" required/><br><br>
      <input class="email" name="password" type="password"  placeholder="Your password" required/><br><br>
      <input class="email" name="cpassword" type="password" placeholder="Confirm password" required/><br><br>
      <div class="submitbut">
      <input class="submit" name="submit_btn" type="submit" value="Sign Up"/>
      </div>
    </form>
    <p style="text-align: center;font-size: 20px;"><a href="login.php">Already have an account?</a></p>
  </div>
</div>
	
	<div id="main-wrapper">
		
		<?php
			if(isset($_POST['submit_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

			#	$fullname =$_POST['fullname'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];
			#	$gender = $_POST['gender'];
			#	$qualification = $_POST['qualification'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($password==$cpassword)
				{
					$query= "select * from users WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{
						$query= "insert into users values('','$username','$email' ,'$password')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}
				
				
				
				
			}
		?>
	</div>
</body>
</html>