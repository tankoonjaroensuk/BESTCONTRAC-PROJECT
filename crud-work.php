<?php

session_start();
require_once("./condb.php");
$query = $conn->query("SELECT * FROM `work_information` WHERE `work_con` = '{$_SESSION['id']}' ");
$fetch = mysqli_fetch_assoc($query);
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM `work_information` WHERE work_id = $delete_id");
}

if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'contractor') {
    header('Location: ./login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
    <link rel="website icon" href="image/best_contrac_Logo-website.png" type="png">
    <link rel="stylesheet" href="css/stylecon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['bname']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="poss/add-workproject.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="firstname" class="col-form-label">Project Name:</label>
                                <input type="text" required class="form-control" name="w_name">
                            </div>
                            <div class="mb-3">
                                <label for="detailproject" class="col-form-label">Detail Project:</label>
                                <textarea type="text" required class="form-control" style="resize:none;" name="w_detail"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="district" class="col-form-label">District:</label>
                                <input type="text" required class="form-control" name="w_district">
                            </div>
                            <div class="mb-3">
                                <label for="start-date" class="col-form-label">วันเริ่มต้นงาน:</label>
                                <input type="date" required class="form-control" name="start-date">

                                <label for="end-date" class="col-form-label">วันสิ้นสุดงาน:</label>
                                <input type="date" required class="form-control" name="end-date">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="col-form-label">Image:</label>
                                <input type="file" required class="form-control" id="imgInput" name="w_image">
                                <img loading="lazy" width="100%" id="previewImg" alt="">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_work" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container mt-5 " >
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $_SESSION['bname']; ?>#<?php echo $_SESSION['id'] ?></h1>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" id="btn-addProject" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">Add Project</button>
                </div>
            </div>
            <hr>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Work_id</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Detail Project</th>
                        <th scope="col">Period</th>
                        <th scope="col">District</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stmt = $conn->query("SELECT * FROM `work_information` WHERE `work_con` = '{$_SESSION['id']}' ");
                    while ($row = mysqli_fetch_assoc($stmt)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['work_id']; ?></th>
                            <td><?php echo $row['w_name']; ?></td>
                            <td><?php echo $row['w_detail']; ?></td>
                            <td><?php echo $row['w_province']; ?></td>
                            <td><?php echo $row['w_district']; ?></td>
                            <td width="250px"><img class="rounded" width="100%" src="./image_work/<?php echo $row['w_image']; ?>" alt=""></td>
                            <td>
                                <a href="edit-workcontrac.phpid=<?php echo $row['work_id']; ?>" class="btn btn-warning">Edit</a>
                                <a onclick="return confirm('คุณยืนยันว่าจะลบสมาชิกชื่อ : <?php echo $row['w_name']; ?>') ;" href="?delete=<?php echo $row['work_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    let imgInput = document.getElementById('imgInput');
    let previewImg = document.getElementById('previewImg');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file)
        }
    }
</script>