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
<h6 class="n-0 font-weight-bold text-primary">Customer Records


</h6> </div>
<div class="card-body">


     <div class="table-responsive">

    <?php
                $query = "SELECT * FROM customer";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Name </th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Password</th>

                            
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
                                <td><?php echo $row['C_Name']; ?></td>
                                <td><?php echo $row['C_Email']; ?></td>
                                <td><?php echo $row['C_Phone']; ?></td>
                                <td><?php echo $row['C_Address']; ?></td>
                                <td><?php echo $row['C_Password']; ?></td>

                               
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