<?php
include ("Function/function.php");
session_start();
?>

    <?php 
include("function/Function.php"); 
   if(!isset($_SESSION['customer_email'])){
       include("customer_login.php");
   }
   else{
       include("payment.php");
   }
   ?>