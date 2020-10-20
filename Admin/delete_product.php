<?php
include("includes/dbconnect.php");
if(isset($_GET['delete_product'])){
    
    $delete_id=$_GET['delete_product'];
    
   $delete_product="delete from product where Product_id='$delete_id' ";
    
    
    $run_delete=mysqli_query($con, $delete_product);
    if($run_delete){
        echo "<script>alert('product is Deleted')</script>";
     
        echo "<script>window.open('index.php?all_product','_self')</script>";
        
    }  
}

?>

