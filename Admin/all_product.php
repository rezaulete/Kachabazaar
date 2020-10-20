<div id="Product_place">
                <h3>Update your cart or checkout</h3>
                <table align="center" width="90%">
                
                    <tr>
                    <td>Serial No.</td>
                    <td>Product Tittle</td>
                    <td>Image</td>
                    <td>Price</td>
                    <td>Edit</td>
                    <td>Delete</td>
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
				</div>
                     