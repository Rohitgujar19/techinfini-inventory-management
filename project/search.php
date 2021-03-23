<?php
session_start();
if($_SESSION['email']==null)
{
	header("location:index.php");
}
if(isset($_GET['s']))
{
      ?>
      <script>
      alert("update successfully");
</script>
<?php
}
include 'header.php';

include'connection.php';

?>
<script>
	function check()
	{
		return confirm("are you sure ?");
	}
	</script>
<div class="search">
	<div>
	<form method="POST"action="search.php">
		<input type="text"name="name"placeholder="Enter Name For Search"/>
		<input type=""name="desk"placeholder="Enter Desk no For Search"/>
		<label>inventory type</label>
        <select name="type">
        	<option value="Direct">Direct</option>
        	<option value="Indirect">Indirect</option>
        </select>
        <label>Sort</label>
        <select name="sort">
        	<option value="name">Name</option>
        	<option value="deskno">deskno</option>
        </select>
         <label>Sort type</label>
        <select name="sort_type">
        	<option value="asc">assending</option>
        	<option value="desc">descending</option>
        </select>
        <label>Sorting warranty</label>
        <input type="date"name="start_date"placeholder="start date"/>
        <input type="date"name="end_date"placeholder="end date"/>
        <input type="submit"name="search"value="search"class="btn btn-danger"/>
	</form>
</div>
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
				if(isset($_POST['search'])==null)
				{
				$sel=mysqli_query($conn,"select * from enquiry ORDER BY date");
				
			}
			if(isset($_POST['search']))
			{
				$name=$_POST['name'];
				$deskno=$_POST['desk'];
				$type=$_POST['type'];
				$sort=$_POST['sort'];
				$sort_type=$_POST['sort_type'];
				$start_date=$_POST['start_date'];
				$end_date=$_POST['end_date'];
				if($name!=null && $deskno!=null && $type!=null && $start_date!=null && $end_date!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where name='$name'and deskno='$deskno'and type='$type'and date between '$start_date'and '$end_date'");
				}
				else if($type!=null &&$deskno!=null )
				{
					$sel=mysqli_query($conn,"select * from enquiry where deskno='$deskno'and type='$type'");
					$type=null;
					$deskno=null;
				}
				
				else if($sort=='deskno'&& $sort_type=='desc'&&$name==null)
				{
					$sel=mysqli_query($conn,"select * from enquiry ORDER BY deskno DESC");
					$type=null;
					$deskno=null;
				}
				else if($sort=='deskno'&& $sort_type=='asc'&&$name==null&&$type==null&&$start_date==null)
				{
					$sel=mysqli_query($conn,"select * from enquiry ORDER BY deskno ");
					$type=null;
					$deskno=null;
				}
				else if($sort=='name'&& $sort_type=='asc'&&$type==null &&$start_date==null &&$end_date==null)
				{
					$sel=mysqli_query($conn,"select * from enquiry ORDER BY name ");
					$type=null;
					$deskno=null;
				}
				else if($sort=='name'&& $sort_type=='desc')
				{
					$sel=mysqli_query($conn,"select * from enquiry ORDER BY name DESC");
					$type=null;
					$deskno=null;
				}

				else if($type!=null &&$deskno!=null && $start_date!=null && $end_date!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where deskno='$deskno'and type='$type'and date between '$start_date'and '$end_date'");
				}
				else if($name!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where (name LIKE'%$name%'OR deskno='$name')");
					$name=null;
				}
				else if($deskno!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where deskno='$deskno'");
					$deskno=null;
				}
				
				else if($start_date!=null && $end_date!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where date BETWEEN '$start_date' AND '$end_date' ");
				}	
				else if($type!=null)
				{
					$sel=mysqli_query($conn,"select * from enquiry where type='$type'");
					$type=null;
				}

			}
			/*
			else if(isset($_POST['name'])!=null)
			{
				$name=$_POST['name'];
				$sel=mysqli_query($conn,"select * from enquiry where name LIKE '%$name%'");
			}
			else if(isset($_POST['desk']))
			{
				$deskno=$_POST['desk'];
				$sel=mysqli_query($conn,"select * from enquiry where deskno='$deskno'");
			}
	       
			*/
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
						<td><a href="delete.php?q=<?php echo$x[0]?>"class="btn btn-danger"onclick="return check()">Delete</a></td>
					</tr>
					</tr>
					<?php

				}

				?>
		</table>
	</div>
</div>