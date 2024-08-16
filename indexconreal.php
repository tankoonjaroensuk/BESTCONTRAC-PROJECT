<?php
session_start();
if (empty($_SESSION['id'])) {
    session_destroy();
    header('Location: ./login.php');
}

require_once('./condb.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contrac</title>
    <link rel="website icon" href="image/best_contrac_Logo-website.png" type="png">
    <link rel="stylesheet" href="css/styleconreal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="navbar-login">
            <div class="logo-login">
                <img src="image/best_contrac_Logo.png" alt="" style="padding: 1rem 3rem;">
            </div>
            <div class="login-right">
                <a href="#">
                    <button class="home-right">Home</button>
                </a>
                <a href="#">
                    <button class="register-right">About</button>
                </a>
                <a href="services.php">
                    <button class="services-right">Services</button>
                </a>
                <a href="#">
                    <button class="register-right">Contact</button>
                </a>

                <div class="dropdown-index-logout">
                    <button class="index-logout"><?php echo $_SESSION['fname']; ?></button>
                    <div class="dropdown-logout">
                        <a href="personaupdate.php">My Profile</a>
                        <a href="#">Order</a>
                        <a href="logout.php">Log out</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="banner-contrac">
            <div class="img-banner-promo">
                <h1>สมัครเป็นผู้รับเหมา</br>Best Contrac</h1>
                <a href="registercon.php">
                    <button>สมัครเลย</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>