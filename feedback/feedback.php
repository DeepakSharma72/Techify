<!DOCTYPE html>

<?php 
$sid = $_GET['sid'];
$crsid = $_GET['crsid'];
?>

<head>
    <title>Techify</title>
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('feedback.png');
        }

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

        .feed-cont {
            margin: 60px auto;
            background-color: #2f7a95;
            color: wheat;
            display: flex;
            width: 40vw;
            flex-direction: column;
            padding: 30px;
            border-radius: 30px;
        }

        .rat-cont {
            display: flex;
            justify-content: space-around;
            font-size: 20px;
            /* background-color: aqua; */
            padding: 20px;
        }

        .rat-cont input {
            font-size: 20px;
        }

        .submit-feed {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .submit-feed input {
            font-size: 20px;
            color: #2f7a95;
            background-color: bisque;
            font-weight: bold;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="purchase-head">
        <div>
            <a href="../profile.php">PROFILE</a>
        </div>
        <div>
            <a href="../coursedetail.php?id=<?php echo $crsid ?>">COURSE PAGE</a>
        </div>
        <div class="logoT">
            <img src="../Dimages/T.jpeg">
        </div>
        <div class="log-out">
            <a href="../Logout.php">Logout</a>
        </div>
    </div>
    <form action="feedback-save.php?sid=<?php echo $sid?>&crsid=<?php echo $crsid?>" method="post">
    <div class="feed-cont">
        <div>
            <h1 align='center'>Feedback!</h1>
        </div>
        <div class="rating">
            <h2>How do you rate you overall experience with course?</h2>
            <div class="rat-cont">
                <div class="rat-area"><label for="rating">Bad</label>
                    <input value="1" type="radio" name="rating">
                </div>
                <div class="rat-area">
                    <label for="rating">Poor</label>
                    <input value="2" type="radio" name="rating">
                </div>
                <div class="rat-area">
                    <label for="rating">Good</label>
                    <input value="3" type="radio" name="rating">
                </div>
                <div class="rat-area">
                    <label for="rating">Very Good</label>
                    <input value="4" type="radio" name="rating">
                </div>
                <div class="rat-area">
                    <label for="rating">Execelent</label>
                    <input value="5" type="radio" name="rating">
                </div>
            </div>
        </div>
        <div class="review">
            <h2>Give Your review</h2>
            <textarea name="txt-feed" rows="4" cols="80"></textarea>
        </div>
        <div class="submit-feed">
            <input type="submit" name="submit" value="Submit">
        </div>
    </div>
    </form>

</body>

</html>