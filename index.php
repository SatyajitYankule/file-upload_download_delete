<?php include 'dbcon.php' ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User login</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <!-- Display files in table -->

    <div class="container-display container">
        <div class="row table-responsive">
            <div class="d-flex justify-content-between">
                <h2 class="text-center py-4">Download And Delete Files</h2>
                <a href="upload.php" class="btn-primary btn-primary-style download_btn mt-4">Upload file</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $displayFiles = "SELECT * FROM items ORDER BY id DESC";
                    $displayFilesResult = mysqli_query($conn, $displayFiles);
                    while ($row = mysqli_fetch_assoc($displayFilesResult)) {
                    ?>

                        <tr class="mt-5">
                            <td><img src="uploads/<?php echo $row['image']; ?>" width="200" alt=""></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><a href="download.php?id=<?php echo $row['id']; ?>"><button class="btn-primary btn-primary-style download_btn">Download</button></a></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="text-decoration-none"><button class=" btn-primary delete-buton-style ">Delete</button></a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>