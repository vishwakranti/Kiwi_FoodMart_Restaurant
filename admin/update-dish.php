<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kiwi foodmart</title>
    <link rel="stylesheet" href="./css_kiwi_foodmart/admin.css">
</head>

<body>
    <?php include('partials/menu.php') ?>

    <?php

    //Check whether Id is checked or not
    if (isset($_GET['id'])) {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to get the selected Dish
        $sql2 = "SELECT * FROM food WHERE id=$id";
        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the individual values of selected Dish

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['name_image'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    } else {
        //REdirect to MAnage food
        header('location:' . SiteURL . 'admin/manage-food.php');
    }
    ?>

    <div class="main-content">
        <div class="wrapper"></div>
        <h1>Update Dish</h1>
        <br>
        <br>
        <form action="update-dish.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image:</td>

                    <td>
                        <?php
                        if ($current_image == "") {
                            //Image not Available
                            echo "<div class='error'>Image Not Available.</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="<?php echo SiteURL; ?>images/dish/<?php echo $current_image; ?>" width="100px">
                        <?php


                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">

                            <?php
                            //Querybto get Active Category
                            $sql = "SELECT * FROM category WHERE active='Yes'";
                            //Execute the query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check whether category available or not
                            if ($count > 0) {
                                //Category Available
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];

                                    // echo "<option value='$category_id'>$category_title</option>";
                            ?>
                                    <option <?php if ($current_category == $category_id) echo "selected"; ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                                }
                            } else {
                                //Category not available
                                echo "<option value='0'>Category Not Available</option>";
                            }
                            ?>



                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if ($featured == "Yes") echo "Checked"; ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if ($featured == "No") echo "Checked"; ?> type="radio" name="featured" value="No">No

                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "Yes") echo "Checked"; ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if ($active == "No") echo "Checked"; ?> type="radio" name="active" value="No">No

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Update Dish" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            echo "Button Clicked";
        }

        ?>
    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>