<!DOCTYPE html>
<?php include 'newheader.php' ?>

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
    <style>
        .corsheading{
            margin-left: 4px;
            background-color: wheat;
            border: 2px solid black;
            border-radius: 10px;
        }
        .corsheading div a{
          text-decoration: none;   
          color: #0c16b3;
          font-size: 1.5rem;
          font-weight: bolder;
          font-family:'Times New Roman', Times, serif ;
        }
        .crs-purch-container{
            display: flex;
            justify-content: space-around;
            /* flex-direction: column; */

        }
    </style>
</head>

<?php
$id = $_SESSION['id'];
include 'config.php';
$sql = "SELECT * FROM students WHERE sid = {$id}";
$result = mysqli_query($conn, $sql) or die('query failed');
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
            <h4>Welcome,<br><?php echo strtoupper($fname) ?></h4>
            <h5><?php echo $mail ?></h5>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </div>
    <div class="section2">
        <h4>Profile</h4>
        <div class="information">
            <form action="#" method="post">
                <div class="name rel pos">
                    <label for="f-name">First Name</label><br>
                    <input disabled type="text" name="f-name" id="f-name" value="<?php echo $fname ?>">
                    <!-- <i class="fas fa-user"></i> -->
                </div>
                <div class="name rel pos">
                    <label for="name">SurName</label><br>
                    <input disabled type="text" name="l-name" id="l-name" value="<?php echo $lname ?>">
                    <i class="fas fa-user"></i>
                </div>
                <!-- <div class="phone rel pos">
                    <label for="phone">Phone-No</label><br>
                    <input type="number" name="phone" id="phone" placeholder="+91 **********">
                    <i class="fas fa-phone"></i>
                </div> -->
                <div class="mail rel pos margin">
                    <label for="email-address">Email</label><br>
                    <input disabled type="email" name="email-adddress" id="email-address" value="<?php echo $mail ?>">
                    <i class="fas fa-envelope"></i>
                </div>
                <!-- <div class="address rel pos">
                    <label for="address">Address</label><br>
                    <input type="" name="adddress" id="address" placeholder="Enter your location">
                    <i class="fas fa-map-marker"></i>
                </div> -->

                <div class="name rel pos">
                    <label for="c-name">City</label><br>
                    <input disabled type="text" name="c-name" id="c-name" value="<?php echo $city ?>">
                    <i class="fas fa-city"></i>
                </div>
                <div class="course-name rel pos margin">
                    <label for="course-name">Gender</label><br>
                    <input disabled type="text" name="course-name" id="course-name" value="<?php echo $Gender ?>">
                    <i class="fas fa-user"></i><br>
                </div>
                <div class="name rel pos">
                    <label for="clg-name">College/University</label><br>
                    <input disabled type="text" name="clg-name" id="clg-name" value="<?php echo $college ?>">
                    <i class="fas fa-university"></i>
                </div>
                <!-- <div class="year rel pos">
                    <label for="year">Graduation year</label><br>
                    <input type="number" name="year" id="year" placeholder="20**">
                    <i class="fas fa-user-graduate"></i>
                </div> -->
                <div class="buttons">
                    <div class="text-center">
                        <!-- <button  type="submit" class="btn btn-danger" id="courseSubmitbtn" name="courseSubmitbtn">Save</button> -->
                        <a href="edit-profile.php" style="width: 100px;" class="btn btn-secondary">Edit</a>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <div class="section3">
        <div class="head">
            <br>
            <h3 align="center">** Courses You Purchased **</h3>
        </div>
        <?php 
           $sql1 = "SELECT cr.crsid,it.Course_Name,cr.ttime,it.Medium,it.Complexity,it.Price,it.Category
                    FROM crspurchased cr INNER JOIN itcourses it ON it.Course_id = cr.crsid
                    WHERE cr.sid = {$id} ORDER BY cr.ttime DESC";
            $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
            if(mysqli_num_rows($result1) > 0)
            { $ct = 1;
                while($row = mysqli_fetch_assoc($result1))
                { 
                //     print_r($row);
                // die();
                    $cat = "Android Dev";
                    if($row['Category'] == 1)
                    {
                        $cat = "ML/AI";
                    }
                    else if($row['Category'] == 2)
                    {
                        $cat = "Web Dev";
                    }
        ?>
        <div class="course-containers">
            <div class="corsheading">
                <!-- <div><a href='coursedetail.php?id=<?php //echo 6; ?>'>1.Course heading(Category)<a></div>
                <div class="crs-prchase-data"><b>Purchased Timing:</b> 12:00:00-12/12/2021</div>
                <div class="crs-purch-container">
                <div class="crs-prchase-data"><b>Medium:</b>English</div>
                <div class="crs-prchase-data"><b>Complexity:</b>Hard</div>
                <div class="crs-prchase-data"><b>Price:</b>100Rs</div> -->
                <div><a href='coursedetail.php?id=<?php echo $row['crsid'];?>'><?php echo $ct.': '.$row['Course_Name'].'('.$cat.')'?><a></div>
                <div class="crs-prchase-data"><b>Purchased Timing: </b><?php echo $row['ttime']?></div>
                <div class="crs-purch-container">
                <div class="crs-prchase-data"><b>Medium: </b><?php echo $row['Medium'] ?></div>
                <div class="crs-prchase-data"><b>Complexity: </b><?php echo $row['Complexity'] ?></div>
                <div class="crs-prchase-data"><b>Price: </b><?php echo $row['Price'] ?>Rs</div>
                </div>
            </div>
            <hr>
        </div>
            <!-- <div class="corsheading">2. <a href="#">course heading</a></div> -->
        <?php 
              $ct++;  
                }
            }
            else
            {
               echo  '<div class="corsheading">No Courses Purchased Yet!</div>';
            }
        ?>
    </div>
</body>