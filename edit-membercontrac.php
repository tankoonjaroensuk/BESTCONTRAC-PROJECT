<?php
session_start();
require_once("./condb.php");
$query = $conn->query("SELECT * FROM `contractor_member` WHERE `member_con` = '{$_SESSION['id']}' ");
$fetch = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./cdn.php") ?>

</head>
</head>

<body>
    <?php include("./headercon.php") ?>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="indexcon.php" class="flex items-center p-2 text-gray-800 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 whitespace-nowrap">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="indexcontrac.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                        <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                            <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                        </svg>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Work</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-white rounded-lg dark:text-white bg-red-800 ">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Member Contractor</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- <div class="container mt-5">
        <h1>Edit Member By : <?php echo $_SESSION['bname']; ?></h1>
        <hr>
        <form action="edit-membercontrac.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_GET['id'])) {
                $sub = $_GET['id'];
                $stmt = $conn->query("SELECT * FROM `contractor_member` WHERE `sub_id` = $sub ");
                while ($row = mysqli_fetch_assoc($stmt)) {
            ?>
                    <div class="mb-3">
                        <label for="id" class="col-form-label">ID:</label>
                        <input type="text" readonly value="<?php echo $row['sub_id']; ?>" required class="form-control" name="id">
                        <label for="firstname" class="col-form-label">First Name:</label>
                        <input type="text" value="<?php echo $row['sub_n']; ?>" required class="form-control" name="sub_n">
                        <input type="hidden" value="<?php echo $row['image_p']; ?>" required class="form-control" name="image_p2">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="col-form-label">Last Name:</label>
                        <input type="text" value="<?php echo $row['sub_ln']; ?>" required class="form-control" name="sub_ln">
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="col-form-label">Position:</label>
                        <input type="text" value="<?php echo $row['sub_skill']; ?>" required class="form-control" name="sub_skill">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="imgInput" name="image_p">
                        <img width="10%" src="image_member/<?php echo $row['image_p']; ?>" id="previewImg" alt="">
                    </div>
                    <hr>
                    <a href="crud-member.php" class="btn btn-secondary">Go Back</a>
                    <button type="submit" name="update-member" class="btn btn-primary">Update</button>
            <?php
                }
            }
            ?>
        </form>
    </div>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file)
            }
        }
    </script> -->
</body>

</html>
<!-- <?php
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

        ?> -->


<!-- updateProductModal -->