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
        <h1>Manage Category</h1>
        <br>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {

            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['no-category found'])) {
            echo $_SESSION['no-category found'];
            unset($_SESSION['no-category found']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }


        ?>
        <br><br>
        <!--Button to Add Admin-->
        <a href="<?php echo SiteURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br>
        <br>
        <table class="tbl-full">
            <tr>
                <th>Serial Number</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
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
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php
                            //Cheak wheather image name is available or not
                            if ($image_name !== "") {
                                //Display the image
                            ?>
                                <img src="<?php echo SiteURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                            <?php
                            } else {
                                //Display the image
                                echo "<div class='error'>Image not added.</div>";
                            }
                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SiteURL . "admin/update-category.php?id=" . $id; ?>" class=" btn-secondary">Update Category</a>
                            <a href=" <?php echo SiteURL . "admin/delete-category.php?id=" . $id . "&image_name=" . $image_name . "\""; ?> class=" btn-danger">Delete Category</a>
                        </td>

                    </tr>

                <?php
                }
            } else {
                //We do not have data
                //We will display the message inside the table
                ?>
                <tr>
                    <td colspan="6">
                        <div class="error">No Category Added.</div>
                    </td>
                </tr>
            <?php
            }

            ?>

        </table>

    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>