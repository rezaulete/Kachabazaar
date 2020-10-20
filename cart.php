<!DOCTYPE html>
<html>
<head>
  <title>Kaachabazar</title>
  <link type="text/css" rel="stylesheet" href="css/style.css">
<!--	<script src="js/myscripts.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <?php  include("function/Function.php"); 
	session_start();?>
</head>
<body>
  <center>
      <div id="TopPart"> <!-- Site Top Part -->
          <div id="TopLeft">
            <div class="topnavIcon">
              <a  href="index.php"><img src="images/kachalogo.png" alt="Kacha Bazar"></a>
            </div>
          </div>
        
          <div id="TopMiddle">
            <div id="UpperNav">
                <div class="topnav">
             <div class="search-container">
                <form action="index.php">
                  <input type="text" placeholder="Search.." name="user_query">
                  <button type="submit" name="search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
             </div>
           </div>        
          </div>
            <div id="LowerNav">
                <div class="topnavigation">
                      <div class="Pro_dropdown">
                      <button class="dropbtn">Products 
                        <i class="fa fa-caret-down"></i>
                     </button>
                        <div class="Pro_dropdown-content">
                  <?php 
                     getcategories(); 
                   ?>
                       </div> </div> 
            <a href="discounts.php">Discounts</a>
            <a href="contact.php">Contact</a>					
	 <?php if(isset($_SESSION['customer_email'])){
         echo" <div class='Pro_dropdown'>
               <button class='dropbtn'>Account 
               <i class='fa fa-caret-down'></i>
               </button>
               <div class='Pro_dropdown-content'>
               <a href='customer/my_account.php'>My Account</a>
			   <a href='customer/my_account.php'>Edit Account</a>
			   <a href='customer/my_account.php'>Delete Account</a>
			   <a href='customer/my_account.php'>Change Password</a>
        
               </div>                  
               </div> ";  }?> 
               </div>
              </div>
          </div>
          <div id="TopRight">
            <div class="TopSign">
            <div id="TopRightSignup">
     <?php  if(!isset($_SESSION['customer_email'])){
               echo"<a href='determination.php?Login'>Login</a>";              echo"<a  href='determination.php?SignUp'>Sign up</a>"; }
			else{
                echo"<a href='logout.php' style='color:red'>Logout</a>";
                 } ?> 
              </div>
       <div id="TopRightCart">
                 <a id="TopCart" href="cart.php"> Cart <i class="fa fa-shopping-cart">
							
			</i></a> <a id="TopCart" href="cart.php"><?php totalItems(); ?></a>
			<a id="TopCart" href="cart.php"><?php total_price(); ?></a>
             </div>
            </div>
       </div> 
      </div>  <!-- Site Top Part  End-->
     
        <div id="MiddlePart"> <!-- Site Middle Part-->


            <div class="welcome_text">
            <h1>Shoping Cart</h1>
          
            </div>
			
			<div id="Cart_place">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Update your cart or checkout</h3>
                <table align="center" width="90%">
                    <tr>
                    <td>Select</td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    </tr>
       <?php
    $total=0;
    global $con;
    $ip=getIp();
    $select_price="select * from cart where ipaddress_add='$ip'";
              
    $run_price=mysqli_query($con,$select_price);
    
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
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
                    <tr align="center">
                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"> </td>
                        <td><img src="Admin/product_images/<?php echo $prod_img ?>" width="70px" height="55px"> <br>
                        <?php echo $prod_tittle ?>
                        </td>
                        <td><input type="text" size="4" name="qty" value=" "> </td>
<!--                        <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'] ?> "> </td>-->
                        <td> <?php echo "BDT ".$each_price; ?> </td>
                   
                    </tr>
 <?php }} ?>
					</table>
					<table>
                           <tr align="center">
                    <tr><td colspan="3" align="right" > Sub Price</td> 
                    <td colspan="3" > <?php echo "BDT ".$total; ?></td> 
                    </tr>
                    <tr>
                         <?php  if(!isset($_SESSION['customer_email'])){
               echo"<td ><h2>Please login to continue</h2></td >"; }
			else{
                echo"<td colspan='2'><input type='submit' name='update_cart' value='Update Cart'></td> 
						</td> 
                        <td ><input type='reset' name='cancel_cart' value='cancel'></td> 
                        
                        <td><input type='submit' name='submit_cart' value='Submit Cart'></td>";
                 } ?>
     
                    </tr>
         </table>
			</form>
				</div>
                     <?php 
                         global $con;
                         $ip=getIp();
                         if(isset($_POST['update_cart'])){
                          foreach($_POST['remove'] as $remove_id){
                               $delete_product="delete from cart where p_id='$remove_id' and ipaddress_add='$ip'";
                         $run_delete=mysqli_query($con,$delete_product);
                            if($run_delete){
                     echo"<script>alert('deleted') window.open('cart.php','_self')</script>";
                
 }}} ?>
            
            <h1 style="color:red">Cash On Delevery</h1>
     <div class="add"></div>
        </div> <!-- Site Middle PartEnd -->
     
        <div id="footer"> <!-- Site Footer Part-->
			
            <h2 style="color:white">About Us</h2>
			<p>Kachabazaar is an online shop in Bangladesh. We believe that change in time and technology had brought in a great revolution in the world. Life is getting more faster and complex.It's getting harder  to manage time for daily shoping like vegetables, fishes, fruits etc. We are trying to provide an environment to manage time for  your everyday necessities. Our aim is to be more accessible to consumers nationally, and to serve products and services at highly competitive prices. </p>
            <h2 style="color:white">Follow Us</h2>
                			<div class="col-md-12">
                    <ul class="social-network social-circle">
                        <li><a href="https://www.youtube.com/" class="icoRss" title="youtube"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.plus.google.com/" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.linkedin.com/" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				</div>
         Copyright &copy; KachaBazar.com
        </div> <!-- Site Footer Part End -->  
      
</center> 
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script src="js/jquery.cycle.all.js"></script>
    
    <script>
    $('.sliderShow').cycle();
    
    </script>
</body>
</html>
<!--

<?php 
$select_cart="select * from cart where ipaddress_add='$ip'";
     $run_cart=mysqli_query($con,$select_cart);
     $check_cart=mysqli_num_rows($run_cart);

 if(isset($_SESSION['customer_email'])){
  $customer_email=$_SESSION['customer_email'];
  $get_person="SELECT * FROM customer where customer_email='$customer_email'";
    $run_person=mysqli_query($con,$get_person);
    $row_person=mysqli_fetch_array($run_person);
    $customer_name=$row_person['customer_name'];
 }?>
<?php 
 if(isset($_POST['submit_cart'])){
     while($productss_price=mysqli_fetch_array($run_price)){
        $productss_id=$productss_price['p_id'];
        $productss_price="select * from product where Product_id='$productss_id'";
        $run_product_price=mysqli_query($con,$productss_price);   
        while($proprduct_price=mysqli_fetch_array($run_product_price)){
//            $product_price=array($pp_price['Product_price']);
            $each_proprice=$proprduct_price['Product_price'];
            $prod_protittle=$proprduct_price['Product_tittle'];
//     $order_name=$customer_name;
//     $order_email=$customer_email;
//     $order_product=$prod_protittle;
//     $order_price=$each_proprice;
  $insert_order="insert into order(order_name,order_email,order_ip,product,price) values('$customer_name','$customer_email','$ip','$prod_protittle','$each_proprice')";
     
     $run_order=mysqli_query($con,$insert_order);
   if($run_order){
        echo "<script>alert('Cart is submited')</script>";
     
        echo "<script>window.open('index.php','_self')</script>";

 }}}}?>
-->
