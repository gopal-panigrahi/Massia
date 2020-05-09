<?php
	session_start();

	$conn = mysqli_connect("localhost","root","","sayali_industries");

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if($_SESSION['login']==0){
		echo json_encode(array('status' => 0));
		exit();
	}
	if($_GET['stage']=='5'){
		$sql = "DELETE FROM stage WHERE PID = ".$_GET['pid'];
	}
	else{
			$sql = "UPDATE stage SET current_stage =".$_GET['stage']." WHERE PID = ".$_GET['pid'];
	}

	if(mysqli_query($conn,$sql)){
		echo json_encode(array('status' => 1));
	}
	else{
		echo json_encode(array('status' => 0));
		exit();
	}
	mysqli_close($conn);
?>
