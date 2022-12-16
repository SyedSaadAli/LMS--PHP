<?php
include('security.php');
include('CheckLogin.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<!-- Datatables Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="n-0 font-weight-bold text-primary">Add Offer</h6>

	</div>
	<div class="card-body">


			<form action="code.php" method="POST">

				<div class="form-group">
					<label>Promo Code</label>
					<input type="text" name="O_Code"  value="" class="form-control " placeholder="Enter Promo Code">
				</div>

				<div class="form-group">
					<label>Discount</label>
					<input type="number" name="O_Discount"  value="" class="form-control " placeholder="Enter Discount Percentage">

				</div>
				
<br>

			<center style="display: flex; flex-direction: row; align-items: center; justify-content: center; " class="cntr_btns"><a style="margin-bottom: 10px  ;" href="Offer.php" class="btn btn-danger"> CANCEL </a>
				<div style="margin:0 1rem; ">&nbsp;</div>
				<button type="submit" name="add_offer_btn" class="btn btn-primary"> Add </button>
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