<?php
include("includes/dbconnect.php");
if(isset($_GET['delete_order'])){
    
    $delete_id=$_GET['delete_order'];
    
   $delete_product="delete from cart where ipaddress_add='$pro_ip' ";
    
    
    $run_delete=mysqli_query($con, $delete_product);
    if($run_delete){
        echo "<script>alert('product is Deleted')</script>";
     
        echo "<script>window.open('index.php?all_product','_self')</script>";
        
}}?>

