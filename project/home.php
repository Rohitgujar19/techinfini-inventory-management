<?php
session_start();
if($_SESSION['email']==null)
{
	header("location:index.php");
}
$email=$_SESSION['email'];
include 'header.php';
include'connection.php';
?>
<script>
	function check_delete()
	{
		return confirm("are you sure ?");
	}
	</script>
<div>
		<table class="table table-striped table-bordered">
				<tr>
					<th>type</th>
					<th>Name</th>
					<th>Description</th>
					<th>Desk No.</th>
					<th>Invoice no</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Action</th>

				</tr>
				<?php
				$sel=mysqli_query($conn,"select * from enquiry");
				while($x=mysqli_fetch_array($sel))
				{
					?>
					<tr>
						<td><?php echo $x[1];?></td>
						<td><?php echo $x[2];?></td>
						<td><?php echo $x[3];?></td>
						<td><?php echo $x[4];?></td>
						<td><?php echo $x[5];?></td>
						<td><?php echo $x[6];?></td>
						<td><a href="update.php?q=<?php echo $x[0]?>" class="btn btn-warning">Edit</a>
						</td>
						<td><a href="delete.php?q=<?php echo$x[0]?>"class="btn btn-danger"onclick="return check_delete()">Delete</a></td>
					</tr>
					<?php

				}
				?>
		</table>
	</div>
</body>
</html>