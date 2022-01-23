<!DOCTYPE html>
<?php include 'newheader.php';
session_start();
$insid = $_SESSION['id'];
include '../config.php';
$sql1 = "SELECT * FROM instructor WHERE insid = {$insid}";
$res1 = mysqli_query($conn, $sql1) or die("Unable to fetch Details");
$row1 = mysqli_fetch_assoc($res1);
$sql2 = "SELECT count(*) FROM itcourses WHERE ins_id = {$insid}";
$res2 = mysqli_query($conn, $sql2) or die("unable to fetch courses count");
$row2 = mysqli_fetch_assoc($res2);
$sql3 = "SELECT COUNT(*) FROM crspurchased crs WHERE crsid IN (SELECT course_id FROM itcourses WHERE ins_id = {$insid});";
$res3 = mysqli_query($conn, $sql3) or die("unable to fetch student count");
$row3 = mysqli_fetch_assoc($res3);
?>

<head>
    <title>Techify</title>
    <link rel="stylesheet" type="text/css" href="dash.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        .corsheading {
            margin-left: 4px;
            background-color: wheat;
            border: 2px solid black;
            border-radius: 10px;
        }

        .corsheading div a {
            text-decoration: none;
            color: #0c16b3;
            font-size: 1.5rem;
            font-weight: bolder;
            font-family: 'Times New Roman', Times, serif;
        }

        .crs-purch-container {
            display: flex;
            justify-content: space-around;
            /* flex-direction: column; */

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section1">
            <div class="values">
                <div class="icon active" id="icon1" onclick="Show1()">
                    <p><i class="fas fa-house-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</p>
                </div>
                <div class="icon" id="icon2" onclick="Show2()">
                    <p><i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile</p>
                </div>
                <div class="icon" id="icon4" onclick="Show4()">
                    <p><i class="fas fa-question-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Help</p>
                </div>
                <div class="icon" id="icon5" onclick="Show5()">
                    <p><i class="fas fa-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Settings</p>
                </div>
                <div class="icon" id="icon6" onclick="Show6()">
                    <p><i class="fas fa-comment"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Intro</p>
                </div>
            </div>
        </div>

        <div class="section2" id="section2">
            <div class="info">
                <div class="dashboard">
                    <div class="table1 prop">
                        <i class="fas fa-users"></i>
                        <div class="counter"><?php echo $row3['COUNT(*)'] . '+' ?></div>
                        <h2>Students</h2>
                    </div>
                    <div class="table2 prop">
                        <i class="fas fa-laptop"></i>
                        <div class="counter"><?php echo $row2['count(*)'] . '+' ?></div>
                        <h2>Courses</h2>
                    </div>
                </div>
                <div>
                    <h2 align='center'>** Your Courses **</h2>
                    <?php
                    $sql4 = "SELECT course_name,Category,Medium,Complexity,Price FROM itcourses WHERE ins_id = {$insid} ORDER BY course_id DESC";
                    $res4 = mysqli_query($conn, $sql4) or die("unable to fetch course details");
                    if (mysqli_num_rows($res4) > 0) {
                        $ct = 1;
                        while ($row4 = mysqli_fetch_assoc($res4)) {
                            $cat = "Android Dev";
                            if ($row4['Category'] == 1) {
                                $cat = "ML/AI";
                            } else if ($row4['Category'] == 2) {
                                $cat = "Web Dev";
                            }
                    ?>
                            <div class="course-containers">
                                <div class="corsheading">
                                    <!-- <div><a href="#">1: Course heading(Category)<a></div> -->
                                    <div><a href="#"><?php echo $ct . ": " . $row4['course_name'] . "(" . $cat . ")"; ?><a></div>
                                    <div class="crs-purch-container">
                                        <div class="crs-prchase-data"><b>Medium: </b><?php echo $row4['Medium']; ?></div>
                                        <div class="crs-prchase-data"><b>Complexity: </b><?php echo $row4['Complexity']; ?></div>
                                        <div class="crs-prchase-data"><b>Price: </b><?php echo $row4['Price'] ?>Rs</div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                    <?php
                            $ct++;
                        }
                    } else {
                        echo "<div class='corsheading'><h4>Start Your Journey by Uploading the course!</h4></div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        $sql4 = "SELECT * FROM instructor WHERE insid = {$insid}";
        $res4 = mysqli_query($conn, $sql4) or die("unable to fetch courses count");
        $row4 = mysqli_fetch_assoc($res4);
        ?>
        <div class="section3" id="section3">
            <div class="sectionimage">
                <div class="image">
                    <img src="../Dimages/profuser.png">
                </div>
                <div class="info">
                    <h4>Welcome To <b>TECHIFY</b><br><?php echo $row4['instfname'] . ' ' . $row4['instlname'] ?></h4>
                    <h5><?php echo $row4['email'] ?></h5>
                </div>
            </div>

            <div class="informtion">
                <form action="dashboard-edit.php" method="post">
                    <div class="name rel pos">
                        <label for="f-name">First Name</label><br>
                        <input disabled type="text" name="f-name" id="f-name" value="<?php echo $row4['instfname'] ?>" placeholder="First Name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="name">SurName</label><br>
                        <input disabled type="text" name="l-name" id="l-name" value="<?php echo $row4['instlname'] ?>" placeholder="Last Name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="phone rel pos">
                        <label for="phone">Phone-No</label><br>
                        <input disabled type="number" name="phone" id="phone" value="<?php echo $row4['contact'] ?>" placeholder="+91 **********">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="mail rel pos margin">
                        <label for="email-address">Email</label><br>
                        <input disabled type="email" name="email-adddress" id="email-address" value="<?php echo $row4['email'] ?>" placeholder="name@example.com">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="c-name">City</label><br>
                        <input disabled type="text" name="c-name" id="c-name" value="<?php echo $row4['city'] ?>" placeholder="City Name">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="clg-name">Experience</label><br>
                        <input disabled type="number" name="clg-name" id="clg-name" value="<?php echo $row4['experience'] ?>" placeholder="Number of years">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="buttons">
                        <div class="text-center">
                            <a href="dashboard-edit.php" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="section5" id="section5">
            <div class="query">
            <h1>Have any Queries?</h1>
            <p>Get a free counselling session from our experts</p>
            </div>
            <div class="sol1">
            <div class="call">
                <div class="call-icon">
                    <i class="fas fa-phone-square-alt"></i>
                    <div class="tollfree">
                        <h5>Call us on our toll free number</h5>
                        <p>1800-196-8888</p>
                    </div>
                </div>
            </div>
            <div class="or">
                <h1>OR</h1>
            </div>
            </div>
            <div class="sol2">
                <div class="call">
                    <div class="call-icon">
                        <i class="fas fa-envelope"></i>
                        <div class="tollfree">
                            <h5>Email us on our personal email-id</h5>
                            <p>techify@gmail.com</p>
                        </div>
                    </div>
                </div>
                </div>
        </div>



        <div class="section6" id="section6">
            <form method="GET" action="dashboard-edit.php">
                <div class="heading">
                    <p align='center'><b>TECHIFY</b></p>
                    <p>Why Students Should Purchase Your Courses?</p>
                </div>
                <div class="area">
                    <textarea id="thoughts" class="thoughts" name="descp" rows="6" cols="90"></textarea>
                </div>
                <div>
                    <input type="submit" class="rev-submit" name="rev-submit" value="Submit Now">
                </div>
                <div class="image">
                    <img src="../Dimages/thoughts.jpg">
                </div>
            </form>
        </div>
    </div>

    <script>
        const counters = document.querySelectorAll('.counter');
        const speed = 500;

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const inc = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + inc);
                    setTimeout(updateCount, 1)
                } else {
                    count.innerText = target;
                }
            }
            updateCount();
        });

        function Show1(){
        document.getElementById('section3').style.display = "none";
        document.getElementById('section2').style.display = "block";
        document.getElementById('section6').style.display = "none";
        document.getElementById('section5').style.display = "none";
        document.getElementById('icon1').style.backgroundColor = "rgb(86, 226, 245)";
        document.getElementById('icon1').style.color = "black";
        document.getElementById('icon2').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon2').style.color = "white";
        document.getElementById('icon3').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon3').style.color = "white";
        document.getElementById('icon4').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon4').style.color = "white";
        document.getElementById('icon5').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon5').style.color = "white";
        document.getElementById('icon6').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon6').style.color = "white";
    }

    function Show2(){
        document.getElementById('section3').style.display = "block";
        document.getElementById('section2').style.display = "none";
        document.getElementById('section6').style.display = "none";
        document.getElementById('section5').style.display = "none";
        document.getElementById('icon2').style.backgroundColor = "rgb(86, 226, 245)";
        document.getElementById('icon2').style.color = "black";
        document.getElementById('icon1').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon1').style.color = "white";
        document.getElementById('icon3').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon3').style.color = "white";
        document.getElementById('icon4').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon4').style.color = "white";
        document.getElementById('icon5').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon5').style.color = "white";
        document.getElementById('icon6').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon6').style.color = "white";
    }

    function Show4(){
        document.getElementById('section3').style.display = "none";
        document.getElementById('section2').style.display = "none";
        document.getElementById('section5').style.display = "block";
        document.getElementById('section6').style.display = "none";
        document.getElementById('icon2').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon2').style.color = "white";
        document.getElementById('icon1').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon1').style.color = "white";
        document.getElementById('icon3').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon3').style.color = "white";
        document.getElementById('icon5').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon5').style.color = "white";
        document.getElementById('icon4').style.backgroundColor = "rgb(86, 226, 245)";
        document.getElementById('icon4').style.color = "black";
        document.getElementById('icon6').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon6').style.color = "white";
    }

    function Show6(){
        document.getElementById('section3').style.display = "none";
        document.getElementById('section2').style.display = "none";
        document.getElementById('section5').style.display = "none";
        document.getElementById('section6').style.display = "block";
        document.getElementById('icon2').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon2').style.color = "white";
        document.getElementById('icon1').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon1').style.color = "white";
        document.getElementById('icon3').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon3').style.color = "white";
        document.getElementById('icon4').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon4').style.color = "white";
        document.getElementById('icon5').style.backgroundColor = "rgb(2, 2, 68)";
        document.getElementById('icon5').style.color = "white";
        document.getElementById('icon6').style.backgroundColor = "rgb(86, 226, 245)";
        document.getElementById('icon6').style.color = "black";
    }

    </script>
</body>