<?php
include("includes/dbconnect.php");
if(isset($_GET['delete_Category'])){
    
    $delete_id=$_GET['delete_Category'];
    
   $delete_Category="delete from categories where Categories_id='$delete_id' ";

    $run_delete=mysqli_query($con, $delete_Category);
    if($run_delete){
        echo "<script>alert('product is Updated')</script>";
     
        echo "<script>window.open('index.php?View_Category','_self')</script>";
        
    }  
}
?>

