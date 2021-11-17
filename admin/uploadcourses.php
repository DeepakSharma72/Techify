<!DOCTYPE html>

<head>
    <title>About us</title>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee6725c5d8.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            color: wheat;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url("../Dimages/code.jpeg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            font-weight: bolder;
        }

        .text-center {
            display: flex;
            justify-content: space-around;
            align-items: center;
            font-size: 30px;
            color: greenyellow;
        }

        .up-from {
            background-color: black;
            width: 60%;
            border-radius: 20px;
        }

        .form-grp input {
            margin: 5px 0px;
            width: 99%;
            margin: auto;
            color:black
        }

        .btn {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .form-grp option,
        .form-grp select,
        .form-grp textarea {
            color: black;
            width: 99%;
            margin: auto;
        }

        .form-grp {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center"><b>Upload the course</b></h3>
        <form action="save-post.php" method="POST" class="up-from" enctype="multipart/form-data">
            <div class="form-grp">
                <label for="course_name"> Course Name*</label>
                <input required type="text" class="form-control" id="course_name" name="course_name">
            </div>
            <div class="form-grp">
                <label for="course_desc">Course Description</label>
                <textarea class="form-control" id="course_desc" name="course_desc" rows="2"></textarea>
            </div>
            <div class="form-grp">
                <label for="time">Time</label>
                <input type="number" class="form-control" id="instructor" name="time">
            </div>
            <div class="form-grp">
                <label for="duration">Duration*</label>
                <input required type="number" class="form-control" id="rating" name="duration">
            </div>
            <div class="form-grp">
                <label for="modules">Modules*</label>
                <input required type="number" class="form-control" id="rating1" name="modules">
            </div>
            <div class="form-grp">
                <label for="price">Price*</label>
                <input required type="number" class="form-control" id="rating" name="price" placeholder="100$">
            </div>
            <div class="form-grp">
                <label for="category">Category*</label>
                <select required class="form-control" id="category" name="category">
                    <option selected disabled>Choose Category</option>
                    <option value="1">ML/AI</option>
                    <option value="2">Web Development</option>
                    <option value="3">Android Development</option>
                </select>
            </div>
            <div class="form-grp">
                <label for="complexity">Complexity*</label>
                <!-- <input type="text" class="form-control" id="complexity" name="complexity"> -->
                <select required class="form-control" id="complexity" name="complexity">
                    <option selected disabled>Choose Complexity Level</option>
                    <option value="Hard">Hard</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="form-grp">
                <label for="exampleInputPassword1">Course image*</label>
                <input required type="file" class="form-control" name="fileToUpload" required>
            </div>
            <div class="form-grp">
                <label for="medium">Medium</label>
                <select required class="form-control" id="course_price" name="medium">
                    <option selected disabled>Choose Medium</option>
                    <option value="Hindi">Hindi</option>
                    <option value="English">English</option>
                    <option value="French">French</option>
                </select>
            </div>

            <div class="form-grp">
                <label for="learnings">Learnings</label>
                <!-- <input type="text" class="form-control" id="course_price" name="learnings"> -->
                <textarea class="form-control" id="course_desc" name="learnings" rows="2"></textarea>
            </div>

            <div class="form-grp">
                <label for="requirements">Requirements</label>
                <!-- <input type="text" class="form-control" id="course_price" name="requirements"> -->
                <textarea class="form-control" id="course_desc" name="requirements" rows="2"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="courseSubmitbtn" name="cSubmitbtn">Submit</button>
                <a href="index.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
    </div>
</body>