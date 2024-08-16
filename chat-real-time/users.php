<?php
session_start();
if (!isset($_SESSION['id'])) {
  session_destroy();
  header("location: login.php");
}
require_once('../condb.php');

?>
<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<body>
  
  <?php include_once "header.php"; ?>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM userprofile WHERE user_id = {$_SESSION['id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>

          <a href="php/profile.php">
            <!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
            <div class="details">
          </a>


          <a href="php/profile.php">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          </a>


        </div>


  </div>
  </header>
  <div class="search" hidden>
    <span class="text">Select or Search an user to start chat</span>
    <input type="text" placeholder="Enter name to search...">
    <button><i class="fas fa-search"></i></button>
  </div>
  <div class="users-list">

  </div>
  </section>
  </div>

  <script src="js/users.js"></script>

</body>

</html>