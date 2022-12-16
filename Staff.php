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
<h6 class="n-0 font-weight-bold text-primary">Staff Records


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
                $query = "SELECT * FROM staff";
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
                            <th>EDIT</th>
                            <th>DELETE</th>

                            
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
                                <td><?php echo $row['S_Name']; ?></td>
                                <td><?php echo $row['S_Email']; ?></td>
                                <td><?php echo $row['S_Phone']; ?></td>
                                <td><?php echo $row['S_Address']; ?></td>
                                <td><?php echo $row['S_Password']; ?></td>
                                <td>
                            <form action="edit_staff.php" method="post">
                                <input type="hidden" name="Staff_ID" value="<?php echo $row['Staff_ID']; ?>">
                                <button type="submit" name="staff_edit_btn" class="btn btn-success" onclick="javascript: return confirm('Are you sure you want to EDIT this employee  ?')"> EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="s_delete_id" value="<?php echo $row['Staff_ID']; ?>">
                                <button type="submit" name="s_delete_btn" class="btn btn-danger" onclick="javascript: return confirm('Are you sure you want to DELETE this employee  ?')"> DELETE</button>
                            </form>
                        </td>
                               
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