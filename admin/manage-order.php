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
    <?php include('partials/menu.php') ?>
    <div class="main-content">
        <div class="wrapper"></div>
        <h1>Manage Order</h1>
        <br>
        <br>

        <table class="tbl-full">
            <tr>
                <th>Serial Number</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Vishwakranti</td>
                <td>Vishwakranti</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>

            </tr>
            <tr>
                <td>2.</td>
                <td>Vishwakranti</td>
                <td>Vishwakranti</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>

                </td>

            </tr>

            <tr>
                <td>3.</td>
                <td>Vishwakranti</td>
                <td>Vishwakranti</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>

                </td>

            </tr>
        </table>

    </div>
    <?php include('partials/footer.php') ?>
</body>

</html>