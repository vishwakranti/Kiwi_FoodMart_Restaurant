<?php

include '../constants.php';
//include 'login-check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- Important to make website responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kiwi Foodmart</title>

	<!-- Link our CSS file -->
	<link rel="stylesheet" href="../admin/css_kiwi_foodmart/admin.css">

	<!--Bootstrap css-->
	<!-- CSS only -->
	<link rel="stylesheet" href="../bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">

    <!--MD bootstrap css-->
    <!--<link rel="stylesheet" href="MDB5-STANDARD-UI-KIT-Free-4.1.0/css/mdb.min.css">-->
	
	<!--front css-->
	<link rel="stylesheet" href="../css/front.css">
</head>

<body>
	<!-- Navbar Section Starts Here -->
    <!--reference: https://www.codeply.com/p/P0KN7DNsEq how to place navbar in the center-->
    <nav class="navbar navbar-expand-lg navbar-light m-5">
        <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
            <a class="navbar-brand" href="<?php echo SiteURL; ?>" alt="kiwi food mart logo"> 
                <img src="../images/Logo.png" alt="Restaurant Logo" class="img-responsive">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li >
					<li class="nav-item">
						<a class="nav-link" href="manage-admin.php" >Admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="manage-category.php">Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="manage-food.php">Food</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="manage-order.php">Order</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
	<!-- Navbar Section Ends Here -->