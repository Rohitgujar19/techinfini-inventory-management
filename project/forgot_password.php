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
		<div style="height:240px;width:330px;margin-left:500px;margin-top:200px;padding:20px">
		<form method="POST">
			<h3>Change Password</h3>
			<div class="form-group">
			<input type="text"name="email"placeholder="Enter Email Here"class="form-control"/>
		</div>
			<div class="form-group">
			<input type="password"name="password"placeholder=" New Password"class="form-control"/>
		</div>
		<div class="form-group">
			<input type="password"name="confirm_password"placeholder=" confirm_Password"class="form-control"/>
		</div>
			<div class="form-group">
			<input type="submit"name="login"value="Change password" class="from-control btn btn-primary"/>
		</form>
	</div>
	<?php
	if(isset($_REQUEST['login']))
	{
		$email=$_REQUEST['email'];
		$pass=$_REQUEST['password'];
		$confirm_password=$_REQUEST['confirm_password'];
		$conn=mysqli_connect("localhost","root","12345","inventory");
		$q=mysqli_query($conn,"update user set email='$email',password='$pass'where email='$email'");
		if(mysqli_affected_rows($conn)>0)
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
