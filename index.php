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
        .invitaion {
            font-size: 1.5em;
            margin: 0 20px;
        }
        
        .course-head {
            font-size: 2rem;
            margin: 10px 0;
        }
        
        .courses-tab {
            display: flex;
            justify-content: space-evenly;
            margin: 30px 0;
            font-size: 2.4em;
            font-weight: bolder;
        }
        
        .courses-tab img {
            border-radius: 10px;
            height: 200px;
            width: 200px;
        }
        
        .courses-tab a {
            text-decoration: none;
            color: #ef1d1d;
            text-align: center;
        }
        
        .courses-tab a img {
            border: 4px solid #d1b100;
        }
        
        .courses-tab a :hover {
            transform: scale(1.1);
        }
        
        .stats {
            display: flex;
            justify-content: space-evenly;
            margin-top: 6rem;
            font-size: 2rem;
            color: black;
            font-weight: bolder;
        }
        
        .stats-data {
            border: 1px solid black;
            padding: 10px;
            border-radius: 34px;
            background-color: #fbf0f0;
        }
        
        .course-homepage {
            background-image: url(Dimages/code1.png);
            background-size: 100%;
            color: #d1b100;
        }
    </style>
</head>
<body>
<main class="course-homepage">
        <div class="invitaion">
            <h1>Welcome to Techify!</h1>
        </div>
        <hr>
        <div>
            <div class="course-head">
                <h1 align="center">Have a look at Our Courses!</h1>
            </div>
            <br>
            <hr>
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
            <hr>
            <div class="stats">
                <div class="stats-data">50+ Students</div>
                <div class="stats-data">50+ Instructor</div>
                <div class="stats-data">50+ courses sold</div>
            </div>
        </div>
    </main>
</body>
</html>

<?php 
    include 'footer.php';
?>