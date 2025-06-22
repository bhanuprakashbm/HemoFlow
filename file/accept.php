<?php
include "connection.php";
    $reqid=$_GET['reqid'];
	$status = "Accepted";
	
	// First, get the blood request details
	$get_request = "SELECT * FROM bloodrequest WHERE reqid = '$reqid'";
	$request_result = mysqli_query($conn, $get_request);
	
	if($request_result && mysqli_num_rows($request_result) > 0) {
		$request_data = mysqli_fetch_assoc($request_result);
		$hid = $request_data['hid'];
		$bg = $request_data['bg'];
		
		// Update the blood request status
		$sql = "UPDATE bloodrequest SET status = '$status' WHERE reqid = '$reqid'";
		if (mysqli_query($conn, $sql)) {
			$msg="You have accepted the request.";
			header("location:../bloodrequest.php?msg=".$msg );
		} else {
			$error= "Error changing status: " . mysqli_error($conn);
			header("location:../bloodrequest.php?error=".$error );
		}
	} else {
		$error= "Request not found.";
		header("location:../bloodrequest.php?error=".$error );
	}
    mysqli_close($conn);
?>