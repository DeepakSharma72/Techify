<!DOCTYPE html>
<head>
    <title>Techify</title>
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="DCSS/coursepages.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container">
    <?php
                        include "config.php";
                        session_start();
                        $Course_id = $_GET['id'];
                        $sid = $_SESSION['id'];
                        $sql = "SELECT itcourses.ins_id,itcourses.Course_id,itcourses.Course_Name,itcourses.Description,itcourses.Complexity,itcourses.Price,itcourses.course_img,itcourses.Medium,itcourses.Learning,itcourses.Requirement
                        FROM itcourses
                        LEFT JOIN category ON itcourses.category = category.category_id 
                        WHERE itcourses.Course_id = {$Course_id}";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                              $insid = $row['ins_id'];
                              $sql3 = "SELECT instfname,instlname,experience,insusername FROM instructor WHERE insid = {$insid}";
                              $res3 = mysqli_query($conn,$sql3) or die("instructor name not fetched");
                              $row3 = mysqli_fetch_assoc($res3);
                      ?>
        <div class="section1 black right">
            <div class="header">
                <h1><?php echo $row['Course_Name']; ?></h1>
                <h4>Description</h4>
                <p><?php echo $row['Description']; ?></p>
                <div class="rating">              
                    <div class="star">
                        <h5>4.5</h5>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="created">
                    <h6><b>Created by</b>&nbsp;&nbsp;<a href="#instructor"><?php echo $row3['instfname']." ".$row3['instlname'];?></a></h6>
                </div>
                <div class="complexity">
                    <h6>Complexity (<?php echo $row['Complexity']; ?>)</h6><br>
                    <i class="fas fa-globe"></i>
                    <h6>(<?php echo $row['Medium']; ?>)</h6>
                </div>
            </div>
        </div>
        <div class="section3 section1 right">
            <div class="info">
                <h3>What will you learn?</h3>
                <div class="left ">
                <?php echo $row['Learning']; ?>
                </div>
                
            </div>
        </div>
        <div class="section6 inst section1 right">
            <div class="company">
                <h4><b>Top companies following TECHIFY</b></h4>
                <div class="icons">
                    <i class="fab fa-microsoft"></i>
                    <i class="fab fa-apple"></i>
                    <i class="fab fa-google"></i>
                    <i class="fab fa-amazon"></i>
                    <i class="fab fa-facebook"></i>
                </div>
            </div>
        </div>
        <div class="section5 section1 right">
            <div class="requirement">
                <h3><u>Requirements</u></h3>
                <ul>
                <?php echo $row['Requirement']; ?>  
                </ul>
            </div>
        </div>
        <div class="section4 inst section1 right" id="instructor">
            <div class="about">
                <h3><b>About the instructor</b></h3>
                <div class="instructor-image">
                    <img src="Dimages/stud.jpg">
                    <h5><?php echo $row3['instfname']." ".$row3['instlname'];?></h5>
                    <h6>(Web developer)</h6>
                </div>
                <ul>
                    <li><i class="fas fa-star">&nbsp;4 star rating&nbsp;&nbsp;</i></li>
                    <li><i class="fas fa-user-friends">&nbsp;2 lakh+ students&nbsp;&nbsp;</i></li>
                    <li><i class="fas fa-certificate">&nbsp;<?php echo $row3['experience']?> years of experience&nbsp;&nbsp;</i></li>
                    <li><i class="fas fa-book">&nbsp;10+ online courses&nbsp;&nbsp;</i></li>
                    <li><i class="fab fa-youtube">&nbsp;<b>1M youtube subscribers</b>&nbsp;&nbsp;</i></li>
                </ul>
                <div class="about-instructor">
                    <?php 
                    $user = $row3['insusername'];
                    $sql5 = "SELECT insdec FROM instdescp WHERE username = '{$user}'";
                    // echo $sql5;
                    // die;
                    $res5 = mysqli_query($conn,$sql5) or die("unable to fetch instructor discription.");
                    $row5 = mysqli_fetch_assoc($res5); 
                    ?>
                    <p><h6>
                        <?php 
                            echo $row5['insdec'];
                        ?>
                        </h6></p>
                </div>
            </div>
        </div>
        <div class="section2 left">
            <div class="image">
            <img src="admin/upload/<?php echo $row['course_img']; ?>" alt="">
            </div>
            <div class="content">
                <h1><i class="fas fa-rupee-sign"> <?php echo $row['Price']; ?></i></h1>
            </div>
            <div class="buy">
                <div class="buy-now">
                    <?php 
                          $sql1 = "SELECT * FROM crspurchased WHERE sid = {$sid} and crsid = {$Course_id}";  
                          $res1 = mysqli_query($conn,$sql1) or die("Query Failed");
                          if(mysqli_num_rows($res1)>0)
                          {
                              $row1 = mysqli_fetch_assoc($res1);
                            if($row1['feedback'])
                            {
                                echo '<a class = "purchasing-link" href="feedback/feedback.php?sid='.$sid.'&crsid='.$Course_id.'">Change Your Feedback</a>';
                            }
                            else
                            echo '<a class = "purchasing-link" href="feedback/feedback.php?sid='.$sid.'&crsid='.$Course_id.'">Give Your Feedback</a>';
                          }
                          else
                          {
                            echo '<a class = "purchasing-link" href="feedback/transcation.php?sid='.$sid.'&crsid='.$Course_id.'">Buy Now</a>';
                          }
                    ?>  
                </div>
                <p>10-days money guarantee back</p>
            </div>
            <div class="heading">
                <p><b>Why this course?</b></p>
            </div>
            <div class="values">
                <div class="icons">
                    <i class="fas fa-video">&nbsp;&nbsp;&nbsp;&nbsp;50+ hours on-topic videos</i>
                    <i class="far fa-file">&nbsp;&nbsp;&nbsp;&nbsp;15+ articles</i>
                    <i class="fas fa-file-download">&nbsp;&nbsp;&nbsp;&nbsp;Resources are downladable</i>
                    <i class="fas fa-infinity">&nbsp;&nbsp;&nbsp;Unlimited access</i><br>
                    <i class="far fa-file-word">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignments</i>
                    <i class="fas fa-trophy">&nbsp;&nbsp;&nbsp;&nbsp;Certificate of completion</i>
                </div>
            </div>
        </div>
        <?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }
                        ?>
    </div>
</body>