<?php
include'header.php';
include 'connection.php';
$id=$_REQUEST['q'];
$sel=mysqli_query($conn,"select * from enquiry where id='$id'");
if($x=mysqli_fetch_array($sel))
{

}
?>
<div class="inv1">
	<form method="post">
		<div class="form-group">
	<input type="hidden"name="id"value="<?php echo $x[0]?>"class="form-control">
	</div>
	<div class="form-group">	
		<Select  name="type" class="form-control" value="<?php echo $x[1]?>">
			<option value="Direct">Direct</option>
			<option value="Indirect">Indirect</option>
		</Select>
	</div>
	<div class="form-group">
		<input type=""name="name"placeholder="name"value="<?php echo $x[2]?>"class="form-control"/>
	</div>
	<div class="form-group">
		<input type=""name="description"value="<?php echo $x[3] ?>"class="form-control">
		</textarea>
		</div>
		<div class="form-group">		
		<input type=""name="deskno"placeholder="Desk Number"value="<?php echo $x[4]?>"class="form-control"/>
	</div>
	<div class="form-group">
		<input type=""name="invoice_num"class="form-control" placeholder="Invoice Number"value="<?php echo $x[5]?>"/>
	</div>
		<div class="form-group">
		<input type="date"name="dt"class="form-control"value="<?php echo $x[6]?>"/>
		<div class="form-group">
		<input type="submit"name="btn"value="Update" class="btn btn-primary"/>
	</form>
</div>
<?php
if(isset($_POST['btn']))
{
	$id=$_POST['id'];
	$type=$_POST['type'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$deskno=$_POST['deskno'];
	$invoice_num=$_POST['invoice_num'];
	$date=$_POST['dt'];
	$sel=mysqli_query($conn,"update enquiry set name='$name',type='$type',description='$description',deskno='$deskno',invoice_num='$invoice_num',date='$date'where id='$id'");
	if(mysqli_affected_rows($conn)>0)
	{
		header("location:search.php?s=1");
	}
	else
	{
		echo"not update";
	}
}
?>
</body>
</html>