<!DOCTYPE html>
<html>
<head>
  <title>Kaachabazar</title>
  <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/Contactstyle.css">
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
     
      
        <div id="MiddlePart">
            
            <div class="welcome_text" style="margin-top:50px;">
            <h1>Contact Us</h1>
            
            <p style="font-size:110%">House no:420, Road no:7</p>   
             <p style="font-size:110%">Naohata, Paba </p>
            
            </div>
            
            
        <div id="contactformdiv">
                <form action="" method="post" enctype="multipart/form-data" id="contactForm">
			    Name:<br>
				<input type="text" placeholder="Enter your name" name="contact_name"><br>
				E-mail:<br>
				<input type="text" placeholder="Enter your Email" name="contact_email"><br>
			    Massage:<br>
				<textarea name="contact_message" id="" cols="25" rows="7"></textarea><br>
			    
				<input type="submit" value="Submit" name="Contact_submit"><br>				
			  </form>
       
        </div>
      <div id="contactformRightdiv">
          <h1>Google Map</h1> 
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14527.338202511382!2d88.60727897062479!3d24.456524880440934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbed97ba32612f%3A0xa18d3a7973af806a!2z4Kao4KaT4Ka54Ka-4Kaf4Ka-!5e0!3m2!1sbn!2sbd!4v1521731546660" width="600" height="400" frameborder="0" style="border:0; border-radius: 20px;border: 2px solid #F9E79F;" allowfullscreen></iframe>
            </div>
            
      <div class="add"></div>
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
</body>
</html>     

<?php 
 if(isset($_POST['Contact_submit'])){
    
     $contact_name=$_POST['contact_name'];
     $contact_email=$_POST['contact_email'];
     $contact_message=$_POST['contact_message'];

  $insert_contact="insert into contact(contact_name,contact_email,message) values('$contact_name','$contact_email','$contact_message')";
     
     $run_contact=mysqli_query($con,$insert_contact);
  
     if($run_contact){
        echo "<script>alert('meassge send')</script>";
     
        echo "<script>window.open('contact.php','_self'</script>)";
        
    }}?>
