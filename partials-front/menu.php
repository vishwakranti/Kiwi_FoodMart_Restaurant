<?php
define("MY_SITE_DIR", __DIR__);

//include MY_SITE_DIR . '\..\admin\config\constants.php';
//include MY_SITE_DIR . '\login-check.php';
require_once 'constants.php';
require_once 'utilities/helperFunctions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- Important to make website responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kiwi Foodmart</title>

	<!-- Link our CSS file -->
	<link rel="stylesheet" href="./admin/css_kiwi_foodmart/admin.css">

	<!--Bootstrap css-->
	<!-- CSS only -->
	<link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">

	<!--MD bootstrap css-->
	<!--<link rel="stylesheet" href="MDB5-STANDARD-UI-KIT-Free-4.1.0/css/mdb.min.css">-->

	<!--front css-->
	<link rel="stylesheet" href="css/front.css">
</head>

<body>
	<!-- fOOD sEARCH Section Starts Here -->
	<div class="container-fluid">
		<form class="row justify-content-center pt-4">
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
	<!--reference: https://www.codeply.com/p/P0KN7DNsEq how to place navbar in the center-->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
			<a class="navbar-brand" href="<?php echo SiteURL; ?>" alt="kiwi food mart logo"> 
                <img src="./images/Logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
			<div class="navbar-collapse collapse">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="./">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="categories.php">Categories</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="foods.php">Foods</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cart.php">Cart</a>
					</li>
					<?php
						if(!isLoggedIn()){
					 ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php">Register</a>
					</li>
					<?php } else { ?>

					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar Section Ends Here -->