<?php include('./config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="./css_kiwi_foodmart/admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br>
        <!--Login Form Starts Here-->
        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Pasword:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <br>
            <input type="Submit" name="submit" value="Login" class="btn-primary"><br><br>
            <br>

        </form>

        <!--Login Form Ends Here-->
        <! <p>Created By: <a href="Vishwakranti Suryawanshi">Vishwakranti Suryawanshi</a></p>
    </div>
</body>

</html>
<?php

//Check wheather the Submit Button is Clicked or Not
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the data from Login Form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2.SQL to check wheather the user with username and password exists or not

    $sql = "SELECT * FROM admin WHERE username= '$username' And password='$password'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);
    //4. Count rows to check wheather the user exists or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //User available and login success
        $_SESSION['login'] = "<div class=\"Success\">Login Successfully.</div>";
        //Redirect to Home page/Dashboard
        header('location:' . SiteURL . 'admin/');
    } else {
        //User not available and login fail
        $_SESSION['login'] = "<div class=\"Error text-center\">Username or Password did not match.</div>";
        $_SESSION['user'] = $username; //To check wheather the user  is logged in or not and logout will unset it

        //Redirect to home page/dashboard
        header('location:' . SiteURL . 'admin/login.php');
    }
}
?>