<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SiteURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        //Display Foods that are Active
        $sql = "SELECT * FROM food WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //CHeck whether the foods are availalable or not
        if ($count > 0) {
            //Foods Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['name_image'];
        ?>
                 <div class="card mb-3">
                    <div class="row g-0 m-5">
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <?php
                            //Check whether image available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not Available.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo SiteURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-fluid rounded-start card-img-left">
                            <?php
                            }
                            ?>
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
            //Food not Available
            echo "<div class='error'>Food not found.</div>";
        }
        ?>


        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>