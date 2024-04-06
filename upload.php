<?php
include 'dbcon.php';
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>File Upload And Download</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php
    if (isset($_POST['form-submit'])) {
        $title = $_POST['title'];
        $folder = 'uploads/';
        $image_file = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $path = $folder . $image_file;

        $target_file = $folder . basename($image_file);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // jpg, jpeg, png & gif etc files format

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error[] = 'Sorry ! Only jpp, png, jpeg and gif files are allowed';
        }

        // if ($_FILES['image']['size'] > 2097152) {
        //     $error[] = "Sorry, your image is too large. upload leass than 2 mb";
        // }

        if (!isset($error)) {
            // Upload image in folder 
            move_uploaded_file($file, $target_file);
            $insertfile = "INSERT INTO items(image, title) VALUES('$image_file', '$title')";
            $resultFile = mysqli_query($conn, $insertfile);
            if ($resultFile) {
                $image_success = 1;
            } else {
                echo "Somthing went wrong";
            }
        }
    }

    if (isset($error)) {
        foreach ($error as $error) {
            echo '<div class="message text-center" >' . $error . '</div><br>';
        }
    }

    ?>

    <?php
    if (isset($image_success)) {
        // echo '<h3 class="text-center"> Image Uploaded successfylly </h3>';
        header("location:index.php");
    }
    ?>


    <!-- Upload files  -->

    <div class="container container-media">
        <div class="row row-box-style justify-content-center align-items-center">
            <div class="col-lg-4 col-md-4 float-sm-start shadow shadow-padding-column">
                <h1 class="text-center">File Upload</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3" id="drop-area">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <!-- <div class="d-grid"> -->
                    <button type="submit" name="form-submit" class="btn-primary-style"> Upload </button>
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </div>










    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>