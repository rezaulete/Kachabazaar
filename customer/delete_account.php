<?php
$visitor=$run_visitor=$name=$email=$pwd=$country=$city=$contact=$address="";
$image="000111.jpg";
$con=mysqli_connect("localhost","root","","kachabazaar");
//include("../INCLUDES/dbconnect.php");


//session_start();
 if(isset($_SESSION['customer_email'])){
//global $con;
$visitor=$_SESSION['customer_email'];
$get_visitor="select * from customer where customer_email='$visitor'";
    
    $run_visitor=mysqli_query($con,$get_visitor);
   $row_visitor=mysqli_fetch_array($run_visitor);
    
   $visitor_id=$row_visitor['customer_id'];
   $pwd=$row_visitor['customer_pwd'];
   $name=$row_visitor['customer_name'];


}
else{
    echo"please login to update your account";
    
}

?> 
<p style="text-align: left;margin-top: 75px;">
Hi <b><?php echo $name; ?>,</b><br>
    We are sorry to here you'd like to delete your account.<br>When you delete your account, your profile, photos, comments, carts will be permanently removed.
After you delete your account, you can't sign up again with the same username or add that username to another account, and we can't reactivate deleted accounts.<br>
    <b> Are you sure you wants to delete your account?</b><br>
    If yes, Enter your password and
    click <b style="color:red;">confirm</b> to delete your account.
</p>

<div id="LoginBox" style=" width: 400px;
    height: 150px; margin-top: 20px;">
<form action="" method="post">   
		<input type="password" placeholder="Enter your password" name="pass">
			  
		<input type="submit" value="Confirm" name="Delete">
		</form>
        </div>

    </div>
            

<?php 
 
 if(isset($_POST['Delete'])){
 $cust_pwd=$_POST['pass'];
 $cust_id=$visitor_id;
   $select_cust="select * from customer where customer_id= '$cust_id' and customer_pwd= '$cust_pwd'";
     
//    global $con;
//     $ip=getIp();
    
//    $update_cust="DELETE FROM customer
//WHERE customer_id='$cust_id'";
     
     $run_customer=mysqli_query($con,$select_cust);
 $check_customer=mysqli_num_rows($run_customer);
if($check_customer==0){
         echo "<script>alert('Password is incorrect')</script>";
         exit();
         }
     else{
         
         $delete_cust="DELETE FROM customer
WHERE customer_id='$cust_id'";   
      $run_update=mysqli_query($con,$delete_cust);   
        echo "<script>alert('Your accout has been deleted succesfully')</script>";
         echo "<script>window.open('logout.php','_self')</script>";
         
     }}?>




<!--
<?PHP
if(isset($_POST['Delete'])){
     $delete_cust="DELETE FROM customer
WHERE customer_id='$cust_id'";   
      $run_update=mysqli_query($con,$delete_cust);   
              echo "<script>alert('Password has been changed succesfully')</script>";
         echo "<script>window.open('logout.php','_self')</script>";  
}

?>
-->
