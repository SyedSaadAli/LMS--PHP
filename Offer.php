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

<div class="card-header py-3">
<h6 class="n-0 font-weight-bold text-primary">Offer Records


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
                $query = "SELECT * FROM offer";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Promo Code </th>
                            <th>Discount</th>
                            <th>Date Time</th>
                           

                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                               
                        ?>
                            <tr>
                                <td><?php echo $row['Offer_Code']; ?></td>
                                <td><?php echo $row['Discount']; ?></td>
                                <td><?php echo $row['Date_Time']; ?></td>
                            </tr>
                        <?php
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