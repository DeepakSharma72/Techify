<!DOCTYPE html>
<head>
    <title>Techify</title>
    <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        .contain32{
            font-family: 'Poppins', sans-serif;
            height: 100px;
            background-color:black;
            width: 100%;
        }

        .contain32 .button{
            float: left;
            width: 10%;
            margin-left: 30px;
            margin-top: 15px;
            background-color:black;
        }

        .contain32 .button a{
            background-color:black;
            text-decoration: none;
            font-size: 20px;
        }

        .contain32 .button a::before{
            content: '<';
            margin-right: 10px;
        }

        .contain32 .heading32{
            text-align: center;
            float: left;
            width: 35%;
            margin-left: 30px;
            color: burlywood;
            background-color:black;
            font-family: 'Permanent Marker', cursive;
        }

        .contain32 .heading32 p{
            margin-top: 20px;
            font-size: 30px;
            background-color:black;
        }

        .contain32 .heading32 p i{
            margin-right: 10px;
            background-color:black;
        }

        .contain32 .logoT32{
            float: right;
            width: 40%;
            margin-top: 0px;
            background-color:black;
            /* height: 20%; */
        }

        .logoT32 img{
            height: 100px;
            width: 350px;
            transform: translateY(-5%);
            background-color:black;
        }
    </style>
</head>
    <div class="contain32">
        <div class="button">
            <a href="../index.php">Go Back</a>
        </div>
        <div class="heading32">
            <?php 
                echo '<p><i class="fas fa-chalkboard-teacher"></i>Teach and Explore with us !!</p>';
              
            ?>
        </div>
        <div class="logoT32">
            <img src="../Dimages/T.jpeg">
        </div>
    </div>
