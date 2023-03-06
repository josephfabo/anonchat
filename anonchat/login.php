<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>


<title>Login Page</title>
<link rel="stylesheet" href="css/stylex.css">
-->
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



</head>

<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
	

<body>
	<div class="bigbox">
  <div class="table">
    <div class="headtext">
			<div class="imgcontainer">
			<img src="image/bot_avatar.png" class="avatar"/>
		</div>
    </div>
    <div class="subtext">
    <h2><strong>Login</strong></h2>
  </div>
  <hr>
    <form action="login.php" method="post">
      <input class="email" name="username"  type="text" placeholder="Enter Username here..." required/><br><br>
      <input class="email" name="password"  type="password" placeholder="Your Password..." required/><br><br>
      <div class="submitbut">
      <input class="submit" name="login" type="submit"  value="Login"/>
      </div>
    </form>
    <p style="text-align: center;font-size: 20px;"><a href="index.php">Don't have an account?</a></p>
  </div>
</div>

		
	<div id="main-wrapper">
		
	
		
		<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from users WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				// valid
				$_SESSION['username']= $username;
				header('location:homepage.php');
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>
		
	</div>
</body>
</html>