<?php
session_start();
include 'dbconfig.php';

// Check if user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['save'])) {
    // Get and escape input values
    $fullName = mysqli_real_escape_string($conn, trim($_POST['fullName']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

    // Split full name
    $nameParts = explode(" ", $fullName, 2);
    $firstName = $nameParts[0];
    $lastName = isset($nameParts[1]) ? $nameParts[1] : '';

    $sessionEmail = $_SESSION['email'];

    // Build update query
    $updateQuery = "UPDATE `userinfo` 
                    SET `FirstName`='$firstName', `LastName`='$lastName', `Email`='$email', `PhoneNumber`='$phone', `HomeAddress`='$address' 
                    WHERE `Email`='$sessionEmail'";

    // Execute update
    if (mysqli_query($conn, $updateQuery)) {
        // Update session email if changed
        $_SESSION['email'] = $email;

        header("Location: userprofile.php#personal-info?update_success=1");
        exit;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

?>
