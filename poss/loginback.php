<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Contact</title>
    <link rel="website icon" href="/image/best_contrac_Logo-website.png" type="png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/css/back.css">
</head>

<body>
</body>

</html>
<?php
require_once("../condb.php");
// $google_oauth_client_id = '800875719447-okiunvrceqa35fiu1h6brt9cmmrn3hjm.apps.googleusercontent.com';
// $google_oauth_client_secret = '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';
// $google_oauth_redirect_uri = 'http://localhost/bestcontrac/poss/loginback.php';
// $google_oauth_version = 'v2';
// $google_login_url = "https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=$google_oauth_client_id&redirect_uri=$google_oauth_redirect_uri&scope=email%20profile&access_type=offline";

session_start();
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = base64_encode($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM `userprofile` WHERE email LIKE ? AND `password` LIKE ?");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['user'] = $row['user_type'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['zipcode'] = $row['zipcode'];
        $_SESSION['citizen'] = $row['citizen_id'];
        $_SESSION['bname'] = $row['bname'];

        


        echo "<script>Swal.fire({
            title: 'Login in successfully',
            text: 'Welcome to Best Contrac',
             icon: 'success',
             confirmButtonColor: '#B20C01',
             confirmButtonText: 'Go To website'
        }).then((result) => {
            if (result.isConfirmed) {
                 window.location.href = '../createpindigit.php';
             }
         })</script>";
    } else {
        echo "<script>Swal.fire({
            title: 'Login Failed',
            text: 'Email Or Password Invalid, Please Try Again.',
             icon: 'error',
             confirmButtonColor: '#B20C01',
             confirmButtonText: 'Back'
        }).then((result) => {
            if (result.isConfirmed) {
                refrechrate = 0;
                 window.location.href = '../login.php';
             }
         })</script>";
    }
    
}


// if (isset($_GET["code"])) {
//     $code = $_GET['code'];
//     $token_url = "https://oauth2.googleapis.com/token";
//     $post_fields = http_build_query([
//         'code' => $code,
//         'client_id' => $google_oauth_client_id,
//         'client_secret' => $google_oauth_client_secret,
//         'redirect_uri' => $google_oauth_redirect_uri,
//         'grant_type' => 'authorization_code'
//     ]);

//     $context = stream_context_create([
//         'http' => [
//             'method' => 'POST',
//             'header' => 'Content-Type: application/x-www-form-urlencoded',
//             'content' => $post_fields
//         ]
//     ]);

//     $response = file_get_contents($token_url, false, $context);
//     if ($response === FALSE) {
//         error_log("Failed to obtain access token.");
//         die("Failed to obtain access token.");
//     }
//     $response_data = json_decode($response, true);
//     if (!isset($response_data['access_token'])) {
//         error_log("Access token not found in the response.");
//         die("Access token not found.");
//     }
//     $access_token = $response_data['access_token'];
//     $user_info_url = "https://www.googleapis.com/oauth2/v2/userinfo?access_token=$access_token";
//     $user_info = file_get_contents($user_info_url);
//     if ($user_info === FALSE) {
//         error_log("Failed to obtain user information.");
//         die("Failed to obtain user information.");
//     }
//     $user_data = json_decode($user_info, true);
//     if (!isset($user_data['email'])) {
//         error_log("User email not found in the user data.");
//         die("User email not found.");
//     }

//     $email = $user_data['email'];
//     $fname = $user_data['given_name'] ?? '';
//     $lname = $user_data['family_name'] ?? '';

//     $stmt = $conn->prepare("SELECT * FROM `userprofile` WHERE email = ?");
//     $stmt->bind_param('s', $email);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         $_SESSION['id'] = $row['user_id'];
//         $_SESSION['fname'] = $row['fname'];
//         $_SESSION['lname'] = $row['lname'];
//         $_SESSION['user'] = $row['user_type'];
//         $_SESSION['phone'] = $row['phone'];
//         $_SESSION['email'] = $row['email'];
//         $_SESSION['address'] = $row['address'];
//         $_SESSION['state'] = $row['state'];
//         $_SESSION['zipcode'] = $row['zipcode'];
//         $_SESSION['citizen'] = $row['citizen_id'];
//         $_SESSION['bname'] = $row['bname'];

//         echo "<script>
//         Swal.fire({
//             title: 'Login Successful',
//             text: 'Welcome to Best Contrac',
//             icon: 'success',
//             confirmButtonColor: '#B20C01',
//             confirmButtonText: 'Go To website'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 window.location.href = '../createpindigit.php';
//             }
//         });
//         </script>";
//     } else {
//         $stmt = $conn->prepare("INSERT INTO `userprofile` (email, fname, lname, user_type) VALUES (?, ?, ?, 'user')");
//         $stmt->bind_param('sss', $email, $fname, $lname);

//         if ($stmt->execute()) {
//             $_SESSION['id'] = $stmt->insert_id;
//             $_SESSION['fname'] = $fname;
//             $_SESSION['lname'] = $lname;
//             $_SESSION['user'] = 'user';
//             $_SESSION['email'] = $email;

//             echo "<script>
//             Swal.fire({
//                 title: 'Login Successful',
//                 text: 'Welcome to Best Contrac',
//                 icon: 'success',
//                 confirmButtonColor: '#B20C01',
//                 confirmButtonText: 'Go To website'
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     window.location.href = '../createpindigit.php';
//                 }
//             });
//             </script>";
//         } else {
//             error_log("Failed to insert new user.");
//             die("Failed to insert new user.");
//         }
//     }
// } else {
//     $google_login_url = "https://accounts.google.com/o/oauth2/auth?" . http_build_query([
//         'response_type' => 'code',
//         'client_id' => $google_oauth_client_id,
//         'redirect_uri' => $google_oauth_redirect_uri,
//         'scope' => 'email profile openid',
//         'access_type' => 'offline',
//         'prompt' => 'consent'
//     ]);
//     header("Location: $google_login_url");
//     exit();
// }
?>