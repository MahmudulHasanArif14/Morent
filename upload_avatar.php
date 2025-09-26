<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $fileName = $_FILES['avatar']['name'];
    $fileTmp = $_FILES['avatar']['tmp_name'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExt, $allowed)) {
        // Create unique file name
        $newFileName = 'uploads/avatars/' . uniqid() . '.' . $fileExt;

        // Create directory if it doesn't exist
        if (!is_dir('uploads/avatars')) {
            mkdir('uploads/avatars', 0777, true);
        }

        if (move_uploaded_file($fileTmp, $newFileName)) {
        
            $email = mysqli_real_escape_string($con, $_SESSION['email']);
            $avatarPath = mysqli_real_escape_string($con, $newFileName);

            $query = "UPDATE `userinfoh` SET `Avatar`='$avatarPath' WHERE `Email`='$email'";
            if (mysqli_query($con, $query)) {
                header("Location: userprofile.php#personal-info");
                exit;
            } else {
                echo "Database update failed: " . mysqli_error($con);
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Invalid file type. Only JPG, PNG, GIF allowed.";
    }
} else {
    echo "No file selected.";
}

mysqli_close($con);
?>
