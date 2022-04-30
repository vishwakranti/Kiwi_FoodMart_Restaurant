<?php
//Authorization - Access Control
//Check wheather the user is logged in or not
if (!isset($_SESSION['user'])) //If user session is not set

{
    //User is not logged in
    //Redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel</div>";
    //Redirect to login page
    header('location:' . SiteURL . 'admin/login.php');
}
