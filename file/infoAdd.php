<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['hid']))
{
	header('location:../login.php');
} else {
	if(isset($_POST['add'])){
		$hid=$_SESSION['hid'];
		$bg=$_POST['bg'];
		$check_data = mysqli_query($conn, "SELECT hid FROM bloodinfo where hid='$hid' && bg='$bg'");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already added this blood sample.';
			header("location:../bloodstock.php?error=".$error);
		} else {
			$sql = "INSERT INTO bloodinfo (bg, hid, date) VALUES ('$bg', '$hid', CURRENT_TIMESTAMP)";
			if ($conn->query($sql) === TRUE) {
				$msg = "You have added record successfully.";
				header("location:../bloodstock.php?msg=".$msg);
			} else {
				$error = "Error: " . $sql . "<br>" . $conn->error;
				header("location:../bloodstock.php?error=".$error);
			}
			$conn->close();
		}
	} else {
		header("location:../bloodstock.php");
	}
}
?>