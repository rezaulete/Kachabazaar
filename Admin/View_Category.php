<!DOCTYPE html>
<html>
<head>
  <title>Add product</title>
  <link type="text/css" rel="stylesheet" href="styles/style.css">
<!--
   <?php  $con=mysqli_connect("localhost","root","","ecommerce"); ?>   
-->
    <?php include("includes/dbconnect.php"); ?> 
    
</head>
<body>
    <table>
    <tr align="center">
        <td colspan="6"><h4>View All Product</h4></td>
    </tr>
    <tr align="center">
    <th>SL </th>    
    <th>Category Id </th>    
    <th>Category </th>        
    <th>Edit </th>    
    <th>Delete </th>    
    </tr>
    
 <?php 
      $get_Category="SELECT * FROM categories";
    $run_category=mysqli_query($con,$get_Category);
   $i=0;
while($row_Category=mysqli_fetch_array($run_category)){ 
    
    $Category_id=$row_Category['Categories_id']; 
    $Category_tittle=$row_Category['Categories_tittle']; 
 
   $i++;
  
?>
    <tr>
    <td><?php echo  $i; ?> </td>

    <td><?php echo  $Category_tittle; ?> </td>
    
        
        <td><a href="index.php?Edit_Category=<?php echo $Category_id ?>"> Edit Category </a> </td>
        <td><a href="delete_Category.php?delete_Category=<?php echo $Category_id ?>"> Delete Category </a> </td>
    </tr>  
    <?php } ?>
    
 
    </table>

</body>

</html>
