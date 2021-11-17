<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course page</title>
    <style>.admin-menubar{
    background-color: #fff;
}
#admin-menubar .admin-menu{
    font-size: 0;
}
#admin-menubar .admin-menu li{
    display: inline-block;
    margin: 0 5px 0 0;
}
#admin-menubar .admin-menu li a{
    color: #1E90FF;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    padding: 7px 15px;
    display: block;
    transition: all 0.3s;
}

#admin-menubar .admin-menu li a:hover{
    color: #fff;
    background-color: #1E90FF;
}

#admin-content{
    padding: 20px 0;
    min-height: 750px;
}

#admin-content .admin-heading{
    font-size: 35px;
    margin: 0 0 15px;
}

#admin-content .add-new{
    color: #fff;
    background-color: #1E90FF;
    font-size: 15px;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
    padding: 7px 10px;
    /* margin: 0 0 20px; */
    display: block;
    transition: all 0.3s;
}
#admin-content .add-new:hover{
    text-shadow: 0 0 3px #000;
    box-shadow: 3px 3px 0 rgba(0,0,0,0.2);
}

#admin-content .content-table{
    border: 1px solid #000;
    width: 100%;
    margin: 0 0 20px;
}

#admin-content .content-table thead{
    color: #fff;
    background-color: #333;
}

#admin-content .content-table th{
    padding: 10px;
    border: 1px solid #fff;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
}

#admin-content .content-table tbody{
    color: #333;
}

#admin-content .content-table tbody tr{
    background-color: #e7e7e7;
}
#admin-content .content-table tbody tr:nth-child(even){
    background-color: transparent;
}
#admin-content .content-table tbody td{
    padding: 10px;
    border: 1px solid #fff;
    text-align: center;

}

#admin-content .content-table tbody td:nth-child(2){
    text-align: left;
}

#admin-content .admin-pagination{
    margin: 0;
}
#admin-content .admin-pagination li a{
    display: block;
}

.id,
.edit,
.delete{
    text-align:center;
}

form{
    background: #fff;
    padding: 25px;
    box-shadow:0 1px 3px rgba(0, 0, 0, 0.13);
}
</style>
</head>
<div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All COURSES ON WEBSITE</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add course</a>
              </div>
              <div class="col-md-12">
                <?php
                  include "config.php"; 
                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                  $sql = "SELECT * FROM itcourses
                  LEFT JOIN category ON itcourses.category = category.category_id
                  ORDER BY itcourses.Course_ID ";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>Course ID</th>
                          <th>Course Name</th>
                          <th>Category</th>
                          <th>Modules</th>
                          <th>Complexity</th>
                          <th>Price</th>
                      </thead>
                      <tbody>
                        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr>
                              <td class='id'><?php echo $row['Course_id']; ?></td>
                              <td><?php echo $row['Course_Name']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['Modules']; ?></td>
                              <td><?php echo $row['Complexity']; ?></td>
                              <td><?php echo $row['Price']; ?></td>
                          </tr>
                          <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
             
               
                  ?>
              </div>
          </div>
      </div>
  </div>