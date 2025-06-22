<?php
session_start(); 
require 'connection.php';

if(!isset($_SESSION['rid'])) {
	header('location:../login.php');
} else {
	if(isset($_POST['request'])) {
		$rid = $_SESSION['rid'];
		$bg = $_POST['bg'];
		
		// Get receiver details
		$sql = "SELECT rname, rcity, rphone, remail FROM receivers WHERE id='$rid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		// Insert the donation request
		$sql = "INSERT INTO blooddonate (rid, bg, name, city, phone, email, status) 
				VALUES ('$rid', '$bg', '{$row['rname']}', '{$row['rcity']}', '{$row['rphone']}', '{$row['remail']}', 'Pending')";
		
		if ($conn->query($sql) === TRUE) {
			$msg = 'Your blood donation request has been submitted successfully. You will be notified once it is reviewed.';
			header("location:../blooddonate.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
			header("location:../blooddonate.php?error=".$error);
		}
		$conn->close();
}
}
?>