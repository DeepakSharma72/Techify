<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="Dimages/favicon.jpeg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Techify</title>
  <style>
    .contain32 {
      font-family: 'Poppins', sans-serif;
      height: 100px;
      background-color: black;
      width: 100%;
    }

    .contain32 .button {
      float: left;
      width: 10%;
      margin-left: 30px;
      margin-top: 15px;
      background-color: black;
    }

    .contain32 .button a {
      background-color: black;
      text-decoration: none;
      font-size: 20px;
      color: #0d6efd
    }

    .contain32 .button a::before {
      content: '<';
      margin-right: 10px;
    }

    .contain32 .heading32 {
      text-align: center;
      float: left;
      width: 35%;
      margin-left: 30px;
      color: burlywood;
      background-color: black;
      font-family: 'Permanent Marker', cursive;
    }

    .contain32 .heading32 p {
      margin-top: 20px;
      font-size: 30px;
      background-color: black;
    }

    .contain32 .heading32 p i {
      margin-right: 10px;
      background-color: black;
    }

    .contain32 .logoT32 {
      float: right;
      width: 40%;
      margin-top: 0px;
      background-color: black;
    }

    .logoT32 img {
      height: 95px;
      width: 350px;
      transform: translateY(-5%);
      background-color: black;
    }

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

  <div class="contain32">
    <div class="button">
      <a href="index.php">Go Back</a>
    </div>
    <div class="heading32">
      <?php
        echo '<p><i class="fab fa-leanpub"></i>Enjoy & Learn with us !!</p>';
      ?>
    </div>
    <div class="logoT32">
      <img src="Dimages/T.jpeg">
    </div>
  </div>



  <div class="course-category">
    <div class="techfield">
      <?php
      include "config.php";

      if (isset($_GET['cid'])) {
        $cat_id = $_GET['cid'];
      }
      $sql = "SELECT * FROM category WHERE course > 0";
      $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
      if (mysqli_num_rows($result) > 0) {
        $active = "";
      ?>
        <?php while ($row = mysqli_fetch_assoc($result)) {
          if (isset($_GET['cid'])) {
            if ($row['category_id'] == $cat_id) {
              $active = "active";
            } else {
              $active = "";
            }
          }

          echo "<a class='{$active}' href='itcourses.php?cid={$row['category_id']}'>{$row['category_name']}</a>&nbsp;&nbsp;";
        } ?>
      <?php } ?>
    </div>
  </div>
</body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card mt-5">

        <div class="card-body">

          <form action="" method="GET">
            <div class="row">
              <div class="col-md-5">
                <div class="input-group mb-3">
                  <select name="sort_numeric" class="form-control">
                    <option value="">--Select Option--</option>
                    <option value="low-high" <?php if (isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") {
                                                echo "selected";
                                              } ?>> Low - High</option>
                    <option value="high-low" <?php if (isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") {
                                                echo "selected";
                                              } ?>> High - Low</option>
                  </select>
                  <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                    Sort
                  </button>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                    <a href="Filter.php">Level</a>
                  </button>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                    <a href="medium.php">Medium</a>
                  </button>
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">
                    <a href="price.php">Price</a>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>



      <!-- course section starts  -->


      <section class="course" id="course">

        <h1 class="heading">Welcome to the World Of Knowledge</h1>

        <div class="box-container">
          <?php
          include "config.php";

          /* Calculate Offset Code */
          $limit = 3;
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }
          $offset = ($page - 1) * $limit;

          $sort_option = "";
          if (isset($_GET['sort_numeric'])) {
            if ($_GET['sort_numeric'] == "low-high") {
              $sort_option = "ASC";
            } elseif ($_GET['sort_numeric'] == "high-low") {
              $sort_option = "DESC";
            }
          }
          $sql = "SELECT itcourses.Course_id,itcourses.Course_Name,itcourses.Description,itcourses.Time,itcourses.Duration,itcourses.Modules,itcourses.Price,itcourses.course_img
                        FROM itcourses
                        LEFT JOIN category ON itcourses.category = category.category_id
                        ORDER BY Price $sort_option ";

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
                    <h3> <i class="far fa-clock"></i><?php echo $row['Time']; ?> Time </h3>
                    <h3> <i class="far fa-calendar-alt"></i> <?php echo $row['Duration']; ?> Duration </h3>
                    <h3> <i class="fas fa-book"></i> <?php echo $row['Modules']; ?> Modules </h3>
                  </div>
                </div>
              </div>
          <?php
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

<?php
include 'footer.php';
?>