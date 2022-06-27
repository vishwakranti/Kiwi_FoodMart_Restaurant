    <?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>
            <br><br>
            <?php
            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }


            ?>
            <br><br>
            <!--Add category form starts here-->
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category title">
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active" value="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>

                </table>

            </form>
            <!--Add category form ends here-->
            <?php
            //Check wheather the submit button is clicked or not
            if (isset($_POST['submit'])) {
                //echo "Clicked";

                //1.Get the value from category form
                $title = $_POST['title'];

                //For radio input, we need to check wheather the button is clicked or not
                if (isset($_POST['featured'])) {
                    //Get the value from form
                    $featured = $_POST['featured'];
                } else {
                    //Set the Default value 
                    $featured = "No";
                }
                if (isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }
                //Check wheather the image is selected or not and set the value for image name accordingly
                print_r(($_FILES['image']));
                //die(); //Break the code here
                if (isset($_FILES['image']['name'])) {

                    //Upload the image
                    //To upload Image  we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];


                    //Auto Rename our image
                    //Get the Extension of our image(jpg,png,gif,etc)e.g."specialdish1.jpg"
                    $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "dish_category_" . rand(000, 999) . '.' . $ext; //e.g.dish_category_834.jpg



                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //Check wheather the Image is uploaded or not 
                    //And if the Image is not uploaded then we will stop the process and redirect with eror message
                    if ($upload == false) {
                        //Set message
                        $_SESSION['upload'] = "<div class='error>Failed to upload image.</div>";
                        //Redirect to Add  Category Page
                        header('location:' . SiteURL . 'admin/add-category.php');
                        //Stop the process
                        die();
                    }
                } else {
                    //Don't Uplode image and set the image_name value as blank
                    $image_name = "";
                }

                //2. Create SQL Query to insert category into database
                $sql = "INSERT INTO category(title,name_image,featured,active)
                       VALUES('$title','$image_name','$featured','$active');
                            ";

                //3. Execute the Query and save in database
                $res = mysqli_query($conn, $sql);
                //4. Cheack wheather the Query executed or not and data added or not
                if ($res == true) {
                    //Query Execute dand category added
                    $_SESSION['add'] = "<div class='Success'>Category Added Successfully</div>";
                    //Redirect to manage category page
                    header('location:' . SiteURL . 'admin/manage-category.php');
                } else {
                    //Failed to add category
                    $_SESSION['add'] = "<div class='error'>Failed to add category.</div>";
                    //Redirect to manage category page
                    header('location:' . SiteURL . 'admin/manage-category.php');
                }
            }

            ?>

        </div>
    </div>
    <?php include('partials/footer.php'); ?>