<?php
session_start();
include 'dbconfig.php';


if (!isset($_SESSION['email'])) {
    header("Location: registration.php?error=" . urlencode("Invalid access."));
    exit;
}


$showModal = isset($_GET['success']) && $_GET['success'] == 1;

// Check for error message
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify OTP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<style>
body {
    background-color: #f8f9fa;
}

.verify-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.verify-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.verify-left {
    padding: 40px;
}

.verify-right {
  
    display: flex;
    align-items: center;
    justify-content: center;
}

.verify-right img {
    max-width: 100%;
    height: auto;
}

.btn-verify {
    background-color: #4a5cff;
    color: white;
    font-weight: 500;
}

.btn-verify:hover {
    background-color: #3746d1;
}
</style>

<body style="padding-top: 55px;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="Assets/logo.png" alt="Logo" class="logo_img" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#vehicles">Vehicles</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#details">Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header / OTP Form -->
    <header class="verify-container">
        <div class="container min-vh-100 d-flex align-items-center justify-content-center">
            <div class="row w-100 m-3">
                <!-- Left Section -->
                <div class="col-md-6 ps-5 verify-left">
                    <img src="Assets/boy.png" alt="Login Illustration" class="img-fluid" style="max-height: 700px" />
                </div>

                <!-- Right Section -->
                <div class="col-md-6 d-flex flex-column align-items-center justify-content-center verify-right">
                    <?php if ($error != ''): ?>
                    <div class="container pt-1">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="verify-card h-100 card p-4 p-md-5 shadow-sm">
                        <a href="login.php" class="d-block mb-3 text-decoration-none text-muted">
                            <i class="bi bi-arrow-left-short"></i> Back to login
                        </a>
                        <h3 class="fw-bold mb-3">Verify Code</h3>
                        <p class="text-muted">An authentication code has been sent to your email.</p>
                        <form action="otp_verify.php" method="post">
                            <div class="mb-3">
                                <label for="code" class="form-label">Enter Code</label>
                                <div class="input-group">
                                    <input type="text" id="code" class="form-control" placeholder="Enter Code" name="code"
                                        required />
                                </div>
                            </div>
                            <p class="small">Didn’t receive a code?
                                <a href="#" class="text-danger text-decoration-none">Resend</a>
                            </p>
                            <button type="submit" class="btn btn-verify w-100" name="verify">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Success Modal -->
    <div class="modal fade" id="otpSuccessModal" tabindex="-1" aria-labelledby="otpSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="otpSuccessLabel">Success!</h5>
                </div>
                <div class="modal-body">
                    Your OTP has been successfully verified.
                </div>
                <div class="modal-footer">
                    <button type="button" id="otpOkBtn" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($showModal): ?>
    <script>
        var otpModalEl = document.getElementById('otpSuccessModal');
        var otpModal = new bootstrap.Modal(otpModalEl);
        otpModal.show();

        document.getElementById('otpOkBtn').addEventListener('click', function () {
            window.location.href = 'homepage.php';
        });
    </script>
    <?php endif; ?>

</body>

</html>
