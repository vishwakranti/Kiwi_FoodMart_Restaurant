    <?php include('partials/menu.php'); ?>
    <!--Main content starts here-->
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1>Manage Admin</h1>
            <br>
            <br>
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add']; // Displaying Session Message
                unset($_SESSION['add']); //Removing Session Message
            }
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if (isset($_SESSION['pwd-not-match'])) {
                echo $_SESSION['page-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
            if (isset($_SESSION['change-pwd'])) {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }
            if (isset($_SESSION['update'])) {
                echo ($_SESSION['update']);
                unset($_SESSION['update']);
            }
            ?>
            <br>
            <br>
            <br>
            <!--Button to Add Admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br>
            <br>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                //Query to Get all Admin
                $sql = 'SELECT * FROM admin';
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Check wheather the query executed or not
                if ($res == TRUE) {
                    //Count the Rows to check wheather we have data in database or not
                    $count = mysqli_num_rows($res); //Function get all the Rows in database
                    $sn = 1; // Create a variable and assign the value 
                    //Check the num of Rows
                    if ($count > 0) {
                        //We have data in database
                        while ($rows = mysqli_fetch_assoc($res)) {
                            //Using while loop to get all the data from database
                            //And while loop will runas long as we have data in database

                            //Get individual Data
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];


                            //Display the values in our table
                ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SiteURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SiteURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SiteURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                <?php

                        }
                    } else {
                        //We do not have data in database
                    }
                }

                ?>
                </tbody>
            </table>

            <div class="clearfix"></div>

        </div>
    </div>
    </div>
    <!--Main content ends here-->
    <?php include('partials/footer.php'); ?>
