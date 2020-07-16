<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$sid=$_POST['sid'];
	$name=$_POST['name'];
	$title=$_POST['title'];
	$syllabus=$_POST['syllabus'];
	$duration=$_POST['duration'];
	$date=$_POST['date'];
	$time=$_POST['time'];


	$query="INSERT INTO `upcoming_courses`(`course`, `syllabus`, `duration`, `date`, `time`, `status`, `posted_by`,`sid`) VALUES ('$title','$syllabus','$duration','$date','$title','upcoming','$name','$sid') ";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Created Successfully";
	}else{
		echo "Error Try Again";
	}
//////////////////////////////////////

	$msg="Dear Student, ".$title." course will be hosted on ".$date." Duration :".$duration;
	$mobile='8495851277';
	$description= urlencode($msg);
	// create a new cURL resource
	$ch = curl_init();

	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, "http://198.24.149.4/API/pushsms.aspx?loginID=nagamahesh&password=infidata@86&mobile=".$mobile."&text=".$description."&senderid=DEMOOO&route_id=2&Unicode=0");
	curl_setopt($ch, CURLOPT_HEADER, 0);

	// grab URL and pass it to the browser
	$sent=curl_exec($ch);
	if ($sent) {
		echo "Successufully Sent";
	}else{
		echo "error";
	}

	// close cURL resource, and free up system resources
	curl_close($ch);
?>