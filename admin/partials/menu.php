<?php
define("MY_SITE_DIR", __DIR__);
define("LOCAL_PATH_ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("HTTP_PATH_ROOT", isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : (isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : "_UNKNOWN"));
define("RELATIVE_PATH_ROOT", '');
define("RELATIVE_PATH_BASE", str_replace(HTTP_PATH_ROOT, RELATIVE_PATH_ROOT, getcwd()));
define("RELATIVE_PATH_APP", dirname(RELATIVE_PATH_BASE));
echo RELATIVE_PATH_BASE;

include('./config/constants.php');
include('login-check.php');

?>


<!--Menu starts here-->
<div class="menu" text-center>
    <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </div>

</div>
<!--Menu Ends here-->