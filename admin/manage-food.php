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
        <h1>Manage Food</h1>
        <br>
        <br>
        <!--Button to Add Admin-->
        <a href="<?php echo SiteURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['unauthorize'])) {
            echo $_SESSION['unauthorize'];
            unset($_SESSION['unauthorize']);
        }
        ?>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            //Create a SQL Query to get all the food
            $sql = "SELECT * FROM food";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Count Rows to check whether we have food or not
            $count = mysqli_num_rows($res);
            //Create serial number variable and set default value as 1 
            $sn = 1;

            if ($count > 0) {
                //We have food in database
                //Get the food froom database and display

                while ($row = mysqli_fetch_assoc($res)) {

                    //Get teh values from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['name_image'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>
                    <tr>
                        <td><?php echo $sn++; ?>.</td>
                        <td><?php echo $title; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td>

                            <?php

                            //Chck whether we have image or not
                            if ($image_name == "") {
                                //We do not have image, display error message
                                echo "<div class='error'>Image not added.</div>";
                            } else {
                                // We have image, display image
                            ?>
                                <img src="<?php echo SiteURL; ?>images/dish/<?php echo $image_name; ?>" width="100px" />
                            <?php
                            }
                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>

                        <td>
                            <a href="<?php echo SiteURL; ?>admin/update-dish.php?id=<?php echo $id; ?>" class="btn-secondary">Update Dish</a>
                            <a href="<?php echo SiteURL; ?>admin/delete-dish.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Dish</a>
                        </td>

                    </tr>
            <?php
                }
            } else {
                //Food not added in database
                echo "<tr><td colspan='7' class='error'>Food not added yet.</td></tr>";
            }

            ?>
        </table>

    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>