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

    <!--Menu starts here-->
    <?php include('./partials/menu.php'); ?>
    <!--Menu Ends here-->


    <!--Main content starts here-->
    <div class="main content">
        <div class="wrapper">
            <h1>Dashboard</h1>
            <br><br>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories

            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories

            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <!--Main content ends here-->

    <!--Footer starts here-->

    <?php include('./partials/footer.php'); ?>
    <!--Footer ends here-->
</body>

</html>