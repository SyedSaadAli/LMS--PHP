<?php

 include('security.php');
 include('CheckLogin.php');
 include('includes/header.php'); 
 include('includes/navbar.php'); 
?>
<style> 
    .misearchform{
        padding: 20px 30px;
        width: 600px;
    }
    .mibtn{
        padding: 5px 20px;
        background-color:#ffb03b;
        color: white;
    }
    .micat{
        padding: 5px 20px;
     
    }
    .mibtn:hover{
        transition: 0.3s;
        background-color: #5f5950;
    }
    .misearch{
        padding: 5px 20px;
        border:2px solid #ffb03b;
    }
    .micat option{
        background-color: none !important;
        
    }
    </style>
<div class="container-fluid">

<!-- Datatables Example -->
<div class="card shadow mb-4">

        <!--Search Bar Code Start-->
       
<!--     
 <form action="Orders.php" method="POST" class="misearchform">
        <input type="text" name="search" placeholder="Enter to Search" class="misearch">
        <input type="submit" name="Search_btn" value="Search" class="mibtn">
        
    </form> -->



        <!--Search Bar Code Ends-->

<div class="card-header py-3">
<h6 class="n-0 font-weight-bold text-primary">Customer Orders
</h6> </div>
<div class="card-body">
<?php  
                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
    echo '<h2 class="bg-primary"> '.$_SESSION['success'].' </h2>';# text-white
    unset($_SESSION['success']);
}
if(isset($_SESSION['status']) && $_SESSION['status'] != '' )
{
      echo '<h2 class="big-danger"> '.$_SESSION['status'].' </h2>';# text-white
      unset($_SESSION['status']);
  }
  ?>

     <div class="table-responsive">

    <?php
                $query = "SELECT * FROM ordernow";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order ID </th>
                            <th>Customer ID </th>
                            <th>Rider Status</th>
                            <th>service Status</th>
                            <th>Total</th>
 
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                         

                        // if(mysqli_num_rows($query_run) > 0)        
                        // {
                        //     while($row = mysqli_fetch_assoc($query_run))
                        //     {
                        //         $x=$row['Order_ID'];
                        //         if(!isset($GLOBALS[$x]) ){
                        //           $GLOBALS[$x]=$x;
                        ?>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>InProcess</td>
                                <td>InProcess</td>
                                <td>2</td>
                                
                          

                               
                            </tr>
                        <?php
                    //         } 
                    //     }
                    // }
                    //     else {
                    //         echo "No Record Found";
                    //     }
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