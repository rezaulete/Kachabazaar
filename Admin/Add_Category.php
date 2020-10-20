<?php $get_categories="SELECT * FROM category";
    $run_categories=mysqli_query($con,$get_categories);
   
while($row_categories=mysqli_fetch_array($run_categories)){ 
    $Categories_id=$row_categories['Category_id']; 
    $Categories_tittle=$row_categories['Category_tittle']; 
}?>

			
<div id="Product_place">
     <h3>Update your Category</h3>
     <table align="center" width="100%">
                  <tr>
                    <td>Serial No.</td>
                    <td>Category No.</td>
                    <td>Category Tittle</td>
                    <td>Edit Category</td>
                    <td>Delete Category</td>
                    </tr>
                    <?php 
          $i=0;
         $get_cat="SELECT * FROM category";
         $run_cat=mysqli_query($con,$get_categories);
while($row_cat=mysqli_fetch_array($run_cat)){ 
    $Cat_id=$row_cat['Category_id']; 
    $Cat_tittle=$row_cat['Category_tittle']; 
   $i++;
  
?>
    <tr>
    <td><?php echo  $i; ?> </td>
    <td><?php echo  $Cat_id; ?> </td>
    <td><?php echo  $Cat_tittle; ?> </td> 
     <td><a href="index.php?edit_product=<?php echo $Product_id ?>"> Edit category </a> </td>
        <td><a href="delete_product.php?delete_product=<?php echo $Product_id ?>"> Delete Category </a> </td> 
    <?php } ?>
                    
					</table>
				</div>


<div id="FormBox">
  <form action="" style="border:1px solid #ccc" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>Add Category</h1>
    <hr>    
    <input type="text" placeholder="Enter Category Tittle" name="Product_Category">  

    <div class="clearfix">
      <button type="reset" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" 
              name="add_Category">Submit</button>
       
    </div>
  </div>
</form>  

</div>    


<?php
if(isset($_POST['add_Category'])){
    $Product_Category=$_POST['Product_Category'];
     $insert_category="insert into category(Category_tittle) values('$Product_Category')";

        $insert_product_final=mysqli_query($con, $insert_category);
    if($insert_product){
        echo "<script>alert('Category is added')</script>";
     
        echo "<script>window.open('index.php?add_category','_self'</script>)";
        
    }    
}?>