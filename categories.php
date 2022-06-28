<?php include('partials-front/menu.php'); ?>


<!-- Categories Section Starts Here -->
<section class="">
    <div class="container  ">
        <h2 class="text-center">Explore Categories</h2>
        <?php
        // Query to get all categories from database
        $sql = "SELECT * FROM category";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_fetch_row($res);
        //create serial number variable and assign value as 1
        $sn = 1;

        //Check wheather we have data in database or not
        if ($count > 0) {
            //We have data in database
            //Get the data anddisplay
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['name_image'];
                $featured = $row['featured'];
                $active = $row['active'];
        ?>

                <div class="card col-md-6 p-4 mx-auto m-4" style="">
					<a href="<?php echo SiteURL . "category.php?id=" . $id; ?>">
                        
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
                            <div class="card-body text-center">
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

<?php include('partials-front/footer.php'); ?>