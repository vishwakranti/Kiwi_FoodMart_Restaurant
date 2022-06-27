<?php include('partials-front/menu.php'); ?>

<?php
//CHeck whether food id is set or not
if (isset($_GET['food_id'])) {
    //Get the Food id and details of the selected food
    $food_id = $_GET['food_id'];

    //Get the DEtails of the Selected Food
    $sql = "SELECT * FROM food WHERE id=$food_id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //CHeck whether the data is available or not
    if ($count == 1) {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['name_image'];
        $sessionId = session_id();
    } else {
        //Food not Availabe
        //Redirect to Home Page
        header('location: cart.php');
    }
} else {
    //Redirect to homepage
    header('location:' . SiteURL);
}
?>

<!-- Food Search Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php

                    //CHeck whether the image is available or not
                    if ($image_name == "") {
                        //Image not Availabe
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                        //Image is Available
                    ?>
                        <img src="<?php echo SiteURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicken Biryani" class="img-responsive img-curve">
                    <?php
                    }

                    ?>

                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">$<?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vishwakranti Suryawanshi" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 2108212223" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. vishwakrantisuryawanshi@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Twigger Street, Christchurch, New Zealand" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) {
            // Get all the details from the form

            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty; // total = price x qty 

            $order_date = date("Y-m-d h:i:sa"); //Order Date

            $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];


            //Save the Order in Databaase
            //Create SQL to save the data
            //$sql2 =  "INSERT INTO order(food, price, qty, total, order_date, status, name_customer, contact_customer, email_customer, address_customer)
            //VALUES (?,?,?,?,?,?,?,?,?,?)";

            $sql2 = "INSERT INTO `order` ( `food`, `price`, `quantity`, `total`, `order_date`, `status`, `name_customer`, `contact_customer`, `email_customer`, `address_customer`) 
                        VALUES (?,?,?,?,?,?,?,?,?,?)";

            if (false === $stmt = $mysqli->prepare($sql2)) {
                echo 'error preparing statement: ' . $mysqli->error;
            };

            if (!$stmt->bind_param(
                "sdidsssiss",
                $food,
                $price,
                $qty,
                $total,
                $order_date,
                $status,
                $customer_name,
                $customer_contact,
                $customer_email,
                $customer_address
            )) {
                echo 'error binding params: ' . $stmt->error;
            };

            //$stmt->bindParam(':p1', $food);

            //Execute the Query
            //$res2 = mysqli_query($conn, $sql);
            if (!$stmt->execute()) {
                echo 'error executing statement: ' . $stmt->error;
            };

            //Execute the Query
            // $res2 = mysqli_query($conn, $sql2);

            //Check whether query executed successfully or not
            if ($stmt == true) {
                //Query Executed and Order Saved
                $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                header('location:' . SiteURL);
            } else {
                //Failed to Save Order
                $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                header('location:' . SiteURL);
            }
        }

        ?>

    </div>
</section>
<!-- Food Search Section Ends Here -->

<?php include('partials-front/footer.php'); ?>