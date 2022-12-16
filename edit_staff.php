<?php
 include('security.php');
 include('CheckLogin.php');
 include('includes/header.php'); 
 include('includes/navbar.php'); 
?>


<!-- Datatables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="n-0 font-weight-bold text-primary">EDIT EMPLOYEE RECORD</h6>

</div>
<div class="card-body">
<?php 
if(isset($_POST['staff_edit_btn'])){
	$Staff_ID = $_POST['Staff_ID'];

	$query = "SELECT * FROM staff WHERE Staff_ID='$Staff_ID' ";
            $query_run = mysqli_query($connection, $query);

			foreach($query_run as $row){

?>

 <form action="code.php" method="POST" >
 <input type="hidden" name="staff_edit_id" value="<?php echo $_POST['Staff_ID'] ?>">

                           
            
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="E_S_Name"  value="<?php echo $row['S_Name']; ?>" class="form-control" placeholder="Enter Employee Name">

				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="E_S_Email"  value="<?php echo $row['S_Email']; ?>" class="form-control" placeholder="Enter Email Address">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="number" name="E_S_Phone"  value="<?php echo $row['S_Phone']; ?>" class="form-control " placeholder="Enter Phone Number">

				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="E_S_Address" value="<?php echo $row['S_Address']; ?>" class="form-control" placeholder="Enter Address">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="E_S_Password" value="<?php echo $row['S_Password']; ?>" class="form-control" placeholder="Enter Password">
				</div>

			
			
			
		  <center style="display: flex; flex-direction: row; align-items: center; justify-content: center; " class="cntr_btns"><a style="margin-bottom: 10px  ;" href="Staff.php" class="btn btn-danger"> CANCEL </a>
                <div style="margin:0 1rem; ">&nbsp;</div>
             <button type="submit" name="staff_updatebtn" class="btn btn-primary"> Update </button>
             </center>  

                        </form>

			<?php 
			}
			 }
			
			?>


      </div>
</div>
</div>

<!-- /.container-fluid -->




<?php 
include('includes/scripts.php'); 
include('includes/footer.php'); 
?>