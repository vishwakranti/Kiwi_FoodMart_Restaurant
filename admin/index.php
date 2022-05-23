<head>
    <meta charset="UTF-8">
    <base href="http://localhost:8080/kiwi_foodmart/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kiwi foodmart</title>
    <link rel="stylesheet" href="admin/css_kiwi_foodmart/admin.css">
</head>

<body>
    <?php include('partials/menu.php') ?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <br><br>
            <!-- Food Search Section Starts Here -->
            <section class="food-search text-center">
                <div class="container">

                    <form action="<?php echo SiteURL; ?>food-search.php" method="POST">
                        <input type="search" name="search" placeholder="Search for Food.." required>
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </form>
                </div>
            </section>
            <!-- Food Search Section Ends Here -->

            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br><br>

            <div class="col-4 text-center">

                <?php
                //Sql Query 
                $sql = "SELECT * FROM category";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);
                ?>

                <h1><?php echo $count; ?></h1>
                <br />
                Categories
            </div>

            <div class="col-4 text-center">

                <?php
                //Sql Query 
                $sql2 = "SELECT * FROM food";
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                //Count Rows
                $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                <br />
                Foods
            </div>

            <div class="col-4 text-center">

                <?php
                //Sql Query 
                $sql3 = "SELECT * FROM `order`";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
                $count3 = mysqli_num_rows($res3);
                ?>

                <h1><?php echo $count3; ?></h1>
                <br />
                Total Orders
            </div>

            <div class="col-4 text-center">

                <?php
                //Creat SQL Query to Get Total Revenue Generated
                //Aggregate Function in SQL
                $sql4 = "SELECT SUM(total) AS Total FROM `order` WHERE status='ordered' group by total";

                //Execute the Query
                $res4 = mysqli_query($conn, $sql4);

                //Get the VAlue
                $row4 = mysqli_fetch_assoc($res4);

                //GEt the Total REvenue
                $total_revenue = $row4['Total'];

                ?>

                <h1>$<?php echo $total_revenue; ?></h1>
                <br />
                Revenue Generated
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- Main Content Setion Ends -->

    <?php include('partials/footer.php') ?>
</body>

</html>