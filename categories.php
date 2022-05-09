<?php include('partials-front/menu.php'); ?>


<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
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
                <a href="<?php echo SiteURL . "category.php?id=" . $id; ?>">
                    <div class="box-3 float-container">
                        <img src="<?php echo SiteURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">

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

    </div>

    <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php include('partials-front/footer.php'); ?>