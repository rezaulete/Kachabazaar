<?php
include("includes/dbconnect.php");
if(isset($_GET['delete_contact'])){
    
    $delete_id=$_GET['delete_contact'];
    
   $delete_product="delete from contact where contact_id='$delete_id'";
    
    
    $run_delete=mysqli_query($con, $delete_product);
    if($run_delete){
        echo "<script>alert('contuct is Deleted')</script>";
     
        echo "<script>window.open('contact.php','_self')</script>";
        
    }  
}

?>

