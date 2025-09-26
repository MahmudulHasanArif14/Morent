<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['email'])) {
    header("Location: verify.php?error=" . urlencode("Invalid access."));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify'])) {
    $user_otp = $_POST['code'] ?? '';
    $email = $_SESSION['email'];

    // Fetch user
    $query = "SELECT * FROM `userinfo` WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($user_otp == $row['otp']) {
            // OTP verified
            $_SESSION['otp_verified'] = true;
            $_SESSION['isLogedIN'] = true;

            // Activate account
            $updateQuery = "UPDATE `userinfo` SET status='active' WHERE Email='$email'";
            mysqli_query($conn, $updateQuery);

          
            header("Location: verify.php?success=1");
            exit;
        } else {
            header("Location: verify.php?error=" . urlencode("Invalid OTP. Please try again."));
            exit;
        }
    } else {
        header("Location: verify.php?error=" . urlencode("User not found."));
        exit;
    }
} else {
    header("Location: verify.php?error=" . urlencode("Please enter the OTP."));
    exit;
}
