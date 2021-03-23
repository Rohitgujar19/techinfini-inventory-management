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
if(isset($_POST['btn']))
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
$id=$_POST['id'];
include'connection.php';
//echo$DOB
if($name==null)
{
	$q=mysqli_query($conn,"update user set first_name ='$first_name',last_name='$last_name',DOB='$DOB',email='$email',password='$password'where id='$id'");
 if(mysqli_affected_rows($conn)>0)
 {
 	header("location:user_home.php?success=1");
 }
 else
 {
 	header("location:user_home.php");
 }
}

else
{

//$data = $_REQUEST['txt1'];
if($name!=null)
{
if(move_uploaded_file($_FILES['f']['tmp_name'],"/var/www/html/project/".$name))
{
 
 $q=mysqli_query($conn,"update user set first_name ='$first_name',last_name='$last_name',DOB='$DOB',email='$email',password='$password',image='$image'where id='$id'");
 if(mysqli_affected_rows($conn)>0)
 {
 	header("location:user_home.php?success=1");
 }
}
}
}
}

}



?>