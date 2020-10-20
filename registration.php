
<div id="RegiBox">
<form action="determination.php?SignUp" method="post" enctype="multipart/form-data">
      <table align="center" width="80%" border="0">
          <tr align="center"><td colspan="2"><h1>Create an Account</h1></td></tr>
          <tr>
              <td align="right">Customer Name:</td>
              <td align="left"><input type="text" name="cust_name"></td>
          </tr>
          <tr>
              <td align="right">Customer Email:</td>
              <td align="left"><input type="text" name="cust_email"></td>
          </tr>
             <tr>
                 <td align="right">Customer Password:</td>
                 <td align="left"><input type="password" name="cust_pwd"></td>
             </tr>
             <tr>
          <td align="right">Customer Image:</td>
            <td align="left"><input type="file" name="cust_image"></td>
               </tr>
               <tr>
                   <td align="right">Customer Country:</td>
                   <td align="left"><input type="text" name="cust_country"></td>
               </tr>
               <tr>
                   <td align="right">Customer City:</td>
                   <td align="left"><input type="text" name="cust_city"></td>
               </tr>
               <tr>
                   <td align="right">Customer Contact:</td>
                     <td align="left"><input type="text" name="cust_contact"></td>
                 </tr>
                 <tr>
                     <td align="right">Customer Address:</td>
                     <td align="left"><textarea name="cust_address" id="" cols="25" rows="7"></textarea></td>
                 </tr>
                 <tr align="center">
                     <td colspan="2"><input type="submit" name="register" value="Create Account"></td>
                 </tr>
             </table>
         </form>
</div>

<?php 
 if(isset($_POST['register'])){
     $ip=getIp();
     $cust_name=$_POST['cust_name'];
     $cust_email=$_POST['cust_email'];
     $cust_pwd=$_POST['cust_pwd'];
     $cust_image=$_FILES['cust_image']['name'];
     $cust_image_tmp=$_FILES['cust_image']['tmp_name'];   
     $cust_country=$_POST['cust_country'];
     $cust_city=$_POST['cust_city'];
     $cust_contact=$_POST['cust_contact'];
     $cust_address=$_POST['cust_address'];
     
     move_uploaded_file($cust_image_tmp,"customer/customer_image/$cust_image");
  $insert_cust="insert into customer(customer_ip,customer_name,customer_email,customer_pwd,customer_country,customer_city,customer_contact,customer_address,customer_image) values('$ip','$cust_name','$cust_email','$cust_pwd','$cust_country','$cust_city','$cust_contact','$cust_address','$cust_image')";
     
     $run_cust=mysqli_query($con,$insert_cust);

     $select_cart="select * from cart where ipaddress_add='$ip'";
     $run_cart=mysqli_query($con,$select_cart);
     $check_cart=mysqli_num_rows($run_cart);
     if($check_cart==0){
         $_SESSION['customer_email']=$cust_email;
         echo "<script>alert('Account has been created succesfully')</script>";
         echo "<script>window.open('index.php','_self')</script>";
  
         }
          else{
        $_SESSION['customer_email']=$cust_email;
         echo "<script>alert('Account has been created succesfully')</script>";  
         echo "<script>window.open('cart.php','_self')</script>";
}}?>