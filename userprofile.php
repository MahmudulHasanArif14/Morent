<?php
session_start();
include 'dbconfig.php';


if (!isset($_SESSION['email']) || empty($_SESSION['email']) || !isset($_SESSION['isLogedIN']) || $_SESSION['isLogedIN'] !== true) {
    header("Location: login.php?error=" . urlencode("Login to access the Userprofile."));
    exit;
}

$userEmail = $_SESSION['email'];

// Fetch user info
$result = mysqli_query($conn, "SELECT * FROM `userinfo` WHERE `Email`='$userEmail'");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Morent Car Rentals</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!-- Top Navbar for Mobile -->
    <nav class="navbar navbar-light  bg-primary-0 d-md-none p-3 mobile-navbar fixed-top">

        <!--Mobile Navbar Logo  -->
        <h4 class="fw-bold text-primary" onclick="location.href='homepage.php'" style="cursor: pointer;">MORENT</h4>

        <!-- Hamburger Icon On mobile device -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Navbar Toggler">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row min-vh-100">

            <!-- Sidebar Navigation -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-1">
                    <!--Sidebar Logo  -->
                    <h4 class="fw-bold text-primary px-3 d-md-block d-none mb-4 " onclick="location.href='homepage.php'" style="cursor: pointer;">MORENT</h4>

                    <!-- Navbar Item -->
                    <div class="nav  flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill" href="#dashboard"
                            role="tab" aria-controls="dashboard" aria-selected="true">
                            <i class="bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                        <a class="nav-link" id="v-pills-bookings-tab" data-bs-toggle="pill" href="#bookings" role="tab"
                            aria-controls="bookings" aria-selected="false">
                            <i class="bi bi-calendar-check"></i>
                            My Bookings
                        </a>
                        <a class="nav-link" id="v-pills-personal-tab" data-bs-toggle="pill" href="#personal-info"
                            role="tab" aria-controls="personal-info" aria-selected="false">
                            <i class="bi bi-person-circle"></i>
                            Personal Info
                        </a>
                        <a class="nav-link" id="v-pills-documents-tab" data-bs-toggle="pill" href="#documents"
                            role="tab" aria-controls="documents" aria-selected="false">
                            <i class="bi bi-file-earmark-text"></i>
                            Documents
                        </a>
                        <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#payment" role="tab"
                            aria-controls="payment" aria-selected="false">
                            <i class="bi bi-credit-card"></i>
                            Payment Methods
                        </a>
                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false">
                            <i class="bi bi-gear"></i>
                            Settings
                        </a>


                        <!-- Delete Account Button -->
                        <a class="nav-link mt-4 text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                            <i class="bi bi-trash"></i>
                            Delete Account
                        </a>

                        <a class="nav-link mt-4" href="logout.php">
                            <i class="bi bi-box-arrow-left"></i>
                            Log Out
                        </a>



                    </div>
                </div>
            </nav>

            <!-- Delete Account Modal -->
            <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete your account? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="delete_account.php" class="btn btn-danger">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-3  m-0">

                <div class="card p-5 mb-4 bg-light shadow-sm">
                    <div class="d-flex align-items-center">
                        <form action="upload_avatar.php" method="post" enctype="multipart/form-data">
                            <?php
                            $name = $user['FirstName'];

                            $avatar = !empty($user['Avatar']) ? $user['Avatar'] : "https://placehold.co/100x100/EFEFEF/333333?text=$name";
                            ?>
                            <div class="position-relative">
                                <img src="<?php echo htmlspecialchars($avatar); ?>" class="rounded-circle profile-avatar" alt="User Avatar" style="width:100px;height:100px;">
                                <label for="avatarUpload" class="position-absolute bottom-0 end-0" style="font-size: 20px;">
                                    <i class="bi bi-camera-fill"></i>
                                </label>
                                <input type="file" id="avatarUpload" name="avatar" class="d-none" onchange="this.form.submit()">
                            </div>
                        </form>
                        <div class="ms-4">
                            <h2 class="h5 h4-md mb-1 plus-jakarta-sans-semi-bold"><?php echo htmlspecialchars($user['FirstName']); ?></h2>
                            <span class="badge bg-warning text-dark me-2">Gold Member</span>
                            <span class="text-muted d-block d-sm-inline">Points: 1,450</span>
                        </div>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Dashboard Section -->
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                        aria-labelledby="v-pills-dashboard-tab">
                        <h3 class="mb-4">Dashboard</h3>
                        <div class="row">
                            <!-- Rental Details -->
                            <div class="col-xl-7">
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0"><i class="bi bi-key-fill me-2"></i> Current Rental</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-sm-flex align-items-center mb-3">
                                            <img src="https://placehold.co/150x100/EFEFEF/333333?text=Toyota+Camry"
                                                class="rounded me-3 mb-3 mb-sm-0" alt="Car Image"
                                                style="max-width: 120px;">
                                            <div>
                                                <h5 class="card-title">Toyota Camry</h5>
                                                <p class="card-text text-muted mb-1">Booking ID: XYZ-12345</p>
                                                <p class="card-text mb-0"><strong>Pickup:</strong> Sept 20, 2025, 10:00
                                                    AM</p>
                                                <p class="card-text mb-0"><strong>Drop-off:</strong> Sept 24, 2025, 6:00
                                                    PM</p>
                                                <p class="card-text text-muted">Sylhet Osmani Int'l Airport (ZYL),
                                                    Sylhet</p>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">1 of 4 Days
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white text-end">
                                        <button class="btn btn-outline-danger btn-sm">Report Issue</button>
                                        <button class="btn bg-success text-primary-0 btn-sm">Extend Rental</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="bi bi-activity me-2"></i> Recent Activity</h5>
                                    </div>
                                    <ul class="list-group list-group-flush"
                                        style="max-height: 260px; overflow-y: auto;">
                                        <li class="list-group-item">Car picked up: Toyota Camry - Sept 20</li>
                                        <li class="list-group-item">Review Submitted: Honda Civic rental - Aug 12</li>
                                        <li class="list-group-item">Profile Information Updated - Sept 5</li>
                                        <li class="list-group-item">Profile Information Updated - Sept 5</li>
                                        <li class="list-group-item">Password Changed - Aug 30</li>
                                        <li class="list-group-item">New Payment Method Added - Aug 15</li>
                                        <li class="list-group-item">Booking Cancelled: Ford Focus - Aug 10</li>
                                        <li class="list-group-item">Car Returned: Honda Civic - Aug 12</li>
                                        <li class="list-group-item">Review Submitted: Honda Civic rental - Aug 12</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bookings Section -->
                    <div class="tab-pane fade" id="bookings" role="tabpanel" aria-labelledby="v-pills-bookings-tab">
                        <h3 class="mb-4">My Bookings</h3>
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                                    href="#active">Active</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#upcoming">Upcoming</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                    href="#completed">Completed</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                                    href="#cancelled">Cancelled</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="active">
                                <!-- Active Booking Card -->
                                <div class="card mb-3 border-primary">
                                    <div class="card-body d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <img src="https://placehold.co/120x80/EFEFEF/333333?text=Toyota+Camry"
                                                class="rounded me-3" alt="Car">
                                            <div>
                                                <h5 class="mb-0">Toyota Camry</h5>
                                                <p class="mb-0 text-muted">Sept 20, 2025 - Sept 24, 2025</p>
                                                <p class="mb-0 text-muted">Sylhet Osmani Int'l Airport</p>
                                            </div>
                                        </div>
                                        <div class="text-md-end">
                                            <span class="d-block h5 mb-2">৳12,500</span>
                                            <button class="btn bg-success text-primary-0 btn-sm">Manage Rental</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="upcoming">
                                <!-- Upcoming Booking Card -->
                                <div class="card mb-3">
                                    <div class="card-body d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <img src="https://placehold.co/120x80/EFEFEF/333333?text=Nissan+X-Trail"
                                                class="rounded me-3" alt="Car">
                                            <div>
                                                <h5 class="mb-0">Nissan X-Trail</h5>
                                                <p class="mb-0 text-muted">Oct 15, 2025 - Oct 18, 2025</p>
                                                <p class="mb-0 text-muted">Dhaka Airport</p>
                                            </div>
                                        </div>
                                        <div class="text-md-end">
                                            <span class="d-block h5 mb-2">৳15,000</span>
                                            <button class="btn btn-primary btn-sm">Manage Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="completed">
                                <!-- Completed Booking Card -->
                                <div class="card mb-3">
                                    <div class="card-body d-md-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center mb-3 mb-md-0">
                                            <img src="https://placehold.co/120x80/EFEFEF/333333?text=Honda+Civic"
                                                class="rounded me-3" alt="Car">
                                            <div>
                                                <h5 class="mb-0">Honda Civic</h5>
                                                <p class="mb-0 text-muted">Aug 10, 2025 - Aug 12, 2025</p>
                                            </div>
                                        </div>
                                        <div class="text-md-end">
                                            <button class="btn btn-outline-secondary btn-sm">View Receipt</button>
                                            <button class="btn btn-warning btn-sm">Leave a Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cancelled">
                                <p>No cancelled bookings found.</p>
                            </div>
                        </div>
                    </div>




                    <!-- Personal Info Section -->

                    <div class="tab-pane fade" id="personal-info" role="tabpanel"
                        aria-labelledby="v-pills-personal-tab">
                        <form action="update.php" method="post">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Personal Information</h5>
                                    <button class="btn btn-primary btn-sm infoedit" type="button"><i class="bi bi-pencil-square me-1"></i>
                                        Edit</button>
                                    <button class="btn  bg-success text-light btn-sm savebtn d-none " type="submit" name="save"><i class="bi bi-floppy mx-1"></i>
                                        Save</button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <strong>Full Name</strong>
                                            <?php $fullName = $user['FirstName'] . ' ' . $user['LastName']; ?>
                                            <input type="text" class="form-control text-muted mb-0 d-none" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>">
                                            <p class="text-muted mb-0"><?php echo htmlspecialchars($fullName); ?></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Email Address</strong>
                                            <input type="email" class="form-control text-muted mb-0 d-none" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>">
                                            <p class="text-muted mb-0"><?php echo htmlspecialchars($user['Email']); ?> <span
                                                    class="badge bg-success">Verified</span></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Phone Number</strong>
                                            <input type="text" class="form-control text-muted mb-0 d-none" name="phone" value="<?php echo htmlspecialchars($user['PhoneNumber']); ?>">
                                            <p class="text-muted mb-0"><?php echo htmlspecialchars($user['PhoneNumber']); ?></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Home Address</strong>
                                            <input type="text" class="form-control text-muted mb-0 d-none" name="address" value="<?php echo htmlspecialchars($user['HomeAddress']); ?>">
                                            <p class="text-muted mb-0"><?php echo htmlspecialchars($user['HomeAddress']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>





                    <!-- Documents Section -->
                    <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="v-pills-documents-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Driver & Documents</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-3">Driver's License</h6>
                                <div class="p-3 bg-light rounded mb-4">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4 mb-2 mb-sm-0"><strong>Number:</strong> D12345678
                                        </div>
                                        <div class="col-sm-6 col-md-4 mb-2 mb-sm-0"><strong>Expires:</strong> 12/2028
                                        </div>
                                        <div class="col-sm-12 col-md-4"><strong>Status:</strong> <span
                                                class="badge bg-success">Verified</span></div>
                                    </div>
                                </div>
                                <h6 class="mb-3">Upload New Documents</h6>
                                <p class="text-muted">Upload a clear scan of your license or passport for faster
                                    checkout.</p>
                                <div class="text-center p-5 border border-2 border-dashed rounded-3" id="drop-area"
                                    style="cursor: pointer; position: relative;">

                                    <!-- Clickable Icon -->
                                    <i class="bi bi-cloud-arrow-up-fill fs-1 text-primary" id="uploadIcon"></i>

                                    <p class="mt-2 mb-0">Drag & drop files here or click the icon to upload</p>

                                    <!-- Hidden File Input -->
                                    <input type="file" id="fileInput" hidden multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Section -->
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Payment Methods</h5>
                                <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i> Add New
                                    Card</button>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-credit-card-2-front-fill me-2"></i>
                                        <span>Visa ending in 4242</span>
                                        <span class="badge bg-secondary ms-2">Primary</span>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm">Remove</button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-credit-card-2-front me-2"></i>
                                        <span>Mastercard ending in 8008</span>
                                    </div>
                                    <button class="btn btn-outline-danger btn-sm">Remove</button>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- Settings Section -->
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Settings</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $successMsg = isset($_GET['success']) ? htmlspecialchars($_GET['success']) : '';
                                $errorMsg = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

                                ?>
                                <?php if ($successMsg): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo $successMsg; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <?php if ($errorMsg): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo $errorMsg; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>


                                <h6>Change Password</h6>
                                <form action="changepass.php" method="post">
                                    <div class="mb-3">
                                        <label for="currentPassword" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="currentPassword" name="oldpass" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="newPassword" name="newpass" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </form>

                                <hr>
                                <h6>Notifications</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="promoEmails" checked>
                                    <label class="form-check-label" for="promoEmails">Receive promotional emails</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </main>

            <!-- Success Modal -->
            <div class="modal fade" id="updateSuccessModal" tabindex="-1" aria-labelledby="updateSuccessLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-sm">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="updateSuccessLabel">Success</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Profile updated successfully.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileInput");
        const uploadIcon = document.getElementById("uploadIcon");


        uploadIcon.addEventListener("click", () => fileInput.click());

        // Drag over effect
        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault(); // this will help to close the open file when we drag over
            dropArea.classList.add("border-primary", "bg-light");
        });

        // Remove effect when leaving drag area
        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("border-primary", "bg-light");
        });

        // Handle drop
        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("border-primary", "bg-light");
            console.log("File dropped");
            console.log(e);
            const files = e.dataTransfer.files;
            handleFiles(files);
        });

        // Handle file selection via input
        fileInput.addEventListener("change", () => {
            handleFiles(fileInput.files);
        });

        // Function to handle files
        function handleFiles(files) {
            for (let file of files) {
                console.log("Selected file:", file.name);

            }
        }


        //personal info edit button functionality
        const editBtn = document.querySelector("#personal-info .infoedit");
        editBtn.addEventListener("click", function() {
            const cardBody = document.querySelector("#personal-info .card-body");

            editBtn.classList.add("d-none");
            const saveBtn = document.querySelector("#personal-info .savebtn");
            saveBtn.classList.remove("d-none");

            saveBtn.addEventListener("click", function() {
                cardBody.querySelectorAll("input").forEach(input => {
                    input.classList.add("d-none");
                    input.classList.remove("d-block");
                });
                cardBody.querySelectorAll("p").forEach(p => {
                    p.classList.remove("d-none");
                });

                editBtn.classList.remove("d-none");
                saveBtn.classList.add("d-none");
            });

            cardBody.querySelectorAll("input").forEach(input => {
                input.classList.remove("d-none");
                input.classList.add("d-block");
            });


            cardBody.querySelectorAll("p").forEach(p => {
                p.classList.add("d-none");
            });
        });













        document.addEventListener("DOMContentLoaded", function() {
            // Get current URL hash
            const hash = window.location.hash;

            if (hash) {
                // Find the corresponding tab button
                const tabTrigger = document.querySelector('#v-pills-tab a[href="' + hash + '"]');
                if (tabTrigger) {
                    // Activating the tab
                    const tab = new bootstrap.Tab(tabTrigger);
                    tab.show();


                    const tabContent = document.querySelector(hash);
                    if (tabContent) {
                        tabContent.scrollIntoView({
                            behavior: "smooth"
                        });
                    }
                }
            }
        });




        document.addEventListener("DOMContentLoaded", function() {
            // Check URL for parameter
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('update_success')) {
                // Show Bootstrap modal
                const successModal = new bootstrap.Modal(document.getElementById('updateSuccessModal'));
                successModal.show();

                // Remove parameter from URL without reloading
                history.replaceState(null, '', window.location.pathname + window.location.hash);
            }
        });
    </script>







</body>

</html>