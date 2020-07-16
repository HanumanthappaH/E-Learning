<?php
	define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}
	$name=$_POST['name'];
	$msg=$_POST['msg'];
  
	
      require 'conn.php';
   	$query="INSERT INTO `chat`( `name`, `msg`) VALUES ('$name','$msg')";
   	$result=mysqli_query($con,$query);
   	if ($result) {
         echo "Success";
      }else{
         echo "Error Try Again";
      }
?>