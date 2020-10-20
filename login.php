<div id="LoginBox">
<form action="determination.php?Login" method="post">    
		<h2>Login</h2>

		<div class="resistered-login">
		<p>Please Login with resistered details:</p>
<!--		<form>-->
			
		<input type="text" placeholder="Enter your email" name="email">
		
		<input type="password" placeholder="Enter your password" name="pass">
			    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
		<input type="submit" value="Login" name="login">
			<a href="#">Forgot Password?</a>
			<h3>Or</h3>
		<a href="determination.php?SignUp"><button>Resister</button></a>
		 </div>
            </form>
       

    </div>

<?php 
     if(isset($_POST['login'])){
     $cust_email=$_POST['email'];
     $cust_pwd=$_POST['pass'];

   $select_cust="select * from customer where customer_email= '$cust_email' and customer_pwd= '$cust_pwd'";
     
     $run_customer=mysqli_query($con,$select_cust);
   
     $check_customer=mysqli_num_rows($run_customer);
     if($check_customer==0){
         echo "<script>alert('Email or password is incorrect')</script>";
         exit();
         }
                  $ip=getIp();
                  $select_cart="select * from cart where ippaddress_add='$ip'";
                  $run_cart=mysqli_query($con,$select_cart);
                  $check_cart=mysqli_num_rows($run_cart);
                  if($check_customer>0 and $check_cart==0){
                      $_SESSION['customer_email']=$cust_email;
                      echo "<script>alert('You logged in succesfully')</script>";
                      echo "<script>window.open('customer/my_account.php','_self')</script>";
                      
                      
                  }
                  
                   else{
        $_SESSION['customer_email']=$cust_email;
         echo "<script>alert('You logged in succesfully')</script>";  
         echo "<script>window.open('cart.php','_self')</script>";
     }}?>
