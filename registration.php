<?php
session_start();
include 'dbconfig.php';



if(isset($_SESSION['email']) && !empty($_SESSION['email']) && isset($_SESSION['isLogedIN']) && $_SESSION['isLogedIN'] === true){
    header("Location: homepage.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="css/style.css">

</head>

<body style="padding-top: 55px;">



    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-none">
        <div class="container-fluid">
            <!-- logo -->
            <a class="navbar-brand" href="index.php"><img src="Assets/logo.png" alt="Logo" class="logo_img">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>




            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active plus-jakarta-sans-semi-bold" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link plus-jakarta-sans-semi-bold" href="index.php#vehicles">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link plus-jakarta-sans-semi-bold" href="index.php#details">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link plus-jakarta-sans-semi-bold" href="index.php#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link plus-jakarta-sans-semi-bold" href="index.php#contact">Contact Us</a>
                    </li>




                </ul>




            </div>

        </div>
    </nav>







    <!-- Header -->
    <header class="login-container">
        <form action="validateregistration.php" method="post">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center ">



                <div class="row w-100 m-3">

                    <!-- Left Section -->
                    <div class="col-md-6 ps-5">
                        <img src="Assets/boy.png" alt="Login Illustration" class="img-fluid" style="max-height: 800px;">
                    </div>

                   
                    <!-- Right Section -->
                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center pt-0 mb-5">
                         <?php if (isset($_REQUEST['error'])) {
                            // from url take the as input
                            $error = htmlspecialchars($_REQUEST['error']);
                            echo '
                <div class="container pt-1">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> ' . $error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                ';
                        }
                        ?>  
                        <div class="login-card h-100 card p-4 p-md-5 shadow-sm">
                            
                            <div class="mb-4">
                                <h4 class="fw-bold text-primary mb-3">MORENT</h4>
                            </div>
                            <h3 class="fw-bold">Register</h3>
                            <p class="text-muted mb-4">Let's Sign up first for enter into Morent Website.Uh She Up!</p>



                            <div class="row mb-3">
                                <!-- name -->
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fw-bolder">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bolder">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                </div>


                            </div>



                            <div class="row mb-3">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fw-bolder">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" require>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bolder">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="••••••••••••" name="password">
                                    <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="••••••••••••" name="confirm_password">
                                    <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="termsCheck" name="terms" required>
                                <label class="form-check-label" for="termsCheck">
                                    I agree to all the <a href="#" class="text-danger">Terms</a> and <a href="#"
                                        class="text-danger">Privacy
                                        Policies</a>
                                </label>
                            </div>



                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary w-100 mb-3" name="register">Register</button>

                            <!-- Signup -->
                            <p class="text-center small">Already have an account? <a href="login.php">Sign in</a></p>

                            <!-- Divider -->
                            <div class="d-flex align-items-center my-3">
                                <hr class="flex-grow-1">
                                <span class="mx-2 text-muted small">Or login with</span>
                                <hr class="flex-grow-1">
                            </div>

                            <!-- Social Buttons -->
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="social-btn"><img
                                        src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="facebook">
                                    Facebook</button>
                                <button class="social-btn"><img
                                        src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="google">
                                    Google</button>
                                <button class="social-btn"><img
                                        src="https://cdn-icons-png.flaticon.com/512/831/831276.png" alt="apple">
                                    Apple</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </header>

    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>

</html>