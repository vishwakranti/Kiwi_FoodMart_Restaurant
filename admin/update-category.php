    <?php include('partials/menu.php') ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br>
            <br>
            <?php
            //Check wheather the id is set or not
            if (isset($_GET['id'])) {
                //Get the ID and all other details
                //echo "Getting the data";
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM category WHERE id=$id";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count the Rows to check wheather the ID is valid or not
                $count = mysqli_num_rows($res);

                if ($count == 1) {
                    //Get the all Data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['name_image'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                } else {
                    //Redirect to manage category with session message
                    $_SESSION['no-category found'] = "<div class='error'>Category Not Found.</div>";
                    header('location:' . SiteURL . 'admin/manage-category.php');
                }
            } else if (isset($_POST['submit'])) {
                //echo "Clicked";
                //1. Get all the values for Form
                $id = ($_POST['id']);
                $title = ($_POST['title']);
                $current_image = ($_POST['current_image']);
                $featured = ($_POST['featured']);
                $active = ($_POST['active']);

                //2.Updating the new image if selected


                //3. Update the database
                $sql2 = "UPDATE category SET
                title = '$title',
                featured = '$featured',
                current_image = '$current_image',
                active = '$active',
                WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Check wheather Query executed or not
                //Check wheather the image is selected or not
                if (isset($_FILES['image']['name'])) {
                    //Get the image details
                    $image_name = $_FILES['image']['name'];

                    //Check wheather the image is available or not
                    if ($image_name != "") {
                        //Image is available

                        //Upload the new image
                        //Auto Rename our image
                        //Get the Extension of our image(jpg,png,gif,etc)e.g."specialdish1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "dish_category_" . rand(000, 999) . '.' . $ext; //e.g.dish_category_834.jpg



                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/" . $image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check wheather the Image is uploaded or not 
                        //And if the Image is not uploaded then we will stop the process and redirect with eror message
                        if ($upload == false) {
                            //Set message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                            //Redirect to Add  Category Page
                            header('location:' . SiteURL . 'admin/manage-category.php');
                            //Stop the process
                            die();
                        }

                        //Remove the current image if available
                        if ($current_image != "") {
                            $remove_path = "../images/category/" . $current_image;
                            $remove = unlink($remove_path);

                            //Check wheather the image is removed or not
                            //If failed to remove then display message and stop the process
                            if ($remove == false) {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                header('location:' . SiteURL . 'admin/manage-category.php');
                                die(); //Stop the process
                            }
                        }
                    } else {
                        $image_name = $current_image;
                    }
                } else {
                    $image_name = $current_image;
                }
                //3. Update the database
                $sql2 = "UPDATE category SET
                            title = ?,
                            name_image = ?,
                            featured = ?,
                            active = ?
                            WHERE id = ?
                ";
                $stmt = $mysqli->prepare($sql2);
                $stmt->bind_param("ssssi", $title, $image_name, $featured, $active, $id);

                //Execute the Query
                $stmt->execute();

                if ($stmt == true) {
                    //Category Updated
                    $_SESSION['Update'] = "<div class='Success'>Category updated  successfully</div>";
                    header('location:' . SiteURL . 'admin/manage-category.php');
                    exit;
                } else {
                    //Failed to Category Updated
                    $_SESSION['Update'] = "<div class='Error'>Failed to update category</div>";
                    header('location:' . SiteURL . 'admin/manage-category.php');
                    exit;
                }

                //4.Redirect to manage category with message
            } else {
                //Redirect to manage category
                header('location:' . SiteURL . 'admin/manage-category.php');
                exit;
            }


            ?>
            <form action="update-category.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image:</td>
                        <td>
                            <?php
                            if ($current_image != "") {
                                //Display the image
                            ?>
                                <img src="<?php echo SiteURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                            } else {
                                //Display the Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New Image</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input <?php if ($featured == "Yes") {
                                        echo "checked";
                                    } ?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if ($featured == "No") {
                                        echo "checked";
                                    } ?> type="radio" name="featured" value="No">No

                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input <?php if ($active == 'Yes') {
                                        echo "checked";
                                    } ?> type="radio" name="active" value="Yes">Yes
                            <input <?php if ($active == 'No') {
                                        echo "checked";
                                    } ?> type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="update category">
                        </td>
                    </tr>

                </table>
            </form>


        </div>

    </div>

    <?php include('partials/footer.php') ?>