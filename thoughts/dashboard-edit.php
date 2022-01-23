<?php 
session_start();
include '../config.php';
$insid = $_SESSION['id'];
if(isset($_GET['rev-submit']))
{
    $descp = $_GET['descp'];
    $user = $_SESSION['username'];
    $sqli = "UPDATE instdescp SET insdec = '{$descp}' WHERE username  = '{$user}'";
    // echo $sqli;
    // die();
    mysqli_query($conn,$sqli) or die("review not feeded");
    header('location: http://localhost/techify/thoughts/dashboard.php');
}

if(isset($_POST['courseSubmitbtn']))
{
    $mail = $_POST['email-adddress'];
    $city = $_POST['c-name'];
    $lname = $_POST['l-name'];
    $fname = $_POST['f-name'];
    $exp = $_POST['experience'];
    $sql = "UPDATE instructor SET experience = {$_POST['experience']},contact = {$_POST['phone']},instfname = '{$fname}',instlname = '{$lname}',city = '{$city}',email = '{$mail}' WHERE insid = {$insid}";
    mysqli_query($conn,$sql) or die("data - not updated");
    $_SESSION['name'] = $fname;
    header('location:http://localhost/techify/thoughts/dashboard.php');
}

?>

<!DOCTYPE html>
<?php include 'newheader.php' ?>

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
        .section3 .btn {
            margin-left: 273px;
            width: 98px;
        }
    </style>
</head>

<?php 
$sql1 = "SELECT * FROM instructor WHERE insid = {$insid}";
$res1 = mysqli_query($conn, $sql1) or die("unable to fetch courses count");
$row1 = mysqli_fetch_assoc($res1);
// print_r($row1);
// die();
?>

<body>
    <div class="container">
        <div class="section1">
            <div class="values">
                <div class="icon" id="icon1" onclick="Show1()">
                    <p><i class="fas fa-house-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</p>
                </div>
                <div class="icon active" id="icon2" onclick="Show2()">
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
        <div class="section3">
            <div class="sectionimage">
                <div class="image">
                    <img src="../Dimages/profuser.png">
                </div>
                <div class="info">
                    <h4>Welcome To <b>TECHIFY</b><br>Instructor name</h4>
                    <h5>instructoremail</h5>
                </div>
            </div>
            <div class="informtion">
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="name rel pos">
                        <label for="f-name">First Name</label><br>
                        <input type="text" name="f-name" id="f-name" value = "<?php echo $row1['instfname']?>" placeholder="First Name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="name">SurName</label><br>
                        <input type="text" name="l-name" id="l-name" value = "<?php echo $row1['instlname']?>" placeholder="Last Name">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="phone rel pos">
                        <label for="phone">Phone-No</label><br>
                        <input type="number" name="phone" id="phone" value = "<?php echo $row1['contact']?>" placeholder="+91 **********">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="mail rel pos margin">
                        <label for="email-address">Email</label><br>
                        <input type="email" name="email-adddress" id="email-address" value = "<?php echo $row1['email']?>" placeholder="name@example.com">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="c-name">City</label><br>
                        <input type="text" name="c-name" id="c-name" value="<?php echo $row1['city']?>"  placeholder="City Name">
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="name rel pos">
                        <label for="clg-name">Experience</label><br>
                        <input type="number" name="experience" id="clg-name" value="<?php echo $row1['experience']?>" placeholder="Number of years">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="buttons">
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger" id="courseSubmitbtn" name="courseSubmitbtn">Save</button>
                        </div>
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
        </script>
</body>