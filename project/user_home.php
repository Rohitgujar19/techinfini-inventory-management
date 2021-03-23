<?php
session_start();
if($_SESSION['email']==null)
{
      header("location:index.php");
}
include'header.php';
include 'connection.php';
if(isset($_GET['s']))
{
      ?>
      <script>
      alert("well come");
</script>
<?php
}
?>
<?php
if(isset($_GET['success']))
{
      ?>
      <script>
      alert("update successfully");
</script>
<?php
}

$email=$_SESSION['email'];

            $sel=mysqli_query($conn,"select * from user where email='$email'");
            while($x=mysqli_fetch_array($sel))
            {
?>
<section>
                  <div style="margin-top:100px;margin-left:830px;height:30px;width:10px">
                  <img src="<?php echo $x[6]?>">
      </div>
      <div class="inv2">
      
      <div class="col-md-6">
            <div>
                  <h3> First Name:</h3>
            </div>
            <div>
                  <h3>Last Name:</h3>
            </div>
            <div>
                  <h3>DOB</h3>
            </div>
            <div>
            <h3>Email:</h3>
      </div>
      <div>
            <h3>Age:</h3>
      </div>
      </div>
      <div class="col-md-6">
            
         
            <div>
                  <h3><?php echo $x[1]?></h3>
            </div>
            <div>
                  <h3><?php echo $x[2]?></h3>
            </div>
            <div>
                  <h3><?php echo $x[3]?></h3>
            </div>
            <div>
                  <h3><?php echo $x[4]?></h3>
            </div>
            <div>
                  <h3>
                  <?php
                  $d=date("Y/m/d");
                  echo$d-$x[3];
                  ?>
            </h3>
      </div>
            
            <div>
                  <a class="btn btn-danger" href="update_user.php?q=<?php echo$x[0]?>">update Profile</a>
            </div>
            </div>
            </div>
             
  </div>
</div>
</section>

      
            <?php
      }
      ?>