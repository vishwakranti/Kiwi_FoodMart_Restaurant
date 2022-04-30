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
    <div class="main-content">
        <div class="wrapper"></div>
        <h1>Add Food</h1>
        <br>
        <br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table tbl-30>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Food Title">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Food Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                            //Create PHP code to display categories from database
                            //1. Create SQL to get all active categories from database
                            $sql = "SELECT * FROM category WHERE active='Yes'";
                            //Execute Query
                            $res = mysqli_query($conn, $sql);


                            //Count rows to chck wheather we have categories or not

                            $count = mysqli_num_rows($res);
                            // If count is greater than zero, we have categories else we do not have categories
                            if ($count > 0) {
                                //We have categories
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    //Get the details of categories
                                    $id = $rows['id'];
                                    $title = $rows['title'];
                            ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php

                                }
                            } else {
                                //We do not have category
                                ?>
                                <option value="0">No Category Found</option>
                            <?php
                            }
                            //Display on Dropdown
                            ?>
                            <option value="1">Dish</option>
                            <option value="2">Drinks</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">YES
                        <input type="radio" name="featured" value="No">NO
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">YES
                        <input type="radio" name="active" value="No">NO
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">

                    </td>
                </tr>
            </table>

        </form>
        <?php
        //Check wheather the button is clicked or not
        if (isset($_POST['submit'])) {
            //Add the food in database
            //echo "Clicked";

            //Get the data from Form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //Check wheather radio button for featured and active are checked or not
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No"; //Setting the deafault value
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No"; //Setting Default Value
            }

            //Upload the image if selected

            //Check wheather the select image is clicked or not and upload the image only if he image is selected
            if (isset($_FILES['image']['name'])) {
                //Get the deatails of the selected image
                $image_name = $_FILES['image']['name'];

                //Check whether image is selected or not and upload the image only if selected
                if ($image_name != "") {
                    //Image is selected
                    //1.Rename the image
                    //Get the extension of selected image (jpg,gif,png etc.)"Vishwakranti-Suryawanshi.jpg" Vishwakranti-Suryawanshi.jpg
                    $ext = end(explode('.', $image_name));
                    //Create New name for image
                    $image_name = "dish-Name=" . rand(0000, 9999) . "." . $ext; //New image name maybe "dish-Name=657.jpg"
                    //2.Upload the image
                    //Get the source path and destination path

                    //Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination path for the image o be uploaded

                    $dst = "../images/dish/" . $image_name;

                    //Finally uplaod the dish image
                    $upload = move_uploaded_file($src, $dst);

                    //Check wheather image is uplaoded or not
                    if ($upload == false) {
                        //Failed to upload the image

                        //Redirect to add dish page with error message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                        header('location:' . SiteURL . 'admin/add-food.php');

                        //Stop the process
                        die();
                    }
                }
            } else {
                $image_name = ""; //Setting default value as blank
            }

            //Insert into database

            //Create a SQL Query to save or add dish
            //For numerical we do not need to pass value inside quotes'' But for string value it is compulsory to add quotes ''
            $sql2 =  "INSERT INTO food(title, description, price, name_image,category_id,featured,active)
                      VALUES (?,?,?,?,?,?,?)";

            $stmt = $mysqli->prepare($sql2);
            $stmt->bind_param("ssdsiss", $title, $description, $price, $image_name, $category, $featured, $active);

            //Execute the Query
            //$res2 = mysqli_query($conn, $sql);
            $stmt->execute();

            //Check whaether data is inserted or not
            //Redirect with message to manage food page
            if ($stmt == true) {
                //Data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            } else {
                //Failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to add food.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            }
        }

        ?>

    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>