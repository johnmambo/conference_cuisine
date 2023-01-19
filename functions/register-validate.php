<?php
$names  = mysqli_real_escape_string($conn, $_POST['fullname']);
$email  = mysqli_real_escape_string($conn, $_POST['email']);
$username  = mysqli_real_escape_string($conn, $_POST['username']);
$mobileno  = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$password  = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword  = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$phonelength = strlen($mobileno);
$passlength = strlen($password);

$usernamelength = strlen($username);
if (empty($names) || empty($email) ||  empty($mobileno) ||  empty($username) || empty($password) || empty($cpassword)) {
    echo "<script>alert('Provide all the details');</script>";
} else if (!preg_match("/^[a-zA-z ]*$/", $names) || !preg_match("/^[a-zA-z0-9]*$/", $username)) {
    echo "<script>alert('provide correct full names or username');</script>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = "Invalid email address";
} else if ($phonelength !== 10) {
    echo "<script>alert('Mobile number should have only 10 digits');</script>";
} else if ($usernamelength < 4) {
    echo "<script>alert('Username must have more than 4  digits or characters');</script>";
} elseif ($passlength < 4) {

    echo "<script>alert('Password must have more than 4  digits or characters');</script>";
} elseif ($password !== $cpassword) {

    echo "<script>alert('Password failed to match');</script>";
} else {


    $checkuser = "SELECT * FROM `users` WHERE `full_name` = '$names' AND `email` = '$email' AND `mobile_no`='$mobileno'";
    $queryuser = mysqli_query($conn, $checkuser);
    $userrows = mysqli_num_rows($queryuser);
    if ($userrows >= 1) {
        echo "<script>alert('user record Already exists');</script>";
    } else {
        $checkusername = "SELECT * FROM `users` WHERE `username` = '$username'";
        $queryusername = mysqli_query($conn, $checkusername);
        $usernamerows = mysqli_num_rows($queryusername);
        if ($usernamerows >= 1) {
            echo "<script>alert('Username Already exists ');</script>";
        } else {
            $checkphonenumber = "SELECT * FROM `users` WHERE `mobile_no` = '$mobileno'";
            $queryphonenumber = mysqli_query($conn, $checkphonenumber);
            $phonenumberrows = mysqli_num_rows($queryphonenumber);
            if ($phonenumberrows >= 1) {
                echo "<script>alert('Mobile Number Already exists');</script>";
            } else {
                $password = md5($password);
                $insertuser = "INSERT INTO `users`(`email`, `username`, `full_name`, `category`, `mobile_no`, `password`) VALUES ('$email', '$username', '$names', 'customer', '$mobileno', '$password')";
                $queryinsertuser = mysqli_query($conn, $insertuser);
                if ($queryinsertuser) {
                    echo "<script>window.location.replace('login.php');</script";
                }
            }
        }
    }
}
