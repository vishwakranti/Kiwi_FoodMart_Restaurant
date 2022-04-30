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
            <h1> Add Admin</h1>
            <br>
            <br>
            <?php
            if (isset($_SESSION['add'])) //Checking weather the Session is Set or Not
            {
                echo $_SESSION['add']; //Display the Session Message if SET
                unset($_SESSION['add']); //Remove Session Message
            }
            ?>
            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="full_name" placeholder="Enter Your Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" placeholder="Your username">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>


                </table>


            </form>

        </div>
    </div>


    <?php
    //Process the value from Form and save it in database

    //Check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {

        //1.Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with md5

        //2.Get the SQL Query to save the data in database
        $sql = "INSERT INTO admin SET
full_name='$full_name',
username= '$username',
password= '$password'
";

        //3. Executing Query and Storing Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));


        //4. Check wheather the (the Query is executed) data is incorrect or not and display appropriate message
        if ($res == TRUE) {
            // Data inserted

            //Create a session variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect page to manage Admin
            header("http\\xampp\htdocs\kiwi_foodmart\admin\add-admin.php");
        } else {
            //Failed to insert data
            //Create a session variable to Display Message
            $_SESSION['add'] = "Failed to Add Admin";
            //Redirect page to manage Add Admin
            
            header('location:' . SiteURL . 'admin/add-admin.php');
        }
        }
    }

    ?>
    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>