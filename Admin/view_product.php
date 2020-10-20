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
    <th>Tittle </th>    
    <th>Image </th>    
    <th>price </th>    
    <th>Edit </th>    
    <th>Delete </th>    
    </tr>
    

          
         
            <?php 
         $get_product="SELECT * FROM product";
    $run_product=mysqli_query($con,$get_product);
   $i=0;
while($row_product=mysqli_fetch_array($run_product)){ 
    
    $Product_id=$row_product['Product_id']; 
    $Product_tittle=$row_product['Product_tittle']; 
    $Product_image=$row_product['Product_image']; 
    
    
    $Product_price=$row_product['Product_price']; 
   $i++;
  
?>
    <tr>
    <td><?php echo  $i; ?> </td>
    <td><?php echo  $Product_tittle; ?> </td>
    
    <td>
<!--        <?php echo  $Product_image; ?> -->
        <img src="product_images/<?php echo $Product_image; ?>" width="65px" height="50px">
        </td>
    
        <td><?php echo  $Product_price; ?></td>
        <td><a href="index.php?edit_product=<?php echo $Product_id ?>"> edit product </a> </td>
        <td><a href="delete_product.php?delete_product=<?php echo $Product_id ?>"> Delete Product </a> </td>
    </tr>  
    <?php } ?>
    
 
    </table>

</body>

</html>
