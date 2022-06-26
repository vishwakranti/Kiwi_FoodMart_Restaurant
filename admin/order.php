    <?php include('partials/menu.php') ?>
    <div class="main-content">
        <div class="wrapper"></div>
        <h1>Order</h1>
        <br>
        <br>

        <!-- Navbar Section Starts Here -->
        <section class="navbar">
            <div class="container">
                <div class="Logo">
                    <a href="#" title="Logo">
                        <img src="./images/category/Logo.png" alt="Restaurant Logo" class="img-responsive">
                    </a>
                </div>
        </section>
        <!-- Navbar Section Ends Here -->

        <!-- Dish SEARCH Section Starts Here -->
        <section class="Dish-search">
            <div class="container">

                <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

                <form action="#" class="order">
                    <fieldset>
                        <legend>Selected Dish</legend>

                        <div class="Dish-menu-img">
                            <img src="./images/ChickenBiryani.jpg" alt="Chicken Biryani" class="img-responsive img-curve">
                        </div>

                        <div class="Dish-menu-desc">
                            <h3>Dish Title</h3>

                            <p class="-price">$25</p>

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>

                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Delivery Details</legend>
                        <div class="order-label">Full Name</div>
                        <input type="text" name="full-name" placeholder="E.g. Vishwakranti S" class="input-responsive" required>

                        <div class="order-label">Phone Number</div>
                        <input type="tel" name="contact" placeholder="E.g. 223097865" class="input-responsive" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="E.g. hi@vishwakranti.com" class="input-responsive" required>

                        <div class="order-label">Address</div>
                        <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    </fieldset>

                </form>

            </div>
        </section>
        <!-- Dish Search Section Ends Here -->

        <!-- footer Section Starts Here -->
        <?php include('partials/footer.php') ?>