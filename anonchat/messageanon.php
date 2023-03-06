<?php
require 'dbconfig/config.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$uid = $_GET['uid'] ;
$result = mysqli_query($con,"SELECT * FROM users WHERE id='$uid'");
$row = mysqli_fetch_array($result);
$username = $row['username'];
if (empty($username)) {
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>

	<br>
	<br>
	<br>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Jo - Chat AI</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>

<style>
body 
{
  background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-smart-robot-arm-advertising-background-backgroundrobotblue-backgrounddark-backgroundlightlight-image_68405.jpg' );
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
   <body>
      <div class="container">
         <div class="row justify-content-md-center mb-8">
            <div class="col-md-8">
		
               <!--start code-->
               <div class="card">
                  <div class="card-body messages-box">
					 <ul class="list-unstyled messages-list">

								<li class="messages-me clearfix start_chat">
								   send message to, <?php echo $username ?>
								</li>
								
                     </ul>
                  </div>
                  <div class="card-header">
                    <form class="input-group" action="messageanon.php?uid=<?php echo $uid ?>" method="post">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." required />

					   <span class="input-group-append">
					   <input type="submit" class="btn btn-primary" value="Send" name="send">
					   </span>
					</form> 
                  </div>
               </div>
               <!--end code--> 
            </div>
         </div>
      </div>
      <?php
			if(isset($_POST['send']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

			#	$fullname =$_POST['fullname'];
				$message = $_POST['messages'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

						$query= "insert into message values('','$message','$uid')";
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
		?>
      <script type="text/javascript">
		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+txt+'</p></div></li>';





			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:'txt='+txt,
					success:function(result){



						var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li><a href="invalidans.php" id="invalid_btn"><i>Invalid Answer ?</i></a>';
						
						jQuery('.messages-list').append(html);
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
		 }
      </script>
   </body>
</html>