<?php 
    
    $get_Id=$_GET['edit_product'];
         $get_product="SELECT * FROM product where Product_id='$get_Id'";

    $run_product=mysqli_query($con,$get_product);
  
     $row_product=mysqli_fetch_array($run_product); 
    
    
    $product_id=$row_product['Product_id']; 
    $product_tittle=$row_product['Product_tittle']; 
    $product_unit=$row_product['Product_unit']; 
    $product_Category=$row_product['Product_Category']; 
    $product_Price=$row_product['Product_price']; 
    $product_description=$row_product['Product_description']; 
    $product_key=$row_product['Product_key']; 
    $product_image=$row_product['Product_image']; 
    
    $get_category="SELECT * FROM category where Category_id='$product_Category'";
    $run_category=mysqli_query($con,$get_category);
    $row_category=mysqli_fetch_array($run_category);
    $Category_tittle=$row_category['Category_tittle'];  



  ?>
<div id="FormBox">
  <form action="" style="border:1px solid #ccc" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Edit Product</h1>
    <p> Change the form to edit product.</p>
    <hr>    
      
    <label for="Product_Category"><b>Product Category</b></label>
     <select name="Product_Category">
         <?php  echo "<option>$Category_tittle</option>"; ?>
            <?php $get_categories="SELECT * FROM category";
    $run_categories=mysqli_query($con,$get_categories);
   
while($row_categories=mysqli_fetch_array($run_categories)){ 
    $Categories_id=$row_categories['Category_id']; 
    $Categories_tittle=$row_categories['Category_tittle']; 
                                                           
       echo "<option value='$Categories_id'>$Categories_tittle</option>";
  
}?>
     </select>
      
    
     <label for="Product_tittle"><b>Product Tittle</b></label>
    <input type="text" placeholder="Enter Product Tittle" name="Product_tittle" value="<?php echo $product_tittle ?>"
      
       <label for="product_unit"><b>Product Unit</b></label>
    <input type="text" placeholder="Enter Product Unit" name="product_unit" value="<?php echo $product_unit ?>">
	  
	  
	  <label for="Product_price"><b>Product Price</b></label>
    <input type="text" placeholder="Enter Product Price" name="Product_price" value="<?php echo $product_Price ?>">
          
          <label for="Product_description"><b>Product Description</b></label>
      <textarea placeholder="Enter Product Description" name="Product_description"><?php echo $product_description ?></textarea>   
    
      <label for="Product_image"><b>Product Image</b></label>
    <input type=File placeholder="Enter Product Description" name="Product_image"> <img src="product_images/<?php echo $product_image ?>" width="60px" height="50px">   
    
                <label for="Product_key"><b>Product Keywords</b></label>
    <input type="text" placeholder="Enter Product Keywords" name="Product_key" size="30" value="<?php echo $product_key ?>">   

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" 
              name="add_product">Submit</button>
       
    </div>
  </div>
</form>  
</div>    


<?php
if(isset($_POST['edit_product'])){
    $Product_Udate_ID=$product_id;
    $Product_Category=$_POST['Product_Category'];
    $Product_tittle=$_POST['Product_tittle'];
    $Product_unit=$_POST['product_unit'];
    $Product_price=$_POST['Product_price'];
    $Product_description=$_POST['Product_description'];
    
    $Product_image=$_FILES['Product_image']['name'];
    $Product_image_temp=$_FILES['Product_image']['tmp_name'];
    $Product_keywords=$_POST['Product_keywords'];
    
    move_uploaded_file($Product_image_temp,"product_images/$Product_image");
     
   $update_product="update product set Product_Category='$Product_Category', Product_unit='$Product_unit', Product_tittle='$Product_tittle', Product_price='$Product_price', Product_description='$Product_description',Product_image='$Product_image',Product_key='$Product_keywords' where Product_id='$Product_Udate_ID'";
    
    
    $run_Update=mysqli_query($con, $update_product);
    if($run_Update){
        echo "<script>alert('product is Updated')</script>";
     
        echo "<script>window.open('index.php?view_product','_self')</script>";
 }}?>