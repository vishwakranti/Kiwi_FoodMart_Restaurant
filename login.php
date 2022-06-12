<?php
require_once './utilities/helperFunctions.php';

if (isLoggedIn()) {
    header("location: index.php");
    exit;
}

//load database connections
//require_once "admin/config/constants.php";

require_once 'partials-front/menu.php';
//declare error variables
$userEmail_error = $userPassword_error = $login_error =  "";

if (isRequestMethodPost()) {

    //declare variables
    $userEmail = $userPassword = "";

    //validate userEmail
    if (empty(trim($_POST["userEmail"]))) {
        $userEmail_error = "Please enter username.";
    } else {
        $userEmail = trim($_POST["userEmail"]);
    }

    //validate userPassword
    if (empty(trim($_POST["userPassword"]))) {
        $userPassword_error = "Please enter your password.";
    } else {
        $userPassword = trim($_POST["userPassword"]);
    }

    //validate userEmail and userPassword
    if (empty($userEmail_error) && empty($userPassword_error)) {
        $sql = "SELECT id, email, password FROM users WHERE email = ? and enabled = 1";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_userEmail);
            $param_userEmail = $userEmail;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $userEmail, $userPassword_hash);
                    if ($stmt->fetch()) {
                        if (password_verify($userPassword, $userPassword_hash)) {

                            $isAdmin = false;
                            if ($userEmail == 'vishwakrantisuryawanshir@gmail.com')
                                $isAdmin = true;

                            //set session variables
                            setupUserSession($id, $userEmail, $isAdmin);

                            header("location: index.php");
                            exit;
                        } else {
                            $login_error = "Wrong user name or password!";
                        }
                    }
                } else {
                    $login_error = "Wrong user name or password";
                }
            } else {
                echo "There was an unrecognized and unhandled error!";
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}
?>


<body>


    <main>
        <div class="container mt-0">
            <div class="row justify-content-center">
                <form class="col-sm-4 shadow p-3 mb-5 bg-body rounded" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="col text-center">
                        <div class="mb-3">Log into your account</div>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp">
                        <span class="error">
                            <?php echo $userEmail_error; ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword">
                        <span class="error">
                            <?php echo $userPassword_error; ?>
                        </span>
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
                    </div>
                    <span class="error">
                        <?php echo $login_error; ?>
                    </span>
                </form>
            </div>
        </div>
        <!-- /.container -->
        <?php include('partials-front/footer.php'); ?>