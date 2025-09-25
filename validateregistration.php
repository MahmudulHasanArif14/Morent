<?php
require 'sendmail.php';
include 'dbconfig.php';

if (isset($_POST['submit'])) {

    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);


    $isOk = isset($firstName) && isset($lastName) && isset($email) && isset($phone) && isset($password) && isset($confirmPassword) ? true : false;

    if (!$isOk) {
        header("Location: register.php?error=" . urlencode("All fields are required."));
        exit;
    }
    if (!preg_match("/^[a-zA-Z ]{3,}$/", $firstName)) {
        header("Location: register.php?error=" . urlencode("Name must be at least 3 letters and spaces only."));
        exit;
    }
    if (!preg_match("/^[a-zA-Z ]{3,}$/", $lastName)) {
        header("Location: register.php?error=" . urlencode("Name must be at least 3 letters and spaces only."));
        exit;
    }

    if (!preg_match("/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
        header("Location: register.php?error=" . urlencode("Invalid email format."));
        exit;
    }

    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{6,}$/", $password)) {
        header("Location: register.php?error=" . urlencode("Password must be at least 6 characters and contain a letter and a number."));
        exit;
    }

    if ($password !== $confirmPassword) {
        header("Location: register.php?error=" . urlencode("Passwords do not match."));
        exit;
    }




    // otherwise everything fine go for to insert in the database current user data
    //then will verify the user through email and otp

    // Generating Otp
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $otp_code = '';
    for ($i = 0; $i < 6; $i++) {
        $otp_code .= $chars[random_int(0, strlen($chars) - 1)];
    }


    // for activating account with link
    $activate_code = bin2hex(random_bytes(16));





    // saving the date to database


    // select Query
    $selectQuery = "SELECT * FROM `userinfo` WHERE `Email`='$email' ";

    // run the select Query
    $result = mysqli_query($conn, $selectQuery);


    // if true then email exist so check status

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        if ($row['status'] == 'active') {
            header("Location: register.php?error=" . urlencode("Email already exists,Please try to login."));
            exit;
        } else {
            // If email exists but is inactive, resend the activation email


            $updateQuery = "UPDATE `userinfo` SET `otp`='$otp_code', `activate_code`='$activate_code' WHERE `email`='$email'";

            $runQuery = mysqli_query($conn, $updateQuery);

            if ($runQuery) {
                $subject = 'Your OTP Code from Morent';


                $body = "
<!DOCTYPE html>
<html>
<head>
    <title>Your Verification Code</title>
     <!-- Bootstrap CSS -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    </style>
</head>
<body style=\"font-family: 'Poppins', sans-serif; background-color: #f0f2f5; text-align: center; padding: 20px;\">

    <div style=\"max-width: 550px; margin: auto; background: #ffffff; border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);\">
        
        <div style=\"background: linear-gradient(135deg, #4a90e2 0%, #50e3c2 100%); color: white; padding: 40px; border-top-left-radius: 12px; border-top-right-radius: 12px;\">
            <h1 style=\"margin: 0; font-size: 28px;\">Verification Code From <span class=\"fw-bold text-primary mb-3\">Morent</span></h1>
            <p style=\"margin: 10px 0 0; font-size: 16px; opacity: 0.9;\">Here is your one-time password</p>
        </div>

        <div style=\"padding: 40px 30px;\">
            <p style=\"font-size: 18px; color: #333;\">Your secure code is:</p>
            
            <div style=\"font-size: 42px; font-weight: 600; letter-spacing: 8px; color: #2d3748; background-color: #edf2f7; padding: 20px; border-radius: 8px; margin: 25px 0; display: inline-block;\">
                " . $otp_code . "
            </div>
            
            <p style=\"font-size: 14px; color: #888;\">This code will expire in 5 minutes.</p>
            <p style=\"font-size: 14px; color: #888;\">For your security, do not share this code with anyone.</p>
        </div>

        <div style=\"background-color: #fafafa; padding: 20px; font-size: 12px; color: #999; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;\">
            <p>Sent from Morent</p>
            <p>If you didn’t request this, you can safely ignore this email.</p>
        </div>

    </div>

</body>
</html>";








                $result = sendMail($email, $subject, $body);

                if ($result == true) {
                    session_start();
                    $_SESSION['otp'] = $otp_code;
                    $_SESSION['email'] = $email;
                    header("Location: otp_page.php?activate_code=" . urlencode($activate_code));
                    exit;
                } else {
                    header("Location: register.php?error=" . urlencode($result));
                    exit;
                }
            } else {
                header("Location: register.php?error=" . urlencode("Failed to update user."));
                exit;
            }
        }
    }

    // if user email not exists create new user
    else {


        // insert Query
        $insertQuery = "INSERT INTO `userinfoh`(`name`, `email`, `password`, `otp`, `activate_code`, `Status`) 
                VALUES ('$name','$email','$password','$otp_code','$activate_code','inactive')";


        if (mysqli_query($con, $insertQuery)) {

            $subject = 'Your OTP Code from Website';
            $body = "<b>Your OTP code is: $otp_code</b>";
            $result = sendMail($email, $subject, $body);

            if ($result == true) {
                session_start();
                $_SESSION['otp'] = $otp_code;
                $_SESSION['email'] = $email;
                header("Location: otp_page.php?activate_code=" . urlencode($activate_code));
                exit;
            } else {
                header("Location: register.php?error=" . urlencode($result));
                exit;
            }
        } else {
            header("Location: register.php?error=" . urlencode("Database error: " . mysqli_error($conn)));
            exit;
        }
    }
} else {
    header("Location: registration.php?error=" . urlencode("Don't try to access from URL"));
    exit;
}
