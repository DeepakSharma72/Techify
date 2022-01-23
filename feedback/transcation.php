<!DOCTYPE html>
<?php 
    $sid = $_GET['sid'];
    $crsid = $_GET['crsid'];
    include '../config.php';
    $sqli = "SELECT * FROM crspurchased WHERE sid = $sid and crsid = $crsid";
    $resi = mysqli_query($conn,$sqli) or die("query failed132");
    if(mysqli_num_rows($resi)>0)
    {
        header('location: http://localhost/techify/profile.php');
    }
    
    $sql1 = "SELECT fname,lname FROM students WHERE sid = {$sid}";
    $sql2 = "SELECT it.price, it.course_name, inst.instfname FROM itcourses it inner join instructor inst on it.ins_id = inst.insid WHERE it.course_id = {$crsid}";
    $res1 = mysqli_query($conn,$sql1);
    $res2 = mysqli_query($conn,$sql2);
    $row1 = mysqli_fetch_assoc($res1);
    $row2 = mysqli_fetch_assoc($res2);
    $refno = mt_rand();
    date_default_timezone_set("Asia/Kolkata");
    $time = date("H:i:s");
    $dinak = date("Y-m-d"); 
?>

<head>
    <title>About us</title>
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        .purchase-head {
            font-family: 'Poppins', sans-serif;
            height: 100px;
            background-color: black;
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            color: wheat;
            font-weight: bolder;
            font-size: 1.4rem;
        }
        
        .logoT img {
            height: 98px;
            width: 380px;
        }
        
        .log-out {
            color: gold;
            border: 2px solid goldenrod;
            border-radius: 20px;
            padding: 8px;
        }
        
        .transaction {
            margin: auto;
            margin-top: 50px;
            width: 40vw;
            background-color: #f7f7f7;
            padding: 40px;
        }
        
        .right-tick {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .right-tick img {
            width: 70px;
            height: 70px;
        }
        
        .trans-status {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .trans-id {
            display: flex;
            justify-content: center;
            align-items: center;
            color: darkgray;
        }
        
        .tran-details {
            margin: auto;
            width: 30vw;
        }
        
        .tran-detail-cont {
            background-color: #c5c5c5;
            padding: 30px;
        }
        
        .final-msg {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            color: blue;
        }
    </style>
</head>
<div class="purchase-head">
    <div>
        <a href="../profile.php">PROFILE</a>
    </div>
    <div>
        <a href="../coursedetail.php?id=<?php echo $crsid?>">COURSE PAGE</a>
    </div>
    <div class="logoT">
        <img src="../Dimages/T.jpeg">
    </div>
    <div class="log-out">
        <a href="../Logout.php">Logout</a>
    </div>
</div>

<div class="transaction">
    <div class="right-tick">
        <img src="../Dimages/right-tick.jpg">
    </div>
    <div class="trans-status">
        <h2>Transaction Succesful</h2>
    </div>
    <div class="trans-id">
        <h4>Reference No: <?php echo $refno?></h4>
    </div>
    <div class="tran-details">
        <h4>Details:</h4>
        <div class="tran-detail-cont">
            <div><b>From</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $row1['fname'].' '.$row1['lname']; ?></div>
            <div><b>To</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Techify</div>
            <div><b>Amount</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $row2['price']?>Rs</div>
            <div><b>Trans Timing</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; : <?php echo $time?></div>
            <div><b>Trans Date</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $dinak?></div>
            <div><b>Course Name</b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: <?php echo $row2['course_name']?></div>
            <div><b>Teacher Name</b> &nbsp; &nbsp;&nbsp; &nbsp; : <?php echo $row2['instfname']?></div>
        </div>
    </div>
    <div class="final-msg">
        Transaction is done securely under supervision of Techify
    </div>
</div>

<?php 
    $datetime = date("Y-m-d H:i:s");
    $sql3 = "INSERT INTO crspurchased(sid,crsid,ttime,transid)
        VALUES({$sid},{$crsid},'{$datetime}','{$refno}')";
    mysqli_query($conn,$sql3) or die("Transcation Failed!");
?>