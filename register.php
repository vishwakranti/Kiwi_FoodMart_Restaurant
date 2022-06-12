<?php
//load helper functions
require_once './utilities/helperFunctions.php';
//load database connections
//require_once "config.php";
require_once 'partials-front/menu.php';

//variables
$userEmail = $userPassword = $userConfirmPassword = "";
$userEmail_err = $userPassword_err = $userConfirmPassword_err = "";

//processing - check if the form has been posted
if (isRequestMethodPost()) {

    //validation
    if (empty(trim($_POST["userEmail"]))) {
        $userEmail_err = "Please enter a user email.";
    } else {
        // get users from database
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_userEmail);

            $param_userEmail = trim($_POST["userEmail"]);

            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $userEmail_err = "This user email already exists";
                } else {
                    $userEmail
                        = trim($_POST["userEmail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["userPassword"]))) {
        $userPassword_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["userPassword"])) < 6) {
        $userPassword_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["userPassword"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["userConfirmPassword"]))) {
        $userConfirmPassword_err = "Please confirm password.";
    } else {
        $userConfirmPassword = trim($_POST["userConfirmPassword"]);
        if (empty($userPassword_err) && ($password != $userConfirmPassword)) {
            $userConfirmPassword_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($userEmail_err) && empty($userPassword_err) && empty($userConfirmPassword_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_userEmail, $param_password);

            // Set parameters
            $param_userEmail = $userEmail;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}

?>

<body>

    <main>
        <div class="container mt-0">
            <div class="row justify-content-center">

                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                        <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" id="userEmail" class="form-control" name="userEmail" />
                                                    <label class="form-label" for="userEmail">Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="userPassword" class="form-control" name="userPassword" />
                                                    <label class="form-label" for="userPassword">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="userConfirmPassword" class="form-control" name="userConfirmPassword" />
                                                    <label class="form-label" for="userConfirmPassword">Confirm your password</label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <div class="form-outline flex-fill mb-0">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <label class="form-label">Already have an account? Login <a href="login.php"> here</a></label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
            <?php include('partials-front/footer.php'); ?>