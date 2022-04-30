<?php
//Include constants.php file here 
include('./config/constants.php');
//1. Get the ID of Admin to be deleted
$id = $_GET['id'];
//2. Create SQL Query to Delete Admin
$sql = "DELETE FROM admin WHERE id=$id";

//Execute The Query
$res = mysqli_query($conn, $sql);

//Check wheather the query executed successfully or not
if ($res == true) {
    //Query Executed Successfully and Admin Deleted
    //echo "Admin Deleted";
    //Create Session Variable to Display Message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //Redirect To Manage Admin Page
    header('location:' . SiteURL . 'admin\manage-admin.php');
} else {
    //Failed To Delete Admin
    //echo "Failed To Delete Admin";

    $_SESSION['delete'] = "<div class= 'error'>Failed to Delete Admin. Try Agai Later.</div>";
    header('location:' . SiteURL . 'admin\manage-admin.php');
}

//3. Redirect to Manage Admin page with message (success/error)
