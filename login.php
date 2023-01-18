<?php $username = $message = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Account | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./admin/assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./admin/assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./toastr.min.css">
    <link rel="stylesheet" type="text/css" href="./toastr-btn.css">
    <script src="./jquery-3.3.1.min.js"></script>
    <script src="./toastr.min.js"></script>
    <script src="./toastr-options.js"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form action="" method="POST" autocomplete="off">
                                <?php

                                if (isset($_POST["loginaccount"])) {
                                    require 'db-connection.php';
                                    require 'functions/login-validate.php';
                                }
                                ?>
                                <?php echo $message; ?>
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" class="form-control p_input" name="username" style="color:white !important;">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control p_input" name="password" style="color:white !important;">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="loginaccount">Login To My Account</button>
                                </div>
                                <div class="d-flex">
                                    <a href="index.php" class="btn btn-facebook me-2 col">
                                        Return Home </a>
                                    <a href="register.php" class="btn btn-google col">
                                        Register </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./admin/assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="./admin/assets/js/off-canvas.js"></script>
    <script src="./admin/assets/js/hoverable-collapse.js"></script>
    <script src="./admin/assets/js/misc.js"></script>
    <script src="./admin/assets/js/settings.js"></script>
    <script src="./admin/assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>