<?php
define("MY_SITE_DIR", __DIR__);

include MY_SITE_DIR . '\..\admin\config\constants.php';
//include MY_SITE_DIR . '\login-check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="./admin/css_kiwi_foodmart/admin.css">

    <!--Bootstrap css-->
    <!-- CSS only -->
    <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>

<body>
<!-- fOOD sEARCH Section Starts Here -->
<div class="container">
    <form class="row justify-content-center">
        <div class="col-auto col-md-6 col-lg-6 pe-0">
            <label for="inputSearch" class="visually-hidden">Search</label>
            <input type="text" class="form-control" id="inputSearch" placeholder="Search for food...">
        </div>
        <div class="col-auto ps-1">
            <button type="submit" class="btn btn-primary mb-3">Search</button>
        </div>
    </form>
</div>


<!-- Food Search Section Ends Here -->
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="./images/Logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SiteURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteURL; ?>categories.php">categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteURL; ?>contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SiteURL; ?>cart.php">Cart</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->