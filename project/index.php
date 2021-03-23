<?php
session_start();
if($_SESSION['email']!=null)
{
	header("location:home.php");
}
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="home1.css">
	</head>
	<body>
		<div style="height:240px;width:330px;margin-left:500px;margin-top:200px;background-color:#C0C0C0;padding:20px">
		<form method="POST">
			<h3>User Login</h3>
			<div class="form-group">
			<input type="text"name="email"placeholder="Enter Email Here"class="form-control"/>
		</div>
			<div class="form-group">
			<input type="password"name="password"placeholder="Password"class="form-control"/>
		</div>
			<div class="form-group">
			<input type="submit"name="login"value="Login" class="from-control btn btn-primary"/>
			<a href="registration.php">Sign Up</a>
			<a href="forgot_password.php"class="btn ">Forgot Password</a>
		</div>
		</form>
	</div>
	<?php
	if(isset($_REQUEST['login']))
	{
		$email=$_REQUEST['email'];
		$pass=$_REQUEST['password'];
		
		$conn=mysqli_connect("localhost","root","12345","inventory");
		$q=mysqli_query($conn,"select * from user where email='$email'and password='$pass'");
		if(mysqli_fetch_row($q)>0)
		{
			$_SESSION['email']=$email;
			header('location:user_home.php?s=1');
		}
		else
		{
			?>
			<script>
				alert("Wrong Email or Password...");
			</script>
			<?php
		}
		
	}
	?>
	</body>
	</html>
