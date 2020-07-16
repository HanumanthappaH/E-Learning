<?php
	define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}
	$cid=$_POST['cid'];
	$sid=$_POST['sid'];
   $session=$_POST['session'];
	
      require 'conn.php';
   	$query="INSERT INTO `enrolled`( `cid`, `sid`,`session`) VALUES ('$cid','$sid','$session')";
   	$result=mysqli_query($con,$query);
   	if ($result) {
         echo "Success";
      }else{
         echo "Error Try Again";
      }
?>