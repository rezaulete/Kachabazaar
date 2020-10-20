<?php 
session_start();
session_destroy();

echo "<script>window.open('login.php?not_admin=You have logged out','_self')</script>";

?>