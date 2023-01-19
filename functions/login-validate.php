<?php
// include '../db-connection.php';
session_start();
$password = mysqli_real_escape_string($conn, $_POST['password']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

if (empty($username) || empty($password)) {

    echo "<script>alert('please provide all the details');</script>";
} else {
    $checkemail = "SELECT *  FROM `users` WHERE `username` = '$username'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $dbpassword = $fetch['password'];
            $category = $fetch['category'];
            $password = md5($password);
            if ($password !== $dbpassword) {
                echo "<script>alert('Incorrect password.');
            </script>";
            } else {
                if ($category == "customer") {
                    $_SESSION['customer'] = $username;
                    echo "<script>window.location.replace('customer/index.php');</script>";
                } else {

                    $_SESSION['admin'] = $username;
                    echo "<script>window.location.replace('admin/index.php');</script>";
                }
            }
        }
    } else {

        echo "<script>alert('Username  does not exist.');
            </script>";
    }
}
