<?php

$con=mysqli_connect("localhost","root","","kachabazaar");

    function getIp(){

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }

function getcategories(){
    global $con;
    $get_categories="SELECT * FROM category";
    $run_categories=mysqli_query($con,$get_categories);
   

while($row_categories=mysqli_fetch_array($run_categories)){
    $Categories_tittle=$row_categories['Category_tittle'];
    $Categories_id=$row_categories['Category_id'];
    

       echo "<a href='product.php?category=$Categories_id'>$Categories_tittle</a>";
  
}}

function getcategoriesMyAc(){
    global $con;
    $get_categories="SELECT * FROM category";
    $run_categories=mysqli_query($con,$get_categories);
   

while($row_categories=mysqli_fetch_array($run_categories)){
    $Categories_tittle=$row_categories['Category_tittle'];
    $Categories_id=$row_categories['Category_id'];
    

       echo "<a href='../product.php?category=$Categories_id'>$Categories_tittle</a>";
  
}}


function getproducts(){
	if(!isset($_GET['category'])){ 
    global $con;
    $get_products="SELECT * FROM product order by RAND() LIMIT 0,12";
    $run_products=mysqli_query($con,$get_products);
   

while($row_products=mysqli_fetch_array($run_products)){
    
    $products_id=$row_products['Product_id'];
    $products_Category=$row_products['Product_Category'];
    $products_title=$row_products['Product_tittle'];
    $products_unit=$row_products['Product_unit'];
    $products_price=$row_products['Product_price'];
    $products_image=$row_products['Product_image'];
    
       echo "<div class='Productsingle'>
	   
       <h4>$products_title</h4>
	   <div class='ProdutImage'>
       <img src='Admin/product_images/$products_image' width='150px'height='100px'> 
	   </div>
	   <div class='Quantity'>
   		<h3>$products_unit</h3>
                         </div>
	                    <div class='ProductPrice'>
                          <h3>&#2547;$products_price</h3>
                        </div>            
       <a href='details.php?products_id=$products_id'>Details</a>
       <a href='index.php?products_id=$products_id'><button class='Cartbutton'>add to cart</button></a>
        </div> ";

}}}

function getproduct_Category(){
    if(isset($_GET['category'])){
          $categories_id=$_GET['category'];
    
    global $con;
    $get_products_categories="SELECT * FROM product where Product_Category= '$categories_id'";
    $run_products_Categories=mysqli_query($con,$get_products_categories);
   

while($row_products=mysqli_fetch_array($run_products_Categories)){
    
      $products_id=$row_products['Product_id'];
    $products_Category=$row_products['Product_Category'];
    $products_title=$row_products['Product_tittle'];
    $products_unit=$row_products['Product_unit'];
    $products_price=$row_products['Product_price'];
    $products_image=$row_products['Product_image'];
    
       echo "<div class='Productsingle'>
	   
       <h4>$products_title</h4>
	   <div class='ProdutImage'>
       <img src='Admin/product_images/$products_image' width='150px'height='100px'> 
	   </div>
                   
                        <div class='Quantity'>
                          <h3>$products_unit</h3>
                         </div>
                      <div class='ProductPrice'>
                          <h3>&#2547;$products_price</h3>
                        </div>                         
      <a href='details.php?products_id=$products_id'>Details</a>
       <a href='index.php?products_id=$products_id'><button class='Cartbutton'>add to cart</button></a>
        </div>";

}}}


function getproduct_CategoryAdmin(){
    if(isset($_GET['category'])){
          $categories_id=$_GET['category'];
    
    global $con;
    $get_products_categories="SELECT * FROM product where Product_Category= '$categories_id'";
    $run_products_Categories=mysqli_query($con,$get_products_categories);
   

while($row_products=mysqli_fetch_array($run_products_Categories)){
    
      $products_id=$row_products['Product_id'];
    $products_Category=$row_products['Product_Category'];
    $products_title=$row_products['Product_tittle'];
    $products_unit=$row_products['Product_unit'];
    $products_price=$row_products['Product_price'];
    $products_image=$row_products['Product_image'];
    
       echo "<div class='Productsingle'>
	   
       <h4>$products_title</h4>
	   <div class='ProdutImage'>
       <img src='product_images/$products_image' width='150px'height='100px'> 
	   </div>
                   
                        <div class='Quantity'>
                          <h3>$products_unit</h3>
                         </div>
                      <div class='ProductPrice'>
                          <h3>&#2547;$products_price</h3>
                        </div>                         
       <a href='details.php?products_id=$products_id'>Details</a>
       <a href='index.php?products_id=$products_id'><button class='Cartbutton'>add to cart</button></a>
        </div>";

}}}



function cart(){
    
    if(isset($_GET['products_id'])){    
    global $con;
     $ip=getIp();
        
    $product_id=$_GET['products_id'];
    $Check_product="SELECT * FROM cart where ipaddress_add='$ip' and p_id='$product_id'";
    $run_chk=mysqli_query($con,$Check_product);
    
        if(mysqli_num_rows($run_chk)>0)
        {
          echo "";  
        }
        else{
            $insert_pro="insert into cart(p_id,ipaddress_add) values ('$product_id','$ip')";
            $run_pro=mysqli_query($con,$insert_pro);
            echo "<script>window.open(index.php','_self')</script>";
        }

}}



function totalItems(){
    if(isset($_GET['Product_id'])){    
    global $con;
    $ip=getIp();
    $get_items="SELECT * FROM cart where ipaddress_add='$ip'";
    $run_items=mysqli_query($con,$get_items);
     $count_items=mysqli_num_rows($run_items);  
}
    else{    
    global $con;
    $ip=getIp();
        
    $get_items="SELECT * FROM cart where ipaddress_add='$ip'";
    $run_items=mysqli_query($con,$get_items);
    $count_items=mysqli_num_rows($run_items);
}
 echo $count_items;

}



function total_price(){
    $total=0;
    global $con;
    $ip=getIp();
    $select_price="select * from cart where ipaddress_add='$ip'";
    $run_price=mysqli_query($con,$select_price);
    
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
        $pro_price="select * from product where Product_id='$pro_id'";
        $run_pro_price=mysqli_query($con,$pro_price);   
        while($pp_price=mysqli_fetch_array($run_pro_price)){
//            $product_price=array($pp_price['Product_price']);
            $prod_price=array($pp_price['Product_price']);
            $values=array_sum($prod_price);
            $total+=$values;
   
        }     
    }  
    echo "&#2547;".$total;
   
}


?>