<?php 
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Home page styling  -->
     <style>
         *{
             margin: 0;
             padding: 0;
             box-sizing: border-box;
         }

        .welcome {
            /* background-color: rgb(244, 245, 248); */
            font-size: 1.5em;
            /* margin: 0 0px; */
            height: 18rem;
            background-image: url('Dimages/coursebg.jpg');
            background-size: cover;
        }

        .invitaion{
            padding: 15px;
        }

        .techify{
            padding: 15px;
            margin: 20px;
            float: left;
            width: 70%;
            border: 1px solid white;
            background-color: white;
            height: 230px;
            width: 400px;
            color: black;
        }
        .invitaion{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .invitation .image{
            width: 100%;
        }

        .image img{
            height: 270px;
            width: 80%;
            /* float: right; */
            margin-top: 0px; 
        }
        
        .course-head {
            font-size: 1rem;
            margin: 10px 0;
            text-align: center;
            justify-content: center;
            text-decoration: underline;
        }

        .category{
            margin: 20px;
            font-size: medium;
            color: black;
        }
        
        .courses-tab {
            display: flex;
            justify-content: space-evenly;
            margin: 30px 0;
            font-size: 2.2em;
            font-weight: bolder;
        }
        
        .courses-tab img {
            border-radius: 10px;
            height: 200px;
            width: 200px;
        }
        
        .courses-tab a {
            text-decoration: none;
            color: #111010;
            text-align: center;
        }
        
        .courses-tab a img {
            border: 4px solid #d1b100;
        }
        
        .courses-tab a :hover {
            transform: scale(1.1);
            transition: all 0.5s ease-in;
        }

        .performance{
            background-color: black;
            padding: 15px;
            filter: brightness(200%);
            padding-bottom: 30px;
        }

        .performance p{
            color: white;
            font-size: 30px;
            margin-left: 30px;
        }
        
        .stats {
            display: flex;
            justify-content: space-evenly;
            margin-top: 2rem;
            font-size: 2rem;
            color: black;
            font-weight: bolder;
        }
        
        .stats-data {
            padding: 10px;
            border-radius: 34px;
            background-color: #fbf0f0;
        }
        
        .course-homepage {
            background-size: 100%;
            color: #062ddd;
        }
        #name-inv{
            font-size: 40px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-weight: bolder;
        }
        .index-recentcourses{
            text-decoration: none;
            font-size: 1.6rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        .index-recentcourses a{
            color: blue;
            font-weight: bold;
            font-style: italic;
            /* text-decoration: ; */
        }
    </style>
</head>
<body>
<main class="course-homepage">
    <div class="welcome">
        <div class="invitaion">
            <div class="techify">
                <h3><b>Techify Online Course Selling Platform!</b></h3><br>
                <p>We provide the best courses. No need to look here and there now.</p>
                <br>
                <h5>Explore More</h5>
            </div>
            <div id="name-inv"><?php echo 'Techify welcomes you,  <br>  '.$name?></div>
            <!-- <div class="image">
                <img src="Dimages/coursebg.jpg">
            </div> -->
        </div>
    </div>
    <div class="contents">
        <div class="course-head">
            <h1 >Our Courses!</h1>
        </div>
        <br>
        <div class="category">
            <h2>Top Categories</h2>
        </div>
        <div class="courses-tab">
            <a href="#">
                <figure>
                    <img src="Dimages/ml-ai.jpg">
                    <figcaption>ML/AI </figcaption>
                </figure>
            </a>
            <a href="#">
                <figure>
                    <img src="Dimages/web.jpeg">
                    <figcaption>Web</figcaption>
                </figure>
            </a>
            <a href="#">
                <figure>
                    <img src="Dimages/android.jpeg">
                    <figcaption>Android</figcaption>
                </figure>
            </a>
        </div>

        <br>
        <?php 
        // include 'recentcourses.php'
        ?>
        <?php include 'config.php';
                $sql1 = "SELECT count(*) FROM Students";
                $sql2 = "SELECT count(*) FROM instructor";
                $sql3 = "SELECT count(*) FROM itcourses";
                $sql3 = "SELECT count(*) FROM itcourses";
                $sql4 = "SELECT count(*) FROM crspurchased";
                $res1 = mysqli_query($conn,$sql1);
                $res2 = mysqli_query($conn,$sql2);
                $res3 = mysqli_query($conn,$sql3);
                $res4 = mysqli_query($conn,$sql4);
                $nstud = mysqli_fetch_assoc($res1); 
                $ninst = mysqli_fetch_assoc($res2); 
                $ncourse = mysqli_fetch_assoc($res3); 
                $ncrssold = mysqli_fetch_assoc($res4); 
        ?>
        <div class="index-recentcourses">
        &nbsp;&nbsp;<a href="recentcourses.php">Have a look at our Latest Course</a>
            <a href="popular-courses.php"> Have a look at our Popular Course</a>&nbsp;&nbsp;
        </div>
        <div class="performance">
            <p>Look at Our recent performance</p>
            <div class="stats">
                <div class="stats-data"><?php  echo $nstud['count(*)']?>+ Students enrolled</div>
                <div class="stats-data"><?php echo $ninst['count(*)']?>+ Instructors</div>
                <div class="stats-data"><?php echo $ncourse['count(*)']?>+ courses available</div>
                <div class="stats-data"><?php echo $ncrssold['count(*)']?>+ courses sold</div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

<?php 
    include 'footer.php';
?>