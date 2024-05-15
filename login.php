<?php
session_start();
require('config.php'); // Ensure your database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $password = md5($pass);

    // Prepare and execute the SQL query
    $pdo = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $pdo->bindParam(':username', $user);
    $pdo->bindParam(':password', $password);
    $pdo->execute();

    // Check if the user exists
    if ($pdo->rowCount() > 0) {
        $data = $pdo->fetch();
        $username = $data['username'];

        // Set session variable for the logged-in user
        $_SESSION['user_name'] = $username;

        // Redirect to the dashboard or any other page after successful login
        header("Location: dashboard.php");
        exit();
    } else {
        // Display an error message if login fails
        echo "Username or password is incorrect. Please try again.";
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
</head>

<body style="background: black;">
    <div class="login-dark animate__animated animate__bounceInUp" style="height: 695px;" >
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="username" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block">Log In</button></div><a class="forgot" href="register.php">Register</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>