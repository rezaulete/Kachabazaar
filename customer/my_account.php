<!DOCTYPE html>
<html>
<head>
  <title>Kaachabazar</title>
  <link type="text/css" rel="stylesheet" href="../css/style.css">
<!--	<script src="../js/myscripts.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
<?php include("../function/Function.php"); 
                session_start(); ?>
</head>
<body>
  <center>
      <div id="TopPart"> <!-- Site Top Part -->
          <div id="TopLeft">
            <div class="topnavIcon">
              <a  href="../index.php"><img src="../images/kachalogo.png" alt="Kacha Bazar"></a>
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
                     getcategoriesMyAc();
                  
                   ?>
                       </div> </div>  
            <a href="../discounts.php">Discounts</a>           
              <a href="../contact.php">Contact</a>
	<?php if(isset($_SESSION['customer_email'])){
        echo" <div class='Pro_dropdown'>
              <button class='dropbtn'>Account 
               <i class='fa fa-caret-down'></i>
               </button>
               <div class='Pro_dropdown-content'>
               <a href='my_account.php'>My Account</a>
			    <a href='my_account.php?edit_account'>Edit Account</a>
			   <a href='my_account.php?delete_account'>Delete Account</a>
			   <a href='my_account.php?change_password'>Change Password</a>
               </div>                  
                </div> "; }?>                 
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
                    <a id="TopCart" href="../cart.php"> Cart <i class="fa fa-shopping-cart">
		    				
		    	</i></a> <a id="TopCart" href="../cart.php"><?php totalItems(); ?></a>
		    	<a id="TopCart" href="../cart.php"><?php total_price() ?></a>
                 </div>
            </div>
          </div>          
      </div>  <!-- Site Top Part  End-->
	  
                     <?php   
                     
   if(isset($_SESSION['customer_email'])){
       
       $user= $_SESSION['customer_email'];
    $get_image="SELECT * FROM customer where customer_email='$user'";
    $run_image=mysqli_query($con,$get_image);
   

$row_image=mysqli_fetch_array($run_image);
    $cust_Image=$row_image['customer_image'];
    $cust_Id=$row_image['customer_id'];
    $cust_Name=$row_image['customer_name'];
    $cust_Contact=$row_image['customer_contact'];
    $cust_City=$row_image['customer_city'];
    $cust_Address=$row_image['customer_address'];
       
       echo "<img src='customer_images/$cust_Image' width='150px' height='110px' >";

    }     ?>
     
        <div id="MiddlePartMyAcc"> <!-- Site Middle Part-->
              <div id="DeterminationBox"> 
<?php if(!isset($_GET['edit_account'])){ ?>
<?php if(!isset($_GET['delete_account'])){ ?>
<?php if(!isset($_GET['change_password'])){ ?>
<!--            <h1>Welcome</h1>-->
				<img src="customer_image/<?php echo $cust_Image; ?>" alt="Image" width="300" height="300" style="border-radius: 50%;" >
			
 <?php echo"<h1>Welcome: $cust_Name</h1>"; ?>
                  <table>
                  <tr><th align=left><b>Id :</b></th> <th align=left><?php echo $cust_Id; ?></th> </tr>
                  <tr><th align=left><b>Name :</b></th><th align=left><?php echo $cust_Name; ?></th>  </tr>
                  <tr><th align=left><b>Email :</b></th><th align=left><?php echo $user; ?></th>  </tr>
                  <tr><th align=left><b>Contact No :</b></th><th align=left>+880<?php echo $cust_Contact; ?></th>  </tr>
                  <tr><th align=left><b>Address :</b></th><th align=left><?php echo $cust_Address.",".$cust_City; ?></th>  </tr>           
                  </table>

          <?php }}} ?> 
 <?php 
          if(isset($_GET['edit_account'])){
              include("edit_account.php");
                         
          }?>
                  <?php 
          if(isset($_GET['delete_account'])){
              include("delete_account.php");
                         
          }?>
                   <?php 
                  if(isset($_GET['change_password'])){
                      include("change_password.php");
                   }?>
<!--				Np Need-->
            </div>
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