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
        <h1>Delete Dish</h1>
        <br>
        <br>

        <?php


        if (isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
        {
            //Process to delete
            //echo "Process to Delete";

            //Get ID and Image Name
            $id = $_GET['id'];
            $image_name = $_GET['image_name'];

            //Remove teh image if available
            //Check whether the image is available or not and delete only if available
            if ($image_name != "") {
                //It has image and need to remove from folder
                //Get the image path
                $path = "../images/dish/" . $image_name;

                //Remove image file from folder
                $remove = unlink($path);

                //Check whether the image is removed or not
                if ($remove == false) {
                    //Failed to remove image
                    $_SESSION['upload'] = "<div class='errror'>Failed to remove image</div>";
                    //Redirect to manage food
                    header('location:' . SiteURL . 'admin/manage-food.php');
                    //Stop the process of deleting dish
                    die();
                }
            }

            //delete food frpm database
            $sql = "DELETE FROM food WHERE id=$id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Check whether the query executed or not and set the session message respectively.
            //Redirect to manage food with session message
            if ($res == true) {
                //Dish Deleted
                $_SESSION['delete'] = "<div class='success'>Dish Deleted Successfully.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            } else {
                //Failed to delete dish 

                $_SESSION['delete'] = "<div class='error'>Failed to delete dish.</div>";
                header('location:' . SiteURL . 'admin/manage-food.php');
            }
        } else {
            //Redirect to manage food page
            //echo "Redirect";


            $_SESSION['Unauthorize'] = "<div class='error'>Unauthorized Access<div>";
            header('location:' . SiteURL . 'admin/manage-food.php');
        }
        ?>
    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>