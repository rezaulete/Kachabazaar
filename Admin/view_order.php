<?php
    $total=0;
    global $con;
    $select_price="select * from cart";
              
    $run_price=mysqli_query($con,$select_price);
    
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
        $pro_ip=$p_price['ipaddress_add'];
        $pro_price="select * from product where Product_id='$pro_id'";
        $run_pro_price=mysqli_query($con,$pro_price);   
        while($pp_price=mysqli_fetch_array($run_pro_price)){
//            $product_price=array($pp_price['Product_price']);
            $prod_price=array($pp_price['Product_price']);
            $each_price=$pp_price['Product_price'];
            $prod_tittle=$pp_price['Product_tittle'];
            $prod_img=$pp_price['Product_image'];
            $values=array_sum($prod_price);
            $total+=$values;
   
                ?> 

<div id="Product_place">
           <table align="center" width="90%">
                
                    <tr>
                    <td>Order No.</td>
                    <td>Product name</td>
                    <td>Price</td>
                    <td>Order name</td>
                    <td>Order address</td>
                    <td>Delete</td>
                    </tr>
 <?php 
         $get_order="SELECT * FROM cart where ipaddress_add='$pro_ip'";
    $run_order=mysqli_query($con,$get_order);
   $i=0;
while($row_order=mysqli_fetch_array($run_order)){ 
    
     
    $get_customers="SELECT * FROM customer where customer_ip='$pro_ip'";
    $run_customers=mysqli_query($con,$get_customers);
    $i=0;
    $row_customers=mysqli_fetch_array($run_customers);
    $customer_name=$row_customers['customer_name'];
    $customer_address=$row_customers['customer_address'];

   $i++;  
?>
    <tr>
    <td><?php echo  $i; ?> </td>
    <td><?php echo  $prod_tittle; ?> </td>
        <td><?php echo  $each_price; ?></td>
        <td><?php echo  $customer_name; ?></td>
        <td><?php echo  $customer_address; ?></td>
        <td><a href="delete_order.php?delete_order=<?php echo $pro_ip ?>"> Delete</a> </td>
    </tr>  
    <?php }}} ?>
                    
					</table>
				</div>
                     