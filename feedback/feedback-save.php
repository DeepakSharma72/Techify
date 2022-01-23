<?php 
 $sid = $_GET['sid'];
 $crsid = $_GET['crsid'];
 include '../config.php';
 $rating = $_POST['rating'];
 $feedback = $_POST['txt-feed'];
 $sql = "UPDATE crspurchased SET rating = {$rating}, feedback = '{$feedback}' WHERE sid = {$sid} and crsid = '{$crsid}'";
 mysqli_query($conn,$sql) or die("feedback not updated!");
 header('location: http://localhost/techify/coursedetail.php?id='.$crsid);
?>