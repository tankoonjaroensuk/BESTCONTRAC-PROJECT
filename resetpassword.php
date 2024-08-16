<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
    <link rel="website icon" href="image/best_contrac_Logo-website.png" type="png">
    <link rel="stylesheet" href="css/resetpassword.css">

</head>

<body>
    <div class="navbar-login">
        <div class="logo-login">
            <img src="image/best_contrac_Logo.png" alt="" style="padding: 1rem 3rem;">
        </div>
        <div class="login-right">
            <form action="#">
                <select name="" id="language">
                    <option value="english">English</option>
                    <option value="thailand">Thai</option>
                </select>
            </form>
            <a href="login.php">
                <button class="singin-right">Sign in</button>
            </a>
            <a href="register.php">
                <button class="register-right">Register</button>
            </a>
        </div>
        <div class="hero-branner">
            <div class="intro-signin">
                <div class="intro-text">
                    <h1>Reset<br>Password</h1>
                </div>
                <div class="title-text">
                    <p>If you remember your password<br> you can<a href="login.php">Register here!</a></p>
                </div>
                <div class="switch-text">
                    <p>Contractor Register is<a href="registercon.php">here.</a></p>
                </div>
            </div>
            <div class="singin-box">
                <form action="poss/resetpassback.php" method="post">
                    <div class="input-singin">
                        <input type="email" placeholder="Enter Email" class="email-signin" name="email" required>
                        <input type="password" placeholder="Old Password" class="password-signin" id="password" name="password" required>
                        <input type="password" placeholder="New Password" class="cpassword-signin" id="npassword" name="npassword" required>
                    </div>
                    <div class="button-submit">
                        <button class="submit-login" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>



    </div>
    
</body>

</html>