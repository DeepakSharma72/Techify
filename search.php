<?php 
    include 'newheader.php';
?>

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

        h2 {
            text-align: center;
        }

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

<body>
    <?php
    include "config.php";
    if (isset($_GET['header-submit'])) {
        $search_term = mysqli_real_escape_string($conn, $_GET['header-search']);
    ?>
        <h2 style="color:#00008B" class="page-heading">
            <div class="course-search-item"><b>Search : <?php echo $search_term; ?></b></div>
        </h2>

        <section class="course" id="course">
            <div class="box-container">

                <?php


                $sql = "SELECT * FROM itcourses
                    LEFT JOIN category ON itcourses.Category = category.category_id
                    WHERE itcourses.Course_name LIKE '%{$search_term}%' OR itcourses.Description LIKE '%{$search_term}%' OR category.category_name LIKE '%{$search_term}%'
                    OR itcourses.Medium LIKE '%{$search_term}%'
                    ORDER BY itcourses.Course_id DESC ";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
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
                                    <h3> <i class="far fa-clock"></i><?php echo $row['Time']; ?> Hrs </h3>
                                    <h3> <i class="far fa-calendar-alt"></i> <?php echo $row['Duration']; ?> Months </h3>
                                    <h3> <i class="fas fa-book"></i> <?php echo $row['Modules']; ?> Modules </h3>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } else {
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