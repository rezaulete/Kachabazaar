<!DOCTYPE html>
<html>
<head>
  <title>Add product</title>
  <link type="text/css" rel="stylesheet" href="styles/style.css">
<!--
   <?php 
$con=mysqli_connect("localhost","root","","ecommerce");
?> 
    
-->
    <?php 
      include("includes/dbconnect.php");
    ?> 
    
<!--
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
-->
</head>
<body>
                <?php 
    
    $get_CatId=$_GET['Edit_Category'];
         $get_Category="SELECT * FROM categories where Categories_id='$get_CatId'";
    $run_categories=mysqli_query($con,$get_Category);
    $row_product=mysqli_fetch_array($run_categories); 
    
    $categories_id=$row_product['Categories_id']; 
    $categories_tittle=$row_product['Categories_tittle']; 
   
  ?>
 
    <div id="FormBox">
   <form action="" style="border:1px solid #ccc" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Add Product</h1>
    <p> Here Please fill in this form to add product.</p>
    <hr>

    <label for="New_category"><b>Add Category</b></label>
    <input type="text" placeholder="Enter new Product Category" name="New_category" value="<?php echo $categories_tittle; ?>">    

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" 
              name="Edit_category">Submit</button>
       
    </div>
  </div>
</form>  
</div>    
    

</body>

</html>

<?php
if(isset($_POST['Edit_category'])){
    $Categorie_Udate_ID=$get_CatId;
    $Categories_tittle=$_POST['New_category'];

   $update_Category="update categories set Categories_tittle='$Categories_tittle' where Categories_id='$Categorie_Udate_ID'";
    
    
    $run_category=mysqli_query($con, $update_Category);
    if($run_category){
        echo "<script>alert('Category is Updated')</script>";
     
        echo "<script>window.open('index.php?View_Category','_self')</script>";
        
    }
    
    
}

?>