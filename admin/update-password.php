<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td Current Password:></td>
                    <td>
                        <input type="password" name="current_passssword" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_passssword" placeholder="new password">
                    </td>

                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_passssword" placeholder="confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password">

                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php

//Check wheather the submit button clicked or not
if (isset($_POST['submit'])) {
    //echo "Clicked"

    //1. Get the Data from Form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2. Check wheather the user with current ID and current password exists or not
    $sql = "SELECT * FROM admin where id=$id AND password='$current_password'";

    //Execute the Query 
    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        //check whether data is available or not
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            //User exists and passsword can be changed
            //echo "User Found";
            //Check wheather the new password andconfirm password match or not
            if ($new_password == $confirm_password) {
                //Update the password
                $sql2 = "UPDATE admin SET
                password='$new_password'
                WHERE id=$id
                ";

                //Execute the Query
                $res = mysqli_query($conn, $sql2);

                //Check wheather Query executed or not
                if ($res == true) {
                    //Display Success Message
                    //Redirect to manage Admin page with Success message
                    $_SESSION['change-pwd'] = "<div class='Success'>Change Password Successfully.</div>";

                    //Redirect the user
                    header('location:'  . SiteURL . 'admin/manage-admin.php');
                } else {
                    //Display Error Message
                    //Redirect to manage Admin page with Error message
                    $_SESSION['change-pwd'] = "<div class='Error'>Failed To Change Password .</div>";

                    //Redirect the user
                    header('location:'  . SiteURL . 'admin/manage-admin.php');
                }
                // echo "Password Match"
            } else {
                //Redirect to manage Admin page with Error message
                $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match.</div>";

                //Redirect the user
                header('location:'  . SiteURL . 'admin/manage-admin.php');
            }
        } else {
            //User does not exist set message and Redirect
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";

            //Redirect the user
            header('location:'  . SiteURL . 'admin/manage-admin.php');
        }
    }
    //3. check wheather the new password and confirm password match or not

    //4. Change password if all above is true
}
?>

<?php include('partials/footer.php'); ?>