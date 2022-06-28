<?php include('partials-front/menu.php'); ?>
    <header class="mt-0">
    </header>
    <main>
        <div class="container mt-3">
            <section id="contact">
                <div class="container">
                    <div class="well well-sm">
                        <h3><strong>Contact Us</strong></h3>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50468.639794256305!2d175.21123629899225!3d-37.75979811901495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d6d226e2075607d%3A0x99c415b112bbe430!2sHamilton%203200!5e0!3m2!1sen!2snz!4v1646030156191!5m2!1sen!2snz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="col-md-5">
                            <h4><strong>Get in Touch</strong></h4>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class=" form-group ">
                                    <label>Name</label>
                                    <input type="text " class="form-control " name=" Name" value=" " placeholder="Name ">
                                </div>
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input type="email " class="form-control " name="Email" value=" " placeholder="Email ">
                                </div>
                                <div class="form-group ">
                                    <label>Phone</label>
                                    <input type="tel " class="form-control " name="Phone" value=" " placeholder="Phone ">
                                </div>
                                <div class="form-group ">
                                    <textarea class="form-control " name="Message" rows="3 " placeholder="Message "></textarea>
                                </div>
                                <button class="btn btn-default " type="submit " name="Submit">
                                    <i class="fa fa-paper-plane-o " aria-hidden="true "></i> Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- /.container -->

        <?php include('partials-front/footer.php'); ?>