			
			<div id="Product_place">
                <h3>Your Customers</h3>
                <table align="center" width="90%">
                
                    <tr>
                    <td>SN</td>
                    <td>Customer name</td>
                    <td>Image</td>
                    <td>Email</td>
                    <td>Contact</td>
                    <td>Address</td>
                    </tr>
                    <?php 
         $get_customer="SELECT * FROM customer";
    $run_customer=mysqli_query($con,$get_customer);
   $i=0;
while($row_customer=mysqli_fetch_array($run_customer)){ 
    
    $Customer_id=$row_customer['customer_id']; 
    $customer_name=$row_customer['customer_name']; 
    $customer_image=$row_customer['customer_image']; 

    $customer_email=$row_customer['customer_email']; 
    $customer_contact=$row_customer['customer_contact']; 
    $customer_address=$row_customer['customer_address']; 
    $customer_city=$row_customer['customer_city']; 
   $i++;
  
?>
    <tr>
    <td><?php echo  $i; ?> </td>
    <td><?php echo  $customer_name; ?> </td>
    
    <td>
<!--        <?php echo  $Product_image; ?> -->
        <img src="../customer/customer_image/<?php echo $customer_image; ?>" width="65px" height="50px">
        </td>
    
        <td><?php echo  $customer_email; ?></td>
        <td><?php echo  $customer_contact; ?></td>
        <td><?php echo  $customer_address ."," .$customer_city; ?></td>
        
    </tr>  
    <?php } ?>
                    
					</table>
				</div>
                     