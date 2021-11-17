<?php 
session_start();
// $file_name = $_FILES['fileToUpload']['name'];
// $file_temp = $_FILES['fileToUpload']['tmp_name'];
// move_uploaded_file($file_temp,"upload/".$file_name);


if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
      print_r($errors);
      die();
    }
  }
 


$insid = $_SESSION['id'];
$cname = $_POST['course_name'];
$cdesc = $_POST['course_desc'];
$ctime = $_POST['time'];
$cduration = $_POST['duration'];
$cmodules = $_POST['modules'];
$cprice = $_POST['price'];
$category = $_POST['category'];
$complexity = $_POST['complexity'];
$cmedium = $_POST['medium'];
$clearn = $_POST['learnings'];
$creq = $_POST['requirements'];

include 'config.php';
$sql = "INSERT INTO itcourses(Course_Name,Description,Time,Duration,Modules,Price,Category,Complexity,course_img,Medium,Learning,Requirement,ins_id)
VALUES('{$cname}','{$cdesc}',{$ctime},{$cduration},{$cmodules},{$cprice},{$category},'{$complexity}','{$file_name}','{$cmedium}','{$clearn}','{$creq}',{$insid})";

$sql1 = "UPDATE category SET course = course + 1 WHERE category_id = {$category}";
mysqli_query($conn,$sql) or die('query failed');
mysqli_query($conn,$sql1) or die('query failed');
// echo '<h1>Course Succesfuly uploaded</h1>';
header('location: http://localhost/techify/index.php');
?>

