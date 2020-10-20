<?php
$visitor=$run_visitor=$name=$email=$pwd=$country=$city=$contact=$address="";
$image="000111.jpg";
//$con=mysqli_connect("localhost","root","","kachabazaar");
include("../Admin/INCLUDES/dbconnect.php");
//session_start();
 if(isset($_SESSION['customer_email'])){
$visitor=$_SESSION['customer_email'];
$get_visitor="select * from customer where customer_email='$visitor'";
    
    $run_visitor=mysqli_query($con,$get_visitor);
   $row_visitor=mysqli_fetch_array($run_visitor);
    
   $visitor_id=$row_visitor['customer_id'];
   $name=$row_visitor['customer_name'];
   $email=$row_visitor['customer_email'];
   $pwd=$row_visitor['customer_pwd'];
   $country=$row_visitor['customer_country'];
   $image=$row_visitor['customer_image'];
   $city=$row_visitor['customer_city'];
   $contact=$row_visitor['customer_contact'];
   $address=$row_visitor['customer_address'];

}
else{
    echo"please login to update your account";   
}?>
<div id="RegiBox" class="LoginBox">
<form action="my_account.php?edit_account" method="post" enctype="multipart/form-data">
      <table align="center" width="80%" border="0">
          <tr align="center"><td colspan="2"><h1>Edit Your Account</h1></td></tr>
          <tr>
              <td align="right">Customer Name:</td>
              <td align="left"><input type="text" name="cust_name"  value="<?php echo $name; ?>"></td>
          </tr>
          <tr>
              <td align="right">Customer Email:</td>
              <td align="left"><input type="text" name="cust_email" value="<?php echo $email; ?>"></td>
          </tr>
             <tr>
                 <td align="right">Customer Password:</td>
                 <td align="left"><input type="password" name="cust_pwd" value="<?php echo $pwd; ?>"></td>
             </tr>
             <tr>
          <td align="right">Customer Image:</td>
            <td align="left">
                <table><tr><td>
                <input type="file" name="cust_image"> 
                </td><td align="left">
                <?php  echo "<img src='customer_image/$image' width='120px' height='80px' style='border-radius: 7px; margin-right: 10px;' >";?>
                   </td> </tr></table>
    
                 </td>
                 
               </tr>
               <tr>
                   <td align="right">Customer Country:</td>
                   <td align="left"><input type="text" name="cust_country" value="<?php echo $country; ?>"></td>
               </tr>
               <tr>
                   <td align="right">Customer City:</td>
                   <td align="left"><input type="text" name="cust_city" value="<?php echo $city; ?>"></td>
               </tr>
               <tr>
                   <td align="right">Customer Contact:</td>
                     <td align="left"><input type="text" name="cust_contact" value="<?php echo $contact; ?>"></td>
                 </tr>
                 <tr>
                     <td align="right">Customer Address:</td>
                     <td align="left"><textarea name="cust_address" id="" cols="25" rows="7"><?php echo $address; ?></textarea></td>
                 </tr>
                 <tr align="center">
                     <td colspan="2"><input type="submit" name="update" value="Update Account"></td>
                 </tr>
             </table>
         </form>
</div>


<?php 
 
 if(isset($_POST['update'])){
 
//    global $con;
     $ip=getIp();
     $cust_id=$visitor_id;
     $cust_name=$_POST['cust_name'];
     $cust_email=$_POST['cust_email'];
     $cust_pwd=$_POST['cust_pwd'];
     $cust_image=$_FILES['cust_image']['name'];
     $cust_image_tmp=$_FILES['cust_image']['tmp_name'];
     $cust_country=$_POST['cust_country'];
     $cust_city=$_POST['cust_city'];
     $cust_contact=$_POST['cust_contact'];
     $cust_address=$_POST['cust_address'];
     
    move_uploaded_file($cust_image_tmp,"customer_image/$cust_image");
    $update_cust= "Update customer set customer_name='$cust_name',customer_email='$cust_email',customer_pwd='$cust_pwd',customer_country='$cust_country',customer_city='$cust_city',customer_contact='$cust_contact',customer_address='$cust_address',customer_image='$cust_image' where customer_id='$cust_id'";
     
     $run_update=mysqli_query($con,$update_cust);
//         if($insert_cust){
//        echo "<script>alert('Registration complete')</script>";
//     
//        echo "<script>window.open('registration.php','_self'</script>)";
        
//        
//     $select_cart="select * from cart where ipaddress_add='$ip'";
//     $run_cart=mysqli_query($con,$select_cart);
//     $check_cart=mysqli_num_rows($run_cart);
     if($run_update){
          echo "<script>alert('Account has been Updated succesfully')</script>";
         echo "<script>window.open('my_account.php','_self')</script>";
         
     }
     
     
//     if($check_cart==0){
//         $_SESSION['customer_email']=$cust_email;
//         echo "<script>alert('Account has been created succesfully')</script>";
//         echo "<script>window.open('my_account.php','_self')</script>";
//  
//         }
//                   else{
//        $_SESSION['customer_email']=$cust_email;
//         echo "<script>alert('Account has been created succesfully')</script>";  
//         echo "<script>window.open('check.php','_self')</script>";
//     }
//    
     
// $insert_cust=
     

         
     }



?>
