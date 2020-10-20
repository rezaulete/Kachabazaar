
<div id="FormBox">
  <form action="" style="border:1px solid #ccc" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Add Product</h1>
    <p> Fill the form to add product.</p>
    <hr>    
      
    <label for="Product_Category"><b>Product Category</b></label>
     <select name="Product_Category">
            <?php $get_categories="SELECT * FROM category";
    $run_categories=mysqli_query($con,$get_categories);
   
while($row_categories=mysqli_fetch_array($run_categories)){ 
    $Categories_id=$row_categories['Category_id']; 
    $Categories_tittle=$row_categories['Category_tittle']; 
                                                           
       echo "<option value='$Categories_id'>$Categories_tittle</option>";
  
}?>
     </select>
      
    
     <label for="Product_tittle"><b>Product Tittle</b></label>
    <input type="text" placeholder="Enter Product Tittle" name="Product_tittle">
      
       <label for="product_unit"><b>Product Unit</b></label>
    <input type="text" placeholder="Enter Product Unit" name="product_unit">
	  
	  
	  <label for="Product_price"><b>Product Price</b></label>
    <input type="text" placeholder="Enter Product Price" name="Product_price">
          
          <label for="Product_description"><b>Product Description</b></label>
      <textarea placeholder="Enter Product Description" name="Product_description"></textarea>   
    
      <label for="Product_image"><b>Product Image</b></label>
    <input type=File placeholder="Enter Product Description" name="Product_image">   
    
                <label for="Product_key"><b>Product Keywords</b></label>
    <input type="text" placeholder="Enter Product Keywords" name="Product_key" size="30">   

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" 
              name="add_product">Submit</button>
       
    </div>
  </div>
</form>  

</div>    


<?php
if(isset($_POST['add_product'])){
    $Product_Category=$_POST['Product_Category'];
    $Product_tittle=$_POST['Product_tittle'];
    $Product_price=$_POST['Product_price'];
    $product_unit=$_POST['product_unit'];
    $Product_description=$_POST['Product_description'];
    
    $Product_image=$_FILES['Product_image']['name'];
    $Product_image_temp=$_FILES['Product_image']['tmp_name'];
//    tmp_name is a fixed name
    $Product_keywords=$_POST['Product_key'];
    
  move_uploaded_file($Product_image_temp,"product_images/$Product_image");
     
     $insert_product="insert into product(Product_Category,Product_tittle,Product_unit,Product_price,Product_description,Product_image,Product_key) values('$Product_Category','$Product_tittle','$product_unit','$Product_price','$Product_description','$Product_image','$Product_keywords')";

        $insert_product_final=mysqli_query($con, $insert_product);
    if($insert_product){
        echo "<script>alert('product is added')</script>";
     
        echo "<script>window.open('index.php?add_product','_self')</script>";
        
    }    
}?>