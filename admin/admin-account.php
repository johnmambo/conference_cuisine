<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
} else {
    require '../db-connection.php'; 
    $email = $_SESSION['admin'];
    $checkemail = "SELECT *  FROM `users` WHERE `username`= '$email' AND `category`='admin'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['username'];
            $globalloggedinid = $fetch['id'];
            $globalmembername = $fetch['full_name'];
            $globalemail = $fetch['email'];
           
            global $globalmembername;
            global $globalusername;
            global $globalemail;
            global $memberid;
            global $globalloggedinid;
        }
    }
}