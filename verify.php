<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="Assets/favicon.ico" />
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
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .verify-left {
      padding: 40px;
    }
    .verify-right {
      background: #f3f6fb;
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
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-none">
        <div class="container-fluid">
            <!-- logo -->
            <a class="navbar-brand" href="index.php"><img src="Assets/logo.png" alt="Logo" class="logo_img" />
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active plus-jakarta-sans-semi-bold" aria-current="page"
                            href="index.php">Home</a>
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
    <header class="verify-container">
        <form action="" method="post">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                <div class="row w-100 m-3">


                    <!-- Left Section -->
                    <div class="col-md-6 ps-5 verify-left">
                        <img src="Assets/boy.png" alt="Login Illustration" class="img-fluid"
                            style="max-height: 700px" />
                    </div>


                    <!-- Right Section -->
                    <div class="col-md-6 d-flex align-items-center justify-content-center verify-right">
                        <div class="verify-card h-100 card p-4 p-md-5 shadow-sm">
                            <a href="#" class="d-block mb-3 text-decoration-none text-muted">
                                <i class="bi bi-arrow-left-short"></i> Back to login
                            </a>
                            <h3 class="fw-bold mb-3">Verify code</h3>
                            <p class="text-muted">
                                An authentication code has been sent to your email.
                            </p>


                            <p class="text-muted mb-4">
                                Please Enter Your Email & Password
                            </p>

                            
                                <div class="mb-3">
                                    <label for="code" class="form-label">Enter Code</label>
                                    <div class="input-group">
                                        <input type="text" id="code" class="form-control" placeholder="Enter Code"
                                            value="7789BM6X">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <p class="small">Didn’t receive a code?
                                    <a href="#" class="text-danger text-decoration-none">Resend</a>
                                </p>

                                <button type="submit" class="btn btn-verify w-100">Verify</button>
                           




                        </div>
                    </div>
                </div>
            </div>
        </form>
    </header>

    <!-- Bootstrap JS + Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</body>

</html>