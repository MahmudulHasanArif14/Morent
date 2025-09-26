<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php?error=Please log in first.");
    exit;
}

$userEmail = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPass = trim($_POST['oldpass']);
    $newPass = trim($_POST['newpass']);

    if (empty($oldPass) || empty($newPass)) {
        header("Location: userprofile.php?error=Please fill in all fields.");
        exit;
    }

    $emailEscaped = mysqli_real_escape_string($conn, $userEmail);
    $oldPassEscaped = mysqli_real_escape_string($conn, $oldPass);
    $newPassEscaped = mysqli_real_escape_string($conn, $newPass);

    // Fetch current password
    $result = mysqli_query($conn, "SELECT Password FROM userinfo WHERE Email='$emailEscaped'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentPass = $row['Password'];

        if ($oldPass === $currentPass) { 
            // Update password
            $updateQuery = "UPDATE userinfo SET Password='$newPassEscaped' WHERE Email='$emailEscaped'";
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: userprofile.php?success=Password updated successfully!");
                exit;
            } else {
                header("Location: userprofile.php?error=Failed to update password. Try again.");
                exit;
            }
        } else {
            header("Location: userprofile.php?error=Current password is incorrect.");
            exit;
        }
    } else {
        header("Location: userprofile.php?error=User not found.");
        exit;
    }
}
?>
