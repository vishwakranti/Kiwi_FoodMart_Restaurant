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
</head>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.html" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- Food Search Section Ends Here -->

<body>
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