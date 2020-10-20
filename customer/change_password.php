<?php
$visitor=$run_visitor=$name=$email=$pwd=$country=$city=$contact=$address="";
$image="000111.jpg";
//$con=mysqli_connect("localhost","root","","kachabazaar");
include("../Admin/INCLUDES/dbconnect.php");

//session_start();
 if(isset($_SESSION['customer_email'])){
//global $con;
$visitor=$_SESSION['customer_email'];
$get_visitor="select * from customer where customer_email='$visitor'";
    
    $run_visitor=mysqli_query($con,$get_visitor);
   $row_visitor=mysqli_fetch_array($run_visitor);
    
   $visitor_id=$row_visitor['customer_id'];
   $pwd=$row_visitor['customer_pwd'];


}
else{
    echo"please login to update your account";
    
}

?>

<p style="text-align: left;margin-top: 75px;    font-size: 110%;">
Hi <b><?php echo $name; ?>,</b><br>
    Do you want to change your password?<br> Please try to creat a strong password.<br>
  
    <ul style="text-align: left;font-size: 110%; padding-left: 10px;">
    <li>Don't make the password easy to guess.It has to contain a random collection of letters, numbers and symbols</li>   
    <li>It has to be at least 8 characters or longer</li>   
    <li>Please use a unique password for every different account</li>   
    <li>Please do not use password more than 20 characters</li>   
    </ul>
</p>
<p style="text-align: left; font-size: 110%;">To change your password first enter your old password then the new password. After confirming your new password click to the <b style="color:red;">change password</b> button.</p>
<div id="LoginBox" style="
    height: 250px; margin-top: 20px;">
    <form action="" method="post">    

		<input type="password" placeholder="Enter Current password" name="cust_pwd">
		<input type="password" placeholder="Enter new password" name="new_pwd">
		<input type="password" placeholder="Confirm your password" name="new_pwd_again">
		<input type="submit" value="Change Password" name="Change_pass">
            </form>
       
</div>
<?php 
 
 if(isset($_POST['Change_pass'])){

//    global $con;
     $ip=getIp();
     $cust_id=$visitor_id;

     $cust_pwd=$_POST['cust_pwd'];
     $new_pwd=$_POST['new_pwd'];
     $new_pwd_again=$_POST['new_pwd_again'];
if($cust_pwd==$pwd){
  if($new_pwd==$new_pwd_again) {
        $update_cust="Update customer set customer_pwd='$new_pwd' where customer_id='$cust_id'";
     
     $run_update=mysqli_query($con,$update_cust);

     if($run_update){
          echo "<script>alert('Password has been changed succesfully')</script>";
         echo "<script>window.open('my_account.php','_self')</script>";         
     } 
      
  } else{
echo "<script>alert('Password Does not match')</script>";

}
    
}else{
echo "<script>alert('Current Password Does not match')</script>";

}
     

     }?>
