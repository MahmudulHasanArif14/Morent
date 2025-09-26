<?php
session_start();
include 'dbconfig.php';

// Check if user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$userEmail = $_SESSION['email'];

// Delete user from database
$query = "DELETE FROM `userinfo` WHERE `email` = '$userEmail'";
$result = mysqli_query($conn, $query);

if ($result) {
 
    session_unset();
    session_destroy();

    // Redirect to home page
    header("Location: index.php?message=" . urlencode("Account deleted successfully."));
    exit;
} else {
    // Handle error
    echo "Error deleting account: " . mysqli_error($conn);
}

?>
