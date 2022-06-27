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

    <div class="row">
        <div class="col-md-6 mx-auto">
        <h1>Update Dish</h1>
        <br>
        <br>
        <form action="update-food.php" method="POST" enctype="multipart/form-data">

            <table class="table">
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
                            <img src="<?php echo SiteURL; ?>images/food/<?php echo $current_image; ?>" width="100px">
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
            //echo "Button Clicked";

            //Get all the details from the Form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //Upload the imahe is selected

            //Check whether upload button is clicked or not
            if (isset($_FILES['image']['name'])) {



                //Upload button clicked
                $image_name = $_FILES['image']['name']; //New image name

                //Check whether file is available or not
                if ($image_name != "") {
                    //Image is available

                    // Rename the image
                    $ext = end(explode('.', $image_name)); //Get the extension of the image

                    $image_name = "Dish-Name" . rand(0000, 9999) . '.' . $ext; // This will be rename the image

                    //Get the source path and destination path
                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/food/" . $name_image; //Destination path


                    //Upload the immage

                    $upload = move_uploaded_file($src_path, $dest_path);


                    // Check whether the image is uploaded or not
                    if ($upload == false) {
                        //Failed to upload
                        $_SESSION['upload'] = "<div class='error'>failed to upload new image</div>";
                        //Redirect to manage food
                        header('location;' . SiteURL . 'admin/manage-food.php');
                        //Stop the process
                        die();
                    }
                    //Remove the image if new image is uploaded and current image exists
                    //Remove current image if available
                    if ($current_image != "") {
                        //Current image is available

                        //Remove the image
                        $remove_path = "../images/food/" . $current_image;

                        $remove = unlink($remove_path);

                        //Check whether  the image is removed or not
                        if ($remove == false) {
                            //failed to remove current image
                            $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";

                            //Redirect to manage food
                            header('location;' . SiteURL . 'admin/manage-food.php');

                            //Stop the process
                            die();
                        }
                    }
                }
            } else {
                $image_name = $current_image;
            }
            // Update the food in database
            $sql3 =  "INSERT INTO food(title, description, price, name_image,category_id,featured,active)
                      VALUES (?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($sql3);
            $stmt->bind_param("ssdsiss", $title, $description, $price, $image_name, $category, $featured, $active);

            //Execute the Query
            //$res3 = mysqli_query($conn, $sql3);
            $stmt->execute();

            //Check whaether Query  is executed or not

            if ($stmt == true) {
                //Query executed and food updated
                $_SESSION['add'] = "<div class='success'>Food updated Successfully.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            } else {
                //Failed to update food
                $_SESSION['add'] = "<div class='error'>Failed to update food.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            }
        }

        ?>
        </div>
    </div>
    <?php include('partials/footer.php') ?>