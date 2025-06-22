<?php
require 'connection.php';
session_start();

if(!isset($_SESSION['hid'])) {
    header('location:../login.php');
} else {
    if(isset($_GET['bid'])) {
        $bid = $_GET['bid'];
        // Verify the blood info belongs to this hospital
        $hid = $_SESSION['hid'];
        $check = mysqli_query($conn, "SELECT bid FROM bloodinfo WHERE bid='$bid' AND hid='$hid'");
        
        if(mysqli_num_rows($check) > 0) {
            $sql = "DELETE FROM bloodinfo WHERE bid='$bid' AND hid='$hid'";
            if (mysqli_query($conn, $sql)) {
                $msg = "You have deleted one blood sample.";
                header("location:../bloodstock.php?msg=".$msg);
            } else {
                $error = "Error deleting record: " . mysqli_error($conn);
                header("location:../bloodstock.php?error=".$error);
            }
        } else {
            $error = "Invalid blood sample or unauthorized access.";
            header("location:../bloodstock.php?error=".$error);
        }
    } else {
        header("location:../bloodstock.php");
    }
    mysqli_close($conn);
}
?>