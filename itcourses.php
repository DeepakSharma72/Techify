<?php include 'newheader.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Page</title>
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
    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="DCSS/coursecatstyle.css">

</head>
<body>  
<div class="course-category">
<div class="techfield">
<?php
                include "config.php";
                
                if(isset($_GET['cid'])){
                    $cat_id = $_GET['cid'];
                  }
                $sql = "SELECT * FROM category WHERE course > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
                if(mysqli_num_rows($result) > 0){
                    ?>
                  <?php while($row = mysqli_fetch_assoc($result)) {
                    if(isset($_GET['cid'])){
                      if($row['category_id'] == $cat_id){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                    }
                    echo "<a class='{$active}' href='itcourses.php?cid={$row['category_id']}'>{$row['category_name']}</a>&nbsp;&nbsp;";
                  } ?>
            <?php } ?>
                </div>
    </div>
<!-- course section starts  -->


<section class="course" id="course">
<?php
                  
$sql1 = "SELECT * FROM category WHERE category_id = {$cat_id}";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");
                    $row1 = mysqli_fetch_assoc($result1);
                    ?>


<h1 class="heading"><?php echo $row1['category_name']; ?> Courses </h1>    

<div class="box-container">
    
<?php
                        include "config.php";

                        if(isset($_GET['cid'])){
                            $cat_id = $_GET['cid'];
                          }
                        $limit = 3;
                        if(isset($_GET['page'])){
                          $page = $_GET['page'];
                        }else{
                          $page = 1;
                        }
                        $offset = ($page - 1) * $limit;

                        $sql = "SELECT itcourses.Course_id,itcourses.Course_Name,itcourses.Description,itcourses.Time,itcourses.Duration,itcourses.Modules,itcourses.Price,itcourses.course_img
                        FROM itcourses
                        LEFT JOIN category ON itcourses.category = category.category_id
                        WHERE itcourses.category = {$cat_id}
                        ORDER BY itcourses.Course_ID  DESC";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                      ?>
    <div class="box">
        <img src="admin/upload/<?php echo $row['course_img']; ?>" alt="">
        <h3 class="price"> <?php echo $row['Price']; ?></h3>
        <div class="content">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half"></i>
            </div>
            <a href='coursedetail.php?id=<?php echo $row['Course_id']; ?>' class="title"><?php echo $row['Course_Name']; ?></a>
            <p><?php echo $row['Description']; ?></p>
            <div class="info">
                <h3> <i class="far fa-clock"></i><?php echo $row['Time']; ?> Hrs </h3>
                <h3> <i class="far fa-calendar-alt"></i> <?php echo $row['Duration']; ?> Months </h3>
                <h3> <i class="fas fa-book"></i> <?php echo $row['Modules']; ?> Modules </h3>
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

</section>

<!-- course section ends -->

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>

<?php 
    include 'footer.php';
?>