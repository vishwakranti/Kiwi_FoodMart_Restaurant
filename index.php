<?php include('partials-front/menu.php'); ?>

<body>

	<!-- Categories Section Starts Here -->
	<section class="categories">
		<div class="container">
			<h2 class="text-center">Food Categories</h2>
			<div class="row">

				<?php
            // Query to get all categories from database
            $sql = "SELECT * FROM category WHERE active='Yes' And featured='Yes' LIMIT 4";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_fetch_row($res);
            //create serial number variable and assign value as 1
            $sn = 1;

            //Check wheather we have data in database or not
            if ($count > 0) {
                //We have data in database
                //Get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['name_image'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>
				<div class="card col-md-6 p-2" style="">
					<a href="<?php echo "category-food.php?category_id=".$id?>">
                        
                            <?php
                            //check whether image is available or not
                            if ($image_name == "") {
                                //Display Message
                                echo "<div class='error'>Image not available</div>";
                            } else {
                                //Image available
                            ?>
                                <img src="<?php echo SiteURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="card-img-top col-md-5">
                            <?php
                            }

                            ?>
                            <div class="card-body">
                            <p class="card-text"><?php echo $title; ?></p>
                        </div>
                        
                    </a>
				</div>
				<?php
                }
            } else {
                //We do not have data
                //We will display the message inside the table
                ?>
				<div class="error">No Category Added.</div>
				<?php
            }

            ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
	<!-- Categories Section Ends Here -->


	<!-- Food Menu Section Starts Here -->
	<section class="">
		<div class="container">
			<h2 class="text-center">Food Menu</h2>

			<?php
            // Query to get all categories from database
            $sql = "SELECT * FROM food";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            //$count = mysqli_fetch_row($res);
            //create serial number variable and assign value as 1
            $sn = 1;

            //Check wheather we have data in database or not
            if ($res->num_rows > 0) {
                //We have data in database
                //Get the data anddisplay
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['name_image'];
                    $description = $row['description'];
                    $price = $row['price'];
            ?>

            <div class="card mb-3">
                <div class="row g-0 m-5">
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <img src="<?php echo SiteURL; ?>images/food/<?php echo $image_name; ?>"
                                    alt="<?php echo $title; ?>" class="img-fluid rounded-start card-img-left">
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 p-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <p class="card-text"><?php echo $description; ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo "$".$price; ?></small></p>
                        <p class="card-text"><a href="<?php echo " order.php?food_id=" . $id ?>" class="btn-btn-primary">Add to cart</a></p>
                    </div>
                    </div>
                </div>
            </div>

			<?php
                }
            } else {
                //We do not have data
                //We will display the message inside the table
                ?>
			<div class="error">No food dish Added.</div>
			<?php
            }

            ?>

		</div>
	</section>
	<!-- Food Menu Section Ends Here -->

	<?php include('partials-front/footer.php'); 