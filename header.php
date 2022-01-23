<?php 
session_start();
if(!isset($_SESSION['role']))
{
    header('location: http://localhost/techify/home/home.php');
}
else
{
    $role = $_SESSION['role'];
    $name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <title>Techify</title>
        <!-- header styling -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        
        .cont-1 {
            display: flex;
            height: 100px;
            background-color: black;
            color: wheat;
        }

        .cont-1 img{
            height: 100px;
        }
        
        .head-cont {
            display: block;
            width: 100%;
        }
        
        .up-cont {
            display: flex;
            height: 50px;
            align-items: center;
            justify-content: space-evenly;
            font-family: 'Times New Roman', Times, serif;
        }
        
        .up-cont input {
            font-size: 30px;
            border-radius: 10px;
        }
        
        #search-bar {
            width: 600px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid #f3a719;
            color: black;
            height: 40px;
        }
        
        #submit-bar {
            width: 150px;
            font-size: 23px;
            margin-left: 15px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid #f3a719;
            margin: 15px;
            padding: 5px;
        }

        .header-item {
            margin-top: 5px;
        }

        .header-item input{
            font-size: 20px;
            cursor: pointer;
        }
        
        i{
            position: relative;
            transform: translateX(-590px);
            color: rgb(97, 200, 241);
        }

        .header-item a {
            text-decoration: none;
            color: goldenrod;
            border: 2px solid gold;
            padding: 6px;
            font-weight: bolder;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            border-radius: 24px;
        }
        
        .header-item :hover {
            color: gold;
        }
        
        .down-cont {
            display: flex;
            align-items: baseline;
            justify-content: space-evenly;
            font-size: x-large;
            font-weight: bolder;
            /* background-color: black; */
            margin-top: 10px;
        }
        
        .nav-item a {
            /* background-color: bisque; */
            color: wheat;
            padding: 8px;
            text-decoration: none;
        }
        
        .nav-item :hover {
            color: #ad8d51;
            text-decoration: double;
        }

        .nav-item:active{
            color: #ad8d51;
        }
    </style>
</head>
<body>
    <header>
        <div class="cont-1">
            <img src="Dimages/logo.jpeg">
            <div class="head-cont">
                <div class="up-cont">
                    <div class="header-item ">
                       <form action="search.php" method="GET">
                       <input type="search" id="search-bar" placeholder="search for anything" name="header-search">
                        <i class="fas fa-search"></i>
                        <input type="submit" id="submit-bar" value="Search" name="header-submit">
                       </form>
                    </div>
                    <div class="header-item">
                        <?php 
                        $name = strtoupper($name);
                           echo  '<a href="logout.php"> Logout </a>';
                        ?>
                    </div>
                </div>
                <div class="down-cont">
                    <?php
                    echo '<div class="nav-item"><a href="index.php">Home</a></div>';
                    if($role == 1)
                    {
                        echo '<div class="nav-item"><a href="category.php">Courses</a></div>';
                        echo '<div class="nav-item"><a href="profile.php">Profile</a></div>';
                    } 
                    else
                    {
                        echo '<div class="nav-item"><a href="admin/uploadcourses.php">Upload Course</a></div>';
                        echo '<div class="nav-item"><a href="thoughts/dashboard.php">Dashboard</a></div>';

                    }
                    echo '<div class="nav-item"><a href="aboutus.php">About Us</a></div>';
                    echo '<div class="nav-item"><a href="contact.php">Contact Us</a></div>';
                    // echo '<div class="nav-item"><a href="#">Feedback</a></div>';
                    ?>
                </div>
            </div>
        </div>
    </header>
</body>
</html>

<?php }?>