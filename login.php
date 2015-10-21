<?php
session_start();
if(!empty($_SESSION['login_user']))
{
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Fantasy Football Tracker Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input id="username" type="text" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input id="password" type="password" class="form-control" placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <input type="submit" class="button button-primary" value="Log In" id="login"/>
					<div id="error"></div> 
		            <hr>		
		        </div>	
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/money.jpg", {speed: 500});
    </script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#login').click(function(){
				var username=$("#username").val();
				var password=$("#password").val();
				var dataString = 'username='+username+'&password='+password;
				if($.trim(username).length>0 && $.trim(password).length>0)
				{
					$.ajax({
						type: "POST",
						url: "includes/ajaxLogin.php",
						data: dataString,
						cache: false,
						beforeSend: function(){ $("#login").val('Connecting...');},
						success: function(data){
						if(data)
						{
							$("body").load("index.php").hide().fadeIn(1500).delay(6000);
							//or
							window.location.href = "index.php";
						}
						else
						{
							//Shake animation effect.
							$("#login").val('Login');
							$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
						}
						}
					});
				}
				return false;
			});
		});
	</script>
  </body>
</html>
