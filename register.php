<!DOCTYPE html>
<html lang="en">


<?php

session_start();
error_reporting(0);
include("db.php");

if (isset($_POST['submit'])) {

    if (
        empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) ||
        empty($_POST['email']) || empty($_POST['phonenumber']) || empty($_POST['password']) || empty($_POST['cpassword'])
    ) {
        $message = "All Field Must Be Required!!!";
    } else {

        $check_username = mysqli_query($db, "SELECT username FROM users WHERE username = '" . $_POST['username'] . "'");
        $check_email = mysqli_query($db, "SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");

        if ($_POST['password'] != $_POST['cpassword']) {
            $message = "Passwords doesn't match";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid Email Address";
        } elseif (mysqli_num_rows($check_username) > 0) {
            $message = 'username already exists.';
        } elseif (mysqli_num_rows($check_email) > 0) {
            $message = 'email already exists.';
        } else {
            $sql = "INSERT INTO users(username, firstname, lastname, email, phonenumber, password) 
            VALUES ('" . $_POST['username'] . "', '" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['phonenumber'] . "','" . $_POST['password'] . "')";

            mysqli_query($db, $sql);
            $success = "YOUR ACCOUNT SUCCESFULLY CREATED😃";

            header("refresh:5; url = login.php");
        }
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

    <div class="register-container">
        <h4>REGISTER</h4>

        <div class="login-form">

            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="firstname" placeholder="First Name" />
                <input type="text" name="lastname" placeholder="Last Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="text" name="phonenumber" placeholder="Phone Number" />
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="cpassword" placeholder="Confirm Password" />
                <input type="submit" id="button" name="submit" value="Sign Up" />
            </form>

        </div>
        <div class="link">
            <p>Already have a account: <a href="login.php">Sign In</a> </p>
        </div>

    </div>

</body>

</html>