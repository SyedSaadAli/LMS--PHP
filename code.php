<?php 
include('security.php');



// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['prd_updatebtn']))
{
    $id = $_POST['p_edit_id'];
    $edit_Name = $_POST['edit_Name'];
    $edit_Description = $_POST['edit_Description'];
    $edit_CP = $_POST['edit_CP'];
    $edit_SP = $_POST['edit_SP'];
    $edit_Reviews = $_POST['edit_Reviews'];
    $edit_ItemsSold = $_POST['edit_ItemsSold'];

    $query = "UPDATE product SET  Name='$edit_Name' , Description='$edit_Description', CP='$edit_CP', SP='$edit_SP', Reviews='$edit_Reviews', ItemsSold='$edit_ItemsSold' WHERE Product_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Product is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: Products.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Product is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: products.php');  
    }
}


// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['p_delete_btn']))
{
    $id = $_POST['p_delete_id'];

    $query1 = "DELETE FROM image WHERE Prd_ID='$id' ";
    $query_run1 = mysqli_query($connection, $query1);

    $query = "DELETE FROM product WHERE Product_ID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Product is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Products.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Product is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Products.php'); 
    }    
}


// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['add_btn3']))
{

    $add_B_Name = $_POST['add_B_Name'];
    $add_B_Color = $_POST['add_B_Color'];
    $add_B_Quantity = $_POST['add_B_Quantity'];
    $add_B_Prize = $_POST['add_B_Prize'];

    $query = "INSERT INTO best_products (B_Product_Photo,B_Name,B_Color,B_Quantity,B_Prize) VALUES 
    ('$location','$add_B_Name','$add_B_Color','$add_B_Quantity','$add_B_Prize')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['b_status'] = "Your Product Profile is Added";
        $_SESSION['b_status_code'] = "success";
        header('Location: Products.php'); 
    }
    else
    {
        $_SESSION['b_status'] = "Your Product Profile is NOT Added";
        $_SESSION['b_status_code'] = "error";
        header('Location: products.php');  
    }
}



// ----------------------------------------------------------------------------------------------------------


if(isset($_POST['add_staff_btn']))
{

    $S_Name = $_POST['S_Name'];
    $S_Email = $_POST['S_Email'];
    $S_Phone = $_POST['S_Phone'];
    $S_Address = $_POST['S_Address'];
    $S_Password = $_POST['S_Password'];

    $query = "INSERT INTO staff (S_Name,S_Email,S_Phone,S_Address,S_Password) VALUES 
    ('$S_Name','$S_Email','$S_Phone','$S_Address','$S_Password')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['b_status'] = "Staff is Added";
        $_SESSION['b_status_code'] = "success";
        header('Location: Staff.php'); 
    }
    else
    {
        $_SESSION['b_status'] = "Staff is NOT Added";
        $_SESSION['b_status_code'] = "error";
        header('Location: Staff.php');  
    }
}


// ----------------------------------------------------------------------------------------------------------


if(isset($_POST['add_rider_btn']))
{

    $R_Name = $_POST['R_Name'];
    $R_Email = $_POST['R_Email'];
    $R_Phone = $_POST['R_Phone'];
    $R_Address = $_POST['R_Address'];
    $R_Password = $_POST['R_Password'];

    $query = "INSERT INTO rider (R_Name,R_Email,R_Phone,R_Address,R_Password) VALUES 
    ('$R_Name','$R_Email','$R_Phone','$R_Address','$R_Password')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['b_status'] = "Rider is Added";
        $_SESSION['b_status_code'] = "success";
        header('Location: Rider.php'); 
    }
    else
    {
        $_SESSION['b_status'] = "Rider is NOT Added";
        $_SESSION['b_status_code'] = "error";
        header('Location: Rider.php');  
    }
}

// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['staff_updatebtn']))
{
    $staff_edit_id = $_POST['staff_edit_id'];
    $E_S_Name = $_POST['E_S_Name'];
    $E_S_Email = $_POST['E_S_Email'];
    $E_S_Phone = $_POST['E_S_Phone'];
    $E_S_Address = $_POST['E_S_Address'];
    $E_S_Password = $_POST['E_S_Password'];
  

    $query = "UPDATE staff SET  S_Name='$E_S_Name' , S_Email='$E_S_Email', S_Phone='$E_S_Phone', S_Address='$E_S_Address', S_Password='$E_S_Password' WHERE Staff_ID='$staff_edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Employee record is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: Staff.php'); 
    }
    else
    {
        $_SESSION['status'] = "Employee record is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: Staff.php');  
    }
}

// ----------------------------------------------------------------------------------------------------------




if(isset($_POST['rider_updatebtn']))
{
    $rider_edit_id = $_POST['rider_edit_id'];
    $E_R_Name = $_POST['E_R_Name'];
    $E_R_Email = $_POST['E_R_Email'];
    $E_R_Phone = $_POST['E_R_Phone'];
    $E_R_Address = $_POST['E_R_Address'];
    $E_R_Password = $_POST['E_R_Password'];
  

    $query = "UPDATE rider SET  R_Name='$E_R_Name' , R_Email='$E_R_Email', R_Phone='$E_R_Phone', R_Address='$E_R_Address', R_Password='$E_R_Password' WHERE Rider_ID='$rider_edit_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Rider record is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: Rider.php'); 
    }
    else
    {
        $_SESSION['status'] = "Rider record is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: Rider.php');  
    }
}



// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['s_delete_btn']))
{
    $s_delete_id = $_POST['s_delete_id'];

    $query1 = "DELETE FROM staff WHERE Staff_ID='$s_delete_id' ";
    $query_run1 = mysqli_query($connection, $query1);

    if($query_run1)
    {
        $_SESSION['status'] = "Employee is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Staff.php'); 
    }
    else
    {
        $_SESSION['status'] = "Employee is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Staff.php'); 
    }    
}



// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['r_delete_btn']))
{
    $r_delete_id = $_POST['r_delete_id'];

    $query1 = "DELETE FROM rider WHERE Rider_ID='$r_delete_id' ";
    $query_run1 = mysqli_query($connection, $query1);

    if($query_run1)
    {
        $_SESSION['status'] = "Rider is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Rider.php'); 
    }
    else
    {
        $_SESSION['status'] = "Rider is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Rider.php'); 
    }    
}

// ----------------------------------------------------------------------------------------------------------



if(isset($_POST['add_offer_btn']))
{

    date_default_timezone_set("Asia/Karachi");
    $O_Code = $_POST['O_Code'];
    $O_Discount = $_POST['O_Discount'];
    $date = date("Y-m-d h:i:sa");
  
    $query = "INSERT INTO offer (Offer_Code,Discount,Date_Time) VALUES 
    ('$O_Code','$O_Discount','$date')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['b_status'] = "Offer is Added";
        $_SESSION['b_status_code'] = "success";
        header('Location: Offer.php'); 
    }
    else
    {
        $_SESSION['b_status'] = "Offer is NOT Added";
        $_SESSION['b_status_code'] = "error";
        header('Location: Offer.php');  
    }
}



// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------------------------------


?>