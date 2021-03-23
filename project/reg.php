<?php
if($_REQUEST['password']!=$_REQUEST['confirm_password'])
{
	?>
	<script>
		alert("Not Match Password and Confirm Password");
	</script>
	<?php
}
else
{
if(isset($_POST['reg']))
{
$name = $_FILES['f']['name'];    //it return name of file
$size = $_FILES['f']['size'];    //it return size file
$type = $_FILES['f']['type']; 
   // //it return type file
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$DOB=$_POST['DOB'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$image=$name;
include'connection.php';
if($image==null)
{
	$image="d";
	$q=mysqli_query($conn,"insert into user(first_name,last_name,DOB,email,password,image)values('$first_name','$last_name','$DOB','$email','$password','$image')");
 if(mysqli_affected_rows($conn)>0)
 {
     session_start();
     $_SESSION['email']=$email;
 	
 	header("location:user_home.php?s=1");
 }
}
//echo$DOB

//$data = $_REQUEST['txt1'];


else
{
if(move_uploaded_file($_FILES['f']['tmp_name'],"/var/www/html/project/".$name))
{
 
 $q=mysqli_query($conn,"insert into user(first_name,last_name,DOB,email,password,image)values('$first_name','$last_name','$DOB','$email','$password','$image')");
 if(mysqli_affected_rows($conn)>0)
 {
     session_start();
     $_SESSION['email']=$email;
 	
 	header("location:user_home.php?s=1");
 }
}
}
}
}



?>