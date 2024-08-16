<?php
session_start();
require_once("./condb.php");
$query = $conn->query("SELECT * FROM `work_information` WHERE `work_con` = '{$_SESSION['id']}' ");
$fetch = mysqli_fetch_assoc($query);
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

<body>

    <div class="container mt-5 ">
        <h1>edit dsadsa</h1>
        <hr>

        <form action="poss/add-workproject.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $work = $_GET['id'];
                $stmt = $conn->query("SELECT * FROM `work_information` WHERE `work_id` = $work ");
                while ($row = mysqli_fetch_assoc($stmt)) 
            
            ?>
                <div class="mb-3">
                    <label for="firstname" class="col-form-label">Project Name:</label>
                    <input type="text" required class="form-control" name="w_name" value="<?php echo $row['w_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="detailproject" class="col-form-label">Detail Project:</label>
                    <textarea type="text" required class="form-control" style="resize:none;" name="w_detail" value="<?php echo $row['w_detail']; ?>"></textarea>
                </div>
                <div class="mb-3">
                    <label for="district" class="col-form-label">District:</label>
                    <input type="text" required class="form-control" name="w_district" value="<?php echo $row['w_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="start-date" class="col-form-label">วันเริ่มต้นงาน:</label>
                    <input type="date" required class="form-control" name="start-date" value="<?php echo $row['w_province']; ?>">

                    <label for="end-date" class="col-form-label">วันสิ้นสุดงาน:</label>
                    <input type="date" required class="form-control" name="end-date" value="<?php echo $row['w_province']; ?>">
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
            <?php
            }
            ?>
        </form>
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
</html>
<?php
if (isset($_POST['update-member'])) {
    $id = $_POST['id']; 
    $firstname = $_POST['sub_n'];
    $lastname = $_POST['sub_ln'];
    $position = $_POST['sub_skill'];

    $img2 = $_POST['image_p2']; 
    $upload = $_FILES['image_p']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $_FILES['image_p']['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt; 
        $filePath = 'image_member/' . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($_FILES['image_p']['size'] > 0 && $_FILES['image_p']['error'] == 0) {
                move_uploaded_file($_FILES['image_p']['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img2; 
    }

    $sql = "UPDATE `contractor_member` SET `sub_n` = ?, `sub_ln` = ?, `sub_skill` = ?, `image_p` = ? WHERE `sub_id` = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error in preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ssssi", $firstname, $lastname, $position, $fileNew, $id);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['success'] = "Data has been updated successfully";
        header("location: crud-member.php");
    } else {
        $_SESSION['error'] = "Data has not been updated successfully: " . $stmt->error;
        header("location: crud-member.php");
    }

    $stmt->close();
    $conn->close();
}

?>