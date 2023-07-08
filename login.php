<!DOCTYPE html>
<html lang="en">

<?php

session_start();
include("db.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' && password = '$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
        if (is_array($row)) {
            header("refresh:1; url = register.php");
        }
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>

    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <div class="register-container">
        <h4>LOGIN</h4>

        <div class="login-form">

            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" id="button" name="submit" value="Sign In" />
            </form>

        </div>
        <div class="link">
            <p>Don't have an account: <a href="register.php">Sign Up</a> </p>
        </div>

    </div>

</body>

</html>