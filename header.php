<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- header styling -->
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        
        .cont-1 {
            display: flex;
            height: 150px;
            background-color: black;
            color: wheat;
        }
        
        .head-cont {
            display: block;
            width: 100%;
        }
        
        .up-cont {
            display: flex;
            height: 60px;
            align-items: center;
            justify-content: space-evenly;
            font-family: 'Times New Roman', Times, serif;
        }
        
        .up-cont input {
            font-size: 30px;
            border-radius: 10px;
        }
        
        #search-bar {
            width: 600px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid #f3a719;
            color: black;
        }
        
        #submit-bar {
            width: 150px;
            font-size: 30px;
            margin-left: 15px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid #f3a719;
        }
        
        .header-item a {
            text-decoration: none;
            color: goldenrod;
            border: 2px solid gold;
            padding: 10px;
            font-weight: bolder;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            border-radius: 24px;
        }
        
        .header-item :hover {
            color: gold;
        }
        
        .down-cont {
            display: flex;
            align-items: baseline;
            justify-content: space-evenly;
            font-size: x-large;
            font-weight: bolder;
            /* background-color: black; */
            margin-top: 45px;
        }
        
        .nav-item a {
            /* background-color: bisque; */
            border: 1px solid white;
            color: wheat;
            padding: 8px;
            border-radius: 16px;
            text-decoration: none;
        }
        
        .nav-item :hover {
            color: #ad8d51;
            text-decoration: double;
        }
    </style>
</head>
<body>
<header>
        <div class="cont-1">
            <img src="Dimages/logo.jpeg">
            <div class="head-cont">
                <div class="up-cont">
                    <div class="header-item">
                        <input type="search" id="search-bar" placeholder="search here" name="header-search">
                        <input type="submit" id="submit-bar" value="Search" name="header-submit">
                    </div>
                    <div class="header-item">
                        <a href="Login.php">Login/Signup</a>
                    </div>
                </div>
                <div class="down-cont">
                    <div class="nav-item"><a href="index.php">HOME</a></div>
                    <div class="nav-item"><a href="category.php">COURSES</a></div>
                    <div class="nav-item"><a href="#">UPLOAD COURSE</a></div>
                    <div class="nav-item"><a href="#">ABOUT US</a></div>
                    <div class="nav-item"><a href="#">PROFILE</a></div>
                    <div class="nav-item"><a href="#">DASHBOARD</a></div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>