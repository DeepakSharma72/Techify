<?php 
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- category sytling  -->
     <style>
        .course-category {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            font-size: x-large;
            font-weight: bolder;
            min-height: 42px;
            background-color: #323131;
            padding: 10px;
        }
        
        .techfield {
            margin: 10px;
        }
        
        .techfield a {
            text-decoration: none;
            color: gold;
            border: 2px solid goldenrod;
            border-radius: 8px;
            font-size: 1em;
            padding: 4px;
        }
        
        .techfield :hover {
            color: goldenrod;
            /* text-decoration: double; */
        }
    </style>

</head>
<body>
<div class="course-category">
        <div class="techfield"><a href="#">ML/AI</a></div>
        <div class="techfield"><a href="#">Web Devlopment</a></div>
        <div class="techfield"><a href="#">Android Devlopment</a></div>
    </div>
</body>
</html>

<?php 
    include 'footer.php';
?>