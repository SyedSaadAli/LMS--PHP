<?php

 include('security.php');
 include('CheckLogin.php');
 include('includes/header.php'); 
 include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- Datatables Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="n-0 font-weight-bold text-primary">Edit Images


</h6> </div>
<div class="card-body">

<?php
if(isset($_POST['Product_ID'])){
$_SESSION['Product_ID'] = $_POST['Product_ID'];
}
$Product_ID = $_SESSION['Product_ID'];
// if(isset($_POST['Image_ID'])){
// $_SESSION['Image_ID'] = $_POST['Image_ID'];
// }
// $Image_ID = $_SESSION['Image_ID'];

 ?>
     <div class="table-responsive">

    <?php
                $query = "SELECT * FROM image WHERE Prd_ID='$Product_ID'";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> Images </th>
                            <th> Edit </th>
                            <th> Change </th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <tr>
                                <td><img style="height: 80px ; width: 100px ;" src=<?php echo $row['Image'];?>></td>

                                <td> <input type="file" name="edit_image" class="form-control"></td>
                                <td>
                            
                                <input type="hidden" name="Image" value="<?php echo $row['Image']; ?>">
                                <input type="hidden" name="Prd_ID" value="<?php echo $row['Prd_ID']; ?>">
                                <button type="submit" name="image_edit_btn" class="btn btn-success"> Update</button>
                           
                        </td>

                               
                            </tr>
                             </form>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
<?php 
// }
?>
        </div>
</div>
</div>
</div>
<!-- /.container-fluid -->

<?php 
include('includes/scripts.php'); 
include('includes/footer.php'); 
?>