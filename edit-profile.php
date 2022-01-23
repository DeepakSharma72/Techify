<!DOCTYPE html>
<?php include 'newheader.php'?>
<head>
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="DCSS/prof.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<?php 
    if(isset($_POST['submit']))
    {
        $id1 = $_SESSION['id'];
        $fname1 = $_POST['fname'];
        $lname1 = $_POST['lname'];
        $Gender1 = $_POST['Gender'];
        $mail1 = $_POST['studemail'];
        $city1 = $_POST['studcityname'];
        $college1 = $_POST['collegename'];

        include 'config.php';
        $sql1 = "UPDATE students SET fname = '{$fname1}', lname = '{$lname1}', Gender = '{$Gender1}', studemail = '{$mail1}', studcityname = '{$city1}', collegename = '{$college1}' WHERE sid = {$id1}";
        mysqli_query($conn,$sql1) or die('query failed');
        $_SESSION['name'] = $fname1;
        header('location: http://localhost/techify/profile.php');
    }
?>

<?php 
    // session_start();
    $id = $_SESSION['id'];
    include 'config.php';
    $sql = "SELECT * FROM students WHERE sid = {$id}";
    $result = mysqli_query($conn,$sql) or die('query failed');
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $Gender = $row['Gender'];
    $mail = $row['studemail'];
    $city = $row['studcityname'];
    $college = $row['collegename'];
?>
<body>
    <div class="section1">
        <div class="image">
            <img src="Dimages/profuser.png">
        </div>
        <div class="info">
            <h4>Welcome,<br><?php echo $row['username']?></h4>
            <h5><?php echo $mail?></h5>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </div>
    <div class="section2">
        <h4>Profile</h4>
        <div class="information">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="name rel pos">
                    <label for="fname">First Name</label><br>
                    <input type="text" name="fname" id="f-name" value = "<?php echo $fname?>">
                    <i class="fas fa-user"></i>
                </div>
                <div class="name rel pos">
                    <label for="lname">SurName</label><br>
                    <input type="text" name="lname" id="l-name" value = "<?php echo $lname?>">
                    <i class="fas fa-user"></i>
                </div>
                <!-- <div class="phone rel pos">
                    <label for="phone">Phone-No</label><br>
                    <input type="number" name="phone" id="phone" placeholder="+91 **********">
                    <i class="fas fa-phone"></i>
                </div> -->
                <div class="mail rel pos margin">
                    <label for="studemail">Email</label><br>
                    <input type="email" name="studemail" id="email-address" value = "<?php echo $mail?>">
                    <i class="fas fa-envelope"></i>
                </div>
                <!-- <div class="address rel pos">
                    <label for="address">Address</label><br>
                    <input type="" name="adddress" id="address" placeholder="Enter your location">
                    <i class="fas fa-map-marker"></i>
                </div> -->
               
                <div class="name rel pos">
                    <label for="studcityname">City</label><br>
                    <input type="text" name="studcityname" id="c-name" value="<?php echo $city?>">
                    <i class="fas fa-city"></i>
                </div>
                <div class="course-name rel pos margin">
                    <label for="Gender">Gender</label><br>
                    <input type="text" name="Gender" id="course-name" value="<?php echo $Gender?>">
                    <i class="fas fa-user"></i><br>
                </div>
                <div class="name rel pos">
                    <label for="collegename">College/University</label><br>
                    <input type="text" name="collegename" id="clg-name" value="<?php echo $college?>">
                    <i class="fas fa-university"></i>
                </div>
                <!-- <div class="year rel pos">
                    <label for="year">Graduation year</label><br>
                    <input type="number" name="year" id="year" placeholder="20**">
                    <i class="fas fa-user-graduate"></i>
                </div> -->
                <div class="buttons">
                    <div class="text-center">
                        <button  type="submit" name = 'submit' style = "width:100px" class="btn btn-danger" id="courseSubmitbtn" name="courseSubmitbtn">Save</button>
                        <!-- <a href="edit-profile.php" style="width: 100px;" class="btn btn-secondary">Edit</a> -->
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <div class="section3">
        <div class="icons">
            <!-- <img src="Dimages/logo.jpeg"> -->
        </div>
    </div>
</body>