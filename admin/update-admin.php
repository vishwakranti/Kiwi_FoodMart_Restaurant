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
    <?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>
            <?php
            //1. Get the ID of selected Admin
            $id = $_GET['id'];

            //2. Create SQL Query to get the details 
            $sql = "SELECT * FROM admin WHERE id=$id";

            //3. To Execute the Query
            $res = mysqli_query($conn, $sql);

            //Check wheather the Query is executed or not
            if ($res == true) {
                //Check wheather the data is available or not
                $count = mysqli_num_rows($res);
                //Check wheather we have admin data or not
                if ($count == 1) {
                    //Get the details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username  = $row['username'];
                } else {
                    //Redirect to manage admin page
                    header('lacation:' . SiteURL . 'admin/manage-admin.php');
                }
            }
            ?>

            <form action="" method="Post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php

    //Check wheather the Submit Button is clicked or not
    if (isset($_POST['submit'])) {
        //echo "Button Clicked";
        //Get all the values from Form to Update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create SQL Query to Update Admin
        $sql = "Update admin SET
    full_name = '$full_name',
    username = '$username' 
    WHERE id='$id'
    ";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check wheather Query executed  successfully or not
        if ($res == true) {
            //Query Executedand Admin Updated
            $_SESSION['update'] = "<div class= 'success'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('lacation' . SiteURL . 'admin/manage-admin.php');
        } else {
            //Failed to update Admin 
            $_SESSION['update'] = "<div class= 'error'>Failed to Delete Admin.</div>";
            //Redirect to Manage Admin Page
            header('lacation' . SiteURL . 'admin/manage-admin.php');
        }
    }
    ?>

    <?php include('partials/footer.php'); ?>


</body>

</html>