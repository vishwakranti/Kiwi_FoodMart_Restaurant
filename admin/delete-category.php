<?php
//include constants file
//include('./config/constants.php');
require_once '../constants.php';
//echo "Delete Page";
//Check wheather the id and image_name  value is set or not
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    //Get the value and Delete
    //echo "Get Value and Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove the physical image  file is available
    if ($image_name != "") {
        //Image is available so remove it
        $path = "../images/category/" . $image_name;
        //Remove the image
        $remove = unlink($path);
        //If failed to remove image then add an error message and add the process

        if ($remove == false) {
            //Set the session messsage
            $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
            //Redirect to manage category page
            header('location:' . SiteURL . 'admin/manage-category.php');
            //Stop the process 
            die();
        }
    }


    //Delete data from database
    //SQL Query to delete the data from databse
    $sql = "DELETE FROM category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    //Check wheather the data is dele from database or not
    if ($res == true) {
        //Set success message and redirect
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
        //Redirect to manage category
        header('location:' . SiteURL . 'admin/manage-category.php');
    }
} else {
    //Set Fail message and redirect
    $_SESSION['delete'] = "<div class='errror'>Failed to delete category.</div>";
    //Redirect to manage category
    header('location:' . SiteURL . 'admin/manage-category.php');
}
