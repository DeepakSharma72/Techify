<?php include 'newheader.php';
  include 'config.php';
if(isset($_POST['Submit-cont']))
{
    $cont = $_POST['experience'];
    $sql = "INSERT INTO complaints(id,role,containt) VALUES({$_SESSION['id']},{$role},'{$cont}')";
    mysqli_query($conn,$sql) or die("Query Failed123");
    header('location: http://localhost/techify/index.php');
}
?>
<!DOCTYPE html>
<head>
    <title>Techify</title>
    <link rel="stylesheet" type="text/css" href="DCSS/reach.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="head">
        <p><b>Want to reach us or contact us?</b></p>
        <h6>Just follow the steps and u will be there!!</h6>
        <h7>We will try to resolve your queries as soon as possible....</h7>
    </div>
    <?php 
    $sql = "";
    if($role == 1)
    {
        $sql = "SELECT fname,lname,username,studemail FROM students WHERE sid = {$_SESSION['id']}";
    }
    else
    {
        $sql = "SELECT instfname,instlname,email,insusername FROM instructor WHERE insid = {$_SESSION['id']}";
    }
    // echo $sql;
    // die;
    $res = mysqli_query($conn,$sql) or die("Query Failed");
    $row = mysqli_fetch_assoc($res);
    $fn = '';
    $ln = '';
    $mail = '';
    $user = '';
    $member = '';
    if($role == 1)
    {
        $member = 'Student';
        $fn = $row['fname'];
        $ln = $row['lname'];
        $user = $row['username'];
        $mail = $row['studemail'];
    }
    else
    {
        $member = 'Instructor';
        $fn = $row['instfname'];
        $ln = $row['instlname'];
        $user = $row['insusername'];
        $mail = $row['email'];
    }
    ?>
    <div class="container">
        <div class="contact">
            <h4>Send us your request</h4>
            <div class="information">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="name rel pos">
                        <label for="name">Name</label><br>
                        <input disabled type="text" name="name" id="name" value = "<?php echo $fn.' '.$ln;?>" placeholder="Full Name">
                        <i class="fas fa-user"></i>
                    </div> 
                    <div class="phone rel pos">
                        <label for="phone">username</label><br>
                        <input disabled type="text" name="phone" id="phone" value = "<?php echo $user;?>"  placeholder="+91 **********">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="mail rel pos margin">
                        <label for="email-address">Email</label><br>
                        <input disabled type="email" name="email-adddress" id="email-address" value = "<?php echo $mail;?>" placeholder="name@example.com">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="course-name rel pos margin">
                        <label for="role">Role</label><br>
                        <input disabled type="text" name="role" id="course-name" value="<?php echo $member; ?>" placeholder="Course Name">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="reviews">
                        <p>Message</p>
                        <textarea name="experience" rows="3" cols="55" placeholder="Write your query here">
                        </textarea>
                    </div>
                    <div class="btn rel">
                        <button type="submit" name  = "Submit-cont" >SEND US</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="reach">
            <div class="heading">
                <p>Reach us</p>
            </div>
            <div class="location">
                <a href="https://www.google.co.in/maps/place/National+Institute+of+Technology+Delhi/@28.8429845,
                77.1023542,17z/data=!3m1!4b1!4m5!3m4!1s0x390d1b1923ada2e3:0x1169930518add2fe!8m2!3d28.8429798!4d77.
                1045429"><i class="fas fa-map-marked-alt" target="_blank"></i></a>
                <h4>NIT Delhi</h4><br>
                <h5>Narela,New Delhi</h5>
            </div>
            <div class="location phone">
                <i class="fas fa-phone-volume"></i>
                <h4>+91 98564-88888</h4>
            </div>
            <div class="location phone">
                <a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp-square"></i></a>
                <h4>+91 98564-99999</h4>
            </div>
            <div class="location phone email">
                <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><i class="fas fa-envelope"></i></a>
                <h5>techify@gmail.com</h5>
            </div>
            <div class="icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram-square"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-github"></i>
            </div>
        </div>
    </div>
    <br>
    <br>
</body>


<?php include 'Footer.php'?>