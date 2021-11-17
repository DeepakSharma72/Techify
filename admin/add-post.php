<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course page</title>
    <style>
        .admin-menubar {
            background-color: #fff;
        }

        #admin-menubar .admin-menu {
            font-size: 0;
        }

        #admin-menubar .admin-menu li {
            display: inline-block;
            margin: 0 5px 0 0;
        }

        #admin-menubar .admin-menu li a {
            color: #1E90FF;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 7px 15px;
            display: block;
            transition: all 0.3s;
        }

        #admin-menubar .admin-menu li a:hover {
            color: #fff;
            background-color: #1E90FF;
        }

        #admin-content {
            padding: 20px 0;
            min-height: 750px;
        }

        #admin-content .admin-heading {
            font-size: 35px;
            margin: 0 0 15px;
        }

        #admin-content .add-new {
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

        #admin-content .add-new:hover {
            text-shadow: 0 0 3px #000;
            box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.2);
        }

        #admin-content .content-table {
            border: 1px solid #000;
            width: 100%;
            margin: 0 0 20px;
        }

        #admin-content .content-table thead {
            color: #fff;
            background-color: #333;
        }

        #admin-content .content-table th {
            padding: 10px;
            border: 1px solid #fff;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
        }

        #admin-content .content-table tbody {
            color: #333;
        }

        #admin-content .content-table tbody tr {
            background-color: #e7e7e7;
        }

        #admin-content .content-table tbody tr:nth-child(even) {
            background-color: transparent;
        }

        #admin-content .content-table tbody td {
            padding: 10px;
            border: 1px solid #fff;
            text-align: center;

        }

        #admin-content .content-table tbody td:nth-child(2) {
            text-align: left;
        }

        #admin-content .admin-pagination {
            margin: 0;
        }

        #admin-content .admin-pagination li a {
            display: block;
        }

        .id,
        .edit,
        .delete {
            text-align: center;
        }

        form {
            background: #fff;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
        }
    </style>
</head>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Course</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form -->
                <form action="save-post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="course_title">Course Name</label>
                        <input type="text" name="course_title" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Time">Course Time</label>
                        <input type="int" name="Time" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Duration">Course Duration</label>
                        <input type="int" name="Duration" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Module">Course Module</label>
                        <input type="int" name="Module" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Complexity">Course Complexity</label>
                        <input type="text" name="Complexity" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Price">Course Price</label>
                        <input type="int" name="Price" class="form-control" autocomplete="off" required>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control">
                            <option disabled selected> Select Category</option>
                            <?php
                            include "config.php";
                            $sql = "SELECT * FROM category";

                            $result = mysqli_query($conn, $sql) or die("Query Failed.");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Course image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>