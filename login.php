<!DOCTYPE html>
<?php
if (isset($_POST['submit'])) {
    $role = $_POST['role-issued'];
    $username = $_POST['user-name'];
    $password = $_POST['password'];
    // $conn = mysqli_connect('localhost', 'root', '', 'techify') or die("Connection Failed");
    include 'config.php';
    $sql;
    if ($role == '1') {
        $sql = "SELECT sid,fname,password FROM Students WHERE username = '{$username}' and password = '{$password}'";
    } else{
        $sql = "SELECT insid,instfname,inspassword FROM instructor WHERE insusername = '{$username}' and inspassword = '{$password}'";
        // $sql = "SELECT insid,instfname,inspassword FROM instructor WHERE insusername = '{$username}'and inspassword = '{$password}'";
    }
    // echo $sql;
    // die;
    $res = mysqli_query($conn, $sql) or die("query filed1111");
   
    // echo $res;
    // die;
    if (!$res or mysqli_num_rows($res)==0) {

        $alert = "<script>alert('Wrong Username or Password!')</script>";
        echo $alert;
        // header('location: http://localhost/techify/login.php');
    } else {
        $row = mysqli_fetch_assoc($res);
        session_start();
        $_SESSION['role'] = $role;
        if ($role == 1) {
            $_SESSION['username'] =  $username;
            $_SESSION['name'] = $row['fname'];
            $_SESSION['id'] = $row['sid'];
        } else {
            $_SESSION['username'] =  $username;
            $_SESSION['name'] = $row['instfname'];
            $_SESSION['id'] = $row['insid'];
        }
        header('location: http://localhost/techify/index.php');
    }
}
?>


<head>
    <title>Techify</title>
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="DCSS/user.css">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login-form">
        <h1>Login Form</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="user">
                <label for="user-name">Username</label><br>
                <input type="text" name="user-name" id="user-name" placeholder="Username"><br>
                <i class="fas fa-user"></i><br>
            </div>
            <div class="pass">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Password"><br>
                <i class="fas fa-lock"></i><br>
            </div>
            <div class="role">
                <h3>Role</h3>
                <select name="role-issued">
                    <option disabled selected>Choose your role</option>
                    <option value="1">Student</option>
                    <option value="2">Instructor</option>
                </select>
            </div>
            <div class="btn">
                <button name='submit' type="submit">Login</button>
            </div>
            <div class="new-user">
                <p>New to Techify?</p><a href="studsign.php">Create Account</a>
            </div>
        </form>
    </div>
</body>

<script>

</script>