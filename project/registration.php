<?php
session_start();
if($_SESSION['email']!=null)
{
	header("location:home.php");
}
include'header_reg.php';
?>
<section>

	<div class="inv2">
      <div class="col-md-6">
      	<form method="POST"action="reg.php"enctype="multipart/form-data">
      		<div class="form-group">
      			<input type="text"placeholder="first name"name="first_name" class="form-control"/>
      		</div>
      		<div class="form-group">
      			<input type="text"name="last_name"placeholder="last Name"class="form-control">
      		</div>
      	  <div class="form-group">
      	  	<label>DOB</label>
      	  	<input type="date"name="DOB"/>
      	  </div>
      	  <div class="form-group">
      			<input type="file" name="f">
      		</div>
      	</div>
      	<div class="col-md-6">
      	  <div class="form-group">
      			<input type="text"placeholder="Email"name="email" class="form-control"/>
      		</div>
      	  <div class="form-group">
      			<input type="password"name="password"placeholder="password"class="form-control">
      		</div>
      		<div class="form-group">
      			<input type="password"name="confirm_password"placeholder="Confirm password"class="form-control">
      		</div>
      	</div>
      		<div class="form-group">
      			<input type="submit" name="reg"value="Register"class="form-control btn btn-primary"/>
      		</div>
      	</form>
      </div>
  </div>
</section>

      		
