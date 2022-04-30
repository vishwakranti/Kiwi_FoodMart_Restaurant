
<?php
//Include constants.php for SiteURL
include('./config/constants.php');

//1.Destroy the ssession
session_destroy(); //sets $_SESSION['user']


//2.Redirect to Login page
header('location:' . SiteURL . 'admin/login.php');

?>