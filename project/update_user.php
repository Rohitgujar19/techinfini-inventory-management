<?php
session_start();
if($_SESSION['email']==null)
{
	header("location:index.php");
}
$id=$_REQUEST['q'];
include'header.php';
include 'connection.php';
$sel=mysqli_query($conn,"select * from user where id='$id'");
      	while($x=mysqli_fetch_array($sel))
      	{
      		?>
      		<section>


	<div class="inv2">
      <div class="col-md-6">
      	<form method="POST"action="update_user_c.php"enctype="multipart/form-data">

      		<div class="form-group">
      			<input type="hidden"name="id" class="form-control" value="<?php echo $x[0]?>"/>
      		</div>
      		<div class="form-group">
      			<input type="text"name="first_name" class="form-control"value="<?php echo $x[1]?>">
      		</div>
      		<div class="form-group">
      			<input type="text"name="last_name"placeholder="last Name"class="form-control" value="<?php echo $x[2]?>">
      		</div>
      	  <div class="form-group">
      	  	<label>DOB</label>
      	  	<input type="date"name="DOB"value="<?php echo $x[3]?>"/>
      	  </div>
      	  <div class="form-group">
      			<input type="file" name="f">
      		</div>
      	</div>
      	<div class="col-md-6">
      	  <div class="form-group">
      			<input type="text"placeholder="Email"name="email" class="form-control"value="<?php echo $x[4]?>"/>
      		</div>
      	  <div class="form-group">
      			<input type="password"name="password"placeholder="password"class="form-control"value="<?php echo $x[5]?>">
      		</div>
      		<div class="form-group">
      			<input type="password"name="confirm_password"placeholder="Confirm password"class="form-control"value="<?php echo $x[5]?>">
      		</div>
      	</div>
      		<div class="form-group">
      			<input type="submit" name="btn"value="update"class="form-control btn btn-primary"/>
      		</div>
      	</form>
      </div>
  </div>
  <?php
}
?>