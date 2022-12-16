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
            <form action="AddProducts.php" method="post">
                <h6 class="n-0 font-weight-bold text-primary">
<center>
                    <button  type="submit" name="add_product" class="btn btn-primary" data-toggle="modal" >
                       Add Product 
                   </button>
                 </center> 
               </form>

           </h6> </div>
       </div>
   </div>



   <div class="container-fluid">

    <!-- Datatables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="n-0 font-weight-bold text-primary"> All Products 


            </h6> </div>
            <div class="card-body">

                <?php  
                if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                {
	echo '<h2 class="bg-primary" style="color:#f6c23e; text-align:center;"> '.$_SESSION['success'].' </h2>';# text-white
	unset($_SESSION['success']);
}
if(isset($_SESSION['status']) && $_SESSION['status'] != '' )
{
      echo '<h2 class="big-danger" style="color:#5f5950; text-align:center;"> '.$_SESSION['status'].' </h2>';# text-white
      unset($_SESSION['status']);
  }
  ?>

  <div class="table-responsive">

    <?php
    $query = "SELECT * FROM product";
    $query_run = mysqli_query($connection, $query);
    ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
         <!--        <th> ID </th> -->
                 <th>Name </th>
                <th> Product </th>
                <th>Descriptions</th>
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>Reviews</th>
                <th>Items Sold</th>
                <th>EDIT</th>
                <th>EDIT IMAGE</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
               
               if(isset($_POST['Search_btn'])){
                $search = $_POST['Search_Item'];
                $Search_Item = "%".$search."%";


    $query2 = "SELECT * FROM product WHERE Name LIKE '".$Search_Item."' ";
    $query_run2 = mysqli_query($connection, $query2);

            if(mysqli_num_rows($query_run2) > 0)        
            {
                while($row2 = mysqli_fetch_assoc($query_run2))
                {   
                    $x=$row2['Product_ID'];
                    $GLOBALS[$x]=$x;
                    $id = $row2['Product_ID'];
                    $query3 = "SELECT Image FROM image WHERE Prd_ID = '$id'";
                    $query_run3 = mysqli_query($connection, $query3);
                    $row3 = mysqli_fetch_assoc($query_run3);
                    ?>
                    <tr>
                       <!--  <td><?php  //echo $row2['Product_ID']; ?></td> -->
                        
                        <td><?php  echo $row2['Name']; ?></td>
                        <td><img style="height: 80px ; width: 100px ;" src=<?php echo $row3['Image'];?>></td>
                        <td><?php  echo $row2['Description']; ?></td>
                        <td><?php  echo $row2['CP']; ?></td>
                        <td><?php  echo $row2['SP']; ?></td>
                        <td><?php  echo $row2['Reviews']; ?></td>
                        <td><?php  echo $row2['ItemsSold']; ?></td>
                        
                        <td>
                            <form action="edit_product.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row2['Product_ID']; ?>">
                                <button type="submit" name="product_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="Images.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row2['Product_ID']; ?>">
                                <button type="submit" name="image_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="p_delete_id" value="<?php echo $row2['Product_ID']; ?>">
                                <button type="submit" name="p_delete_btn" class="btn btn-danger" onclick="javascript: return confirm('Are you sure you want to DELETE this product  ?')"> DELETE</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                } 
            }
            
            ?>
             <?php

              $query4 = "SELECT * FROM product WHERE Description LIKE '".$Search_Item."' ";
              $query_run4 = mysqli_query($connection, $query4);

            if(mysqli_num_rows($query_run4) > 0)        
            {
                while($row4 = mysqli_fetch_assoc($query_run4))
                {
                    $x=$row4['Product_ID'];
                    if(!isset($GLOBALS[$x]) ){
                      $GLOBALS[$x]=$x;
                    $id = $row4['Product_ID'];
                    $query5 = "SELECT Image FROM image WHERE Prd_ID = '$id'";
                    $query_run5 = mysqli_query($connection, $query5);
                    $row5 = mysqli_fetch_assoc($query_run5);
                    ?>
                    <tr>
                        <!-- <td><?php  //echo $row4['Product_ID']; ?></td> -->
                        
                        <td><?php  echo $row4['Name']; ?></td>
                        <td><img style="height: 80px ; width: 100px ;" src=<?php echo $row5['Image'];?>></td>
                        <td><?php  echo $row4['Description']; ?></td>
                        <td><?php  echo $row4['CP']; ?></td>
                        <td><?php  echo $row4['SP']; ?></td>
                        <td><?php  echo $row4['Reviews']; ?></td>
                        <td><?php  echo $row4['ItemsSold']; ?></td>
                        
                        <td>
                            <form action="edit_product.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row4['Product_ID']; ?>">
                                <button type="submit" name="product_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="Images.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row4['Product_ID']; ?>">
                                <input type="hidden" name="Image_ID" value="<?php echo $row4['Image_ID']; ?>">
                                <button type="submit" name="image_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="p_delete_id" value="<?php echo $row4['Product_ID']; ?>">
                                <button type="submit" name="p_delete_btn" class="btn btn-danger"> DELETE</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                } 
            }
        }
            

        }

            ?>
             <?php
            if(mysqli_num_rows($query_run) > 0)        
            {
                while($row = mysqli_fetch_assoc($query_run))
                {
                     $x=$row['Product_ID'];
                    if(!isset($GLOBALS[$x]) ){
                      $GLOBALS[$x]=$x;
                    $id = $row['Product_ID'];
                    $query6 = "SELECT Image FROM image WHERE Prd_ID = '$id'";
    $query_run6 = mysqli_query($connection, $query6);
    $row6 = mysqli_fetch_assoc($query_run6);
                    ?>
                    <tr>
                       <!--  <td><?php  //echo $row['Product_ID']; ?></td> -->
                        
                        <td><?php  echo $row['Name']; ?></td>
                        <td><img style="height: 80px ; width: 100px ;" src=<?php echo $row6['Image'];?>></td>
                        <td><?php  echo $row['Description']; ?></td>
                        <td><?php  echo $row['CP']; ?></td>
                        <td><?php  echo $row['SP']; ?></td>
                        <td><?php  echo $row['Reviews']; ?></td>
                        <td><?php  echo $row['ItemsSold']; ?></td>
                        
                        <td>
                            <form action="edit_product.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID']; ?>">
                                <button type="submit" name="product_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="Images.php" method="post">
                                <input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID']; ?>">
                                <input type="hidden" name="Image_ID" value="<?php echo $row['Image_ID']; ?>">
                                <button type="submit" name="image_edit_btn" class="btn btn-success"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="p_delete_id" value="<?php echo $row['Product_ID']; ?>">
                                <button type="submit" name="p_delete_btn" class="btn btn-danger"> DELETE</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                } 
            }
        }
            else {
                echo "No Record Found";
            }
            ?>
        </tbody>
    </table>

</div>
</div>
</div>
</div>
<!-- /.container-fluid -->




<?php 
include('includes/scripts.php'); 
include('includes/footer.php'); 
?>