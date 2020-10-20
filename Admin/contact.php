<!DOCTYPE html>
<html>
<head>
  <title>New Project</title>
  <link type="text/css" rel="stylesheet" href="../css/style.css">
    <link type="text/css" rel="stylesheet" href="styles/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <?php 
      include("includes/dbconnect.php");
    ?> 
<?php 
include("../Function/Function.php"); 
session_start();
  if(!isset($_SESSION['admin_email'])){
             echo "<script>window.open('login.php?not_admin=You are not admin','_self')</script>";     

     }
    else{
        $email=$_SESSION['admin_email'];
       
//         echo "<script>alert('You logged in succesfully')</script>";  
    
    ?>

</head>
<body>
  <center>
      <div id="TopPart"> <!-- Site Top Part -->
          <div id="TopLeft">
            <div class="topnavIcon">
              <a  href="index.php"><img src="../images/kachalogo.png" alt="Kacha Bazar"></a>
            </div>
          </div>
        
          <div id="TopMiddle">
            <div id="UpperNav">
                <div class="topnav">
             <div class="search-container">
                <form>
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
	 <?php if(isset($_SESSION['admin_email'])){
         echo" <div class='Pro_dropdown'>
               <button class='dropbtn'>Admin 
               <i class='fa fa-caret-down'></i>
               </button>
               <div class='Pro_dropdown-content'>
               <a href='index.php'>My Admin</a>
			   <a href='index.php?add_product'>Add Product</a>
			   <a href='index.php?all_product'>View all product</a>
               
               <a href='index.php?add_category'>Add new category</a>
        
               <a href='index.php?view_customer'>View Customer</a>
               <a href='index.php?view_order'>View Orders</a>
               <a href='index.php?view_payment'>View Payment</a>
               
               </div>                  
               </div> ";  }?> 
               </div>
              </div>
              
          </div>
          
          <div id="TopRight">
            <div class="TopSign">
            <div id="TopRightSignup">
     <?php  if(!isset($_SESSION['admin_email'])){
               echo"<a href='determination.php?Login'>Login</a>";              echo"<a  href='determination.php?SignUp'>Sign up</a>"; }
			else{
                echo"<a href='logout.php' style='color:red'>Logout</a>";
                 } ?> 
              </div>
<!--
       <div id="TopRightCart">
                 <a id="TopCart" href="cart.php"> Cart <i class="fa fa-shopping-cart">
							
			</i></a> <a id="TopCart" href="cart.php"><?php totalItems(); ?></a>
			<a id="TopCart" href="cart.php"><?php total_price(); ?></a>
             </div>
-->
            </div>
       </div> 
      </div>  <!-- Site Top Part  End-->
     
        <div id="MiddlePart"> <!-- Site Middle Part-->
			
			<div id="Product_place">
                <h3>Check Messages</h3>
                <table align="center" width="90%">
                
                    <tr>
                    <td>Serial No.</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Message</td>
                    <td>Done</td>
                    <td>Delete</td>
                    </tr>
                    <?php 
         $get_contact="SELECT * FROM contact";
    $run_contact=mysqli_query($con,$get_contact);
   $i=0;
while($row_contact=mysqli_fetch_array($run_contact)){ 
  
    $contact_id=$row_contact['contact_id']; 
    $contact_name=$row_contact['contact_name']; 
    $contact_email=$row_contact['contact_email']; 
    $contact_message=$row_contact['message']; 
    
   $i++;
  
?>
    <tr>
    <td><?php echo  $i; ?> </td>
    <td><?php echo  $contact_name; ?> </td>
    
     <td><?php echo  $contact_email; ?></td>
     <td><?php echo  $contact_message; ?></td>
        <td><a href="index.php?edit_product=<?php echo $Product_id ?>"> done </a> </td>
        <td><a href="delete_contact.php?delete_contact=<?php echo $contact_id ?>"> Delete message </a> </td>
    </tr>  
    <?php } ?>
                    
					</table>
				</div>
                     
                <div class="add"> </div>   
            
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
       
     <?php } ?>


