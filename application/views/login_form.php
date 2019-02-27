<?php
if (isset($this->session->userdata['logged_in'])) {

header("location:".base_url()."login/user_login_process");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('file/images/ico.png'); ?>">

    <title>Tobeasy SYSTEM</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>file/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>file/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>file/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>file/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"> body
{
    background: url('http://farm3.staticflickr.com/2832/12303719364_c25cecdc28_b.jpg') fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
    color:white;
}
.error_msg{color:red;}
</style>
  </head>

  <body>

    <div class="container">
    	<form class="form-signin"  method="POST" action="<?php echo base_url('login/user_login_process')?>" accept-charset="utf-8">
    	<?php
			if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
			}
			?>
			<?php
			if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
			}
			?>
			<h2>Login Form</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			if (isset($error_message)) {
			echo $error_message;
			}
			echo validation_errors();
			echo "</div>";
			?>
			<label for="name">UserName :</label>
			<input  class="form-control" type="text" name="username" id="name" placeholder="username" required autofocus/>
			<label for="password">Password :</label>
			<input  class="form-control" type="password" name="password" id="password" placeholder="**********" required/><br/>
			<input class="btn btn-lg btn-primary btn-block" type="submit" value=" Login " name="submit"/><br />
			<a href="javascript:void()">SignUp</a>
			
		</form>
    </div> <!-- /container -->

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url()?>file/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>