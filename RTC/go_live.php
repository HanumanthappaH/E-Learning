<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$cid=$_POST['cid'];
	$query1="UPDATE `upcoming_courses` SET `status`='live' WHERE `cid`='$cid'";
	$result1=mysqli_query($con,$query1);
	

	$query="SELECT * FROM `upcoming_courses` WHERE `cid`='$cid' ";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>