<?php
include('security.php');
include('CheckLogin.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<!-- Datatables Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="n-0 font-weight-bold text-primary">Add Staff</h6>

	</div>
	<div class="card-body">


			<form action="code.php" method="POST">


				<div class="form-group">
					<label>Name</label>
					<input type="text" name="S_Name"  value="" class="form-control" placeholder="Enter Employee Name">

				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="S_Email"  value="" class="form-control" placeholder="Enter Email Address">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="number" name="S_Phone"  value="" class="form-control " placeholder="Enter Phone Number">

				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="S_Address" value="" class="form-control" placeholder="Enter Address">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="S_Password" value="" class="form-control" placeholder="Enter Password">
				</div>
			

<br>

			<center style="display: flex; flex-direction: row; align-items: center; justify-content: center; " class="cntr_btns"><a style="margin-bottom: 10px  ;" href="Staff.php" class="btn btn-danger"> CANCEL </a>
				<div style="margin:0 1rem; ">&nbsp;</div>
				<button type="submit" name="add_staff_btn" class="btn btn-primary"> Add </button>
</center>	
			</form>

		

		

	</div>
</div>
</div>

<!-- /.container-fluid -->




<?php 
include('includes/scripts.php'); 
include('includes/footer.php'); 
?>