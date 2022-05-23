<?php
define("MY_SITE_DIR", __DIR__);
define("LOCAL_PATH_ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("HTTP_PATH_ROOT", isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : (isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : "_UNKNOWN"));
define("RELATIVE_PATH_ROOT", '');
define("RELATIVE_PATH_BASE", str_replace(HTTP_PATH_ROOT, RELATIVE_PATH_ROOT, getcwd()));
define("RELATIVE_PATH_APP", dirname(RELATIVE_PATH_BASE));

// ---------------------------------------------------------------------------
// DEFINE LOCAL PATHS
// ---------------------------------------------------------------------------
define("LOCAL_PATH_BASE", LOCAL_PATH_ROOT . RELATIVE_PATH_BASE);
define("LOCAL_PATH_APP", LOCAL_PATH_ROOT . RELATIVE_PATH_APP);
define("SERVER_DIR", str_replace("\\", "", str_replace(RELATIVE_PATH_BASE, "", getcwd())));
//echo "|" . SERVER_DIR;
define("APP_PATH", "http://" . HTTP_PATH_ROOT . "/" . SERVER_DIR);
define("CONFIG_PATH", RELATIVE_PATH_APP . "\\" . "admin\\config\\");
define("PARTIALS_PATH", RELATIVE_PATH_APP . "\\" . "admin\\partials\\");
//echo "|" . RELATIVE_PATH_BASE . "|";
//echo "|" . HTTP_PATH_ROOT . "|";

//echo "|" . $_SERVER['PHP_SELF'] . "|";
//echo "|" . MY_SITE_DIR . "|";
include MY_SITE_DIR . '\..\config\constants.php';
include MY_SITE_DIR . '\login-check.php';

?>


<!--Menu starts here-->
<div class="menu" text-center>
    <div class="wrapper">
        <ul>
            <li><a href="admin/index.php">Home</a></li>
            <li><a href="admin/manage-admin.php">Admin</a></li>
            <li><a href="admin/manage-category.php">Category</a></li>
            <li><a href="admin/manage-food.php">Food</a></li>
            <li><a href="admin/manage-order.php">Order</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="admin/login.php">Admin Login</a></li>
            <li><a href="admin/logout.php">Logout</a></li>

        </ul>
    </div>

</div>
<!--Menu Ends here-->