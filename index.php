<?php include('partials-front/menu.php'); ?>

<body>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


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
                    <a href="category-foods.php">
                        <div class="box-3 float-container">
                            <?php
                            //check whether image is available or not
                            if ($image_name == "") {
                                //Display Message
                                echo "<div class='error'>Image not available</div>";
                            } else {
                                //Image available
                            ?>
                                <img src="<?php echo SiteURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                            <?php
                            }

                            ?>
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

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
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- Food Menu Section Starts Here -->
    <section class="food-menu">
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

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo SiteURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-details">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-description">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo "order.php?food_id=" . $id ?>" class="btn-btn-primary">Order Now</a>
                        </div>
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
    </section>
    <!-- Food Menu Section Ends Here -->
</body>

</html>

<?php include('partials-front/footer.php'); ?>