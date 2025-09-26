<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if (isset($_FILES['avatar'])) {
    $fileName = $_FILES['avatar']['name'];
    $fileTmp = $_FILES['avatar']['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


    // Create unique file name
    $newFileName = 'Assets/avatars/' . uniqid() . '.' . $fileExt;




    if (move_uploaded_file($fileTmp, $newFileName)) {

        $email = mysqli_real_escape_string($conn, $_SESSION['email']);
        $avatarPath = mysqli_real_escape_string($conn, $newFileName);

        $query = "UPDATE `userinfo` SET `Avatar`='$avatarPath' WHERE `Email`='$email'";
        if (mysqli_query($conn, $query)) {
            header("Location: userprofile.php#personal-info");
            exit;
        } else {
            echo "Database update failed: " . mysqli_error($con);
        }
    } else {
        echo "Failed to upload image.";
    }
} else {
    echo "No file selected.";
}
