<?php 
session_start();
session_unset();
session_destroy();
include 'config.php';
header('location: '.$hostname.'/home/home.php');
?>