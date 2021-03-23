<?php
$id=$_REQUEST['q'];
include'connection.php';
$del=mysqli_query($conn,"delete from enquiry where id='$id'");
if(mysqli_affected_rows($conn)>0)
{
	?>
	<script>
		alert("Deleted Successfully");
	</script>
	<?php
	header("location:show.php");
}
else
{
	echo"not deleted..";
}
?>