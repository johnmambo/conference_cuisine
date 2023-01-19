<?php
session_start();
if (!isset($_SESSION['customer'])) {
    header('Location: ../index.php');
} else {
    require '../db-connection.php'; 
    $email = $_SESSION['customer'];
    $checkemail = "SELECT *  FROM `users` WHERE `username`= '$email' AND `category`='customer'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['username'];
            $globalloggedinid = $fetch['id'];
            $globalname = $fetch['full_name'];
            $globalemail = $fetch['email'];
           
            global $globalmembername;
            global $globalusername;
            global $globalemail;
            global $memberid;
            global $globalloggedinid;
        }
    }
}