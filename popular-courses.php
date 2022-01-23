<!DOCTYPE html>
<?php 
include 'newheader.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Page</title>
    <style>
        .course-search-item {
            font-size: 50px;
            text-decoration: underline;
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
<section class="course" id="course">
    <h2 style="color:#00008B" class="page-heading">
        <div class="course-search-item"><b>Our Popular Courses!</b></div>
    </h2>
    <div class="box-container">

        <?php
        include "config.php";

        /* Calculate Offset Code */
        $limit = 3;

        $sql = "select * from itcourses it inner join crspurchased crs on it.Course_id = crs.crsid group by crsid order by crs.rating DESC limit 3";

        $result = mysqli_query($conn, $sql) or die("Query Failed. : Recent Post");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
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
                            <h3> <i class="far fa-clock"></i><?php echo $row['Time'] . ' Hrs'; ?> </h3>
                            <h3> <i class="far fa-calendar-alt"></i> <?php echo $row['Duration']; ?> Months </h3>
                            <h3> <i class="fas fa-book"></i> <?php echo $row['Modules']; ?> Modules </h3>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</section>