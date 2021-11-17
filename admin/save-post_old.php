<?php
  include "config.php";
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
  session_start();
  $title = mysqli_real_escape_string($conn, $_POST['course_title']);
  $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $time = mysqli_real_escape_string($conn, $_POST['Time']);
  $duration = mysqli_real_escape_string($conn, $_POST['Duration']);
  $modules = mysqli_real_escape_string($conn, $_POST['Module']);
  $complexity = mysqli_real_escape_string($conn, $_POST['Complexity']);
  $price = mysqli_real_escape_string($conn, $_POST['Price']);
  $sql = "INSERT INTO itcourses(Course_Name, Description,Time,Category,Duration,Modules,Complexity,Price,course_img)
          VALUES('{$title}','{$description}',{$time},{$category},{$duration},{$modules},'{$complexity}',{$price},'{$file_name}');";
  $sql .= "UPDATE category SET course = course + 1 WHERE category_id = {$category}";

  if(mysqli_multi_query($conn, $sql)){
    // header("location: {$hostname}/admin/course.php");
    header("location: {$hostname}/category.php");
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>";
  }

?>
	