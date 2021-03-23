<?php
include'header.php';
?>
<div class="inv1">
	<form method="post">
	<div class="form-group">	
		<Select  name="type" class="form-control">
			<option value="Direct">Direct</option>
			<option value="Indirect">Indirect</option>
		</Select>
	</div>
		<div class="form-group">
		<input type=""name="name"placeholder="name"class="form-control"/>
		</div>
		<div class="form-group">
		<textarea name="description"placeholder="Description" class="form-control">
		</textarea>
		</div>
		<div class="form-group">
		<input type=""name="deskno"placeholder="Desk Number"class="form-control"/>
		</div>
		<div class="form-group">
		<input type=""name="invoice_num"class="form-control" placeholder="Invoice Number"/>
		</div>
		<div class="form-group">
		<input type="date"name="dt"class="form-control"/>
		</div>
		<div class="form-group">
		<input type="submit"name="btn"value="save" class="from-control btn btn-primary"/>
	</div>	
	</form>
</div>
<?php
if(isset($_POST['btn']))
{
    $type=$_POST['type'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $deskno=$_POST['deskno'];
    $invoice_num=$_POST['invoice_num'];
    $date=$_POST['dt'];
    $conn=mysqli_connect("localhost","root","12345","inventory");
    $q=mysqli_query($conn,"insert into enquiry(type,name,description,deskno,invoice_num,date)values('$type','$name','$description','$deskno','$invoice_num','$date')");
    if(mysqli_affected_rows($conn)>0)
    {
    	?>
    	<script>
    		alert("Saved..");
    	</script>
    	<?php
    	$mysqli -> close();
    }
    else
    {
    	echo"sorry not inserted";
    }
}

?>

</body>
</html>