<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <link rel="icon" type="image/x-icon" href="Assets/favicon.ico" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body style="padding-top: 55px;">
  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-none">
    <div class="container-fluid">
      <!-- logo -->
      <a class="navbar-brand" href="index.php"><img src="Assets/logo.png" alt="Logo" class="logo_img" />
      </a>
      <!-- Navbar toggler for mobile view -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a
              class="nav-link active plus-jakarta-sans-semi-bold"
              aria-current="page"
              href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link plus-jakarta-sans-semi-bold"
              href="index.php#vehicles">Vehicles</a>
          </li>

          <li class="nav-item">
            <a
              class="nav-link plus-jakarta-sans-semi-bold"
              href="index.php#details">Details</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link plus-jakarta-sans-semi-bold"
              href="index.php#about">About Us</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link plus-jakarta-sans-semi-bold"
              href="index.php#contact">Contact Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="login-container">
    <form action="validatelogin.php" method="post">
      <div
        class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 m-3">
          <!-- Left Section -->
          <div class="col-md-6 ps-5">
            <img
              src="Assets/boy.png"
              alt="Login Illustration"
              class="img-fluid"
              style="max-height: 700px" />
          </div>

          <!-- Right Section -->
          <div
            class="col-md-6 d-flex flex-column align-items-center justify-content-center illustration">
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
                <h4 class="fw-bold text-primary mb-3" onclick="location.href='index.php'">MORENT</h4>
              </div>
              <h3 class="fw-bold">Welcome Back</h3>
              <p class="text-muted mb-4">
                Please Enter Your Email & Password
              </p>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Ex:john.doe@gmail.com" name="email" />
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="••••••••••••" name="password"/>
                  <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                </div>
              </div>

              <!-- Remember + Forgot -->
              <div
                class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember"/>
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <a href="#" class="text-danger small">Forgot Password</a>
              </div>

              <!-- Login Button -->
              <button type="submit" class="btn btn-primary w-100 mb-3">
                Login
              </button>

              <!-- Signup -->
              <p class="text-center small">
                Don’t have an account? <a href="registration.php">Sign up</a>
              </p>

              <!-- Divider -->
              <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1" />
                <span class="mx-2 text-muted small">Or login with</span>
                <hr class="flex-grow-1" />
              </div>

              <!-- Social Buttons -->
              <div class="d-flex gap-2 justify-content-center">
                <button class="social-btn">
                  <img
                    src="https://cdn-icons-png.flaticon.com/512/733/733547.png"
                    alt="" />
                  Facebook
                </button>
                <button class="social-btn">
                  <img
                    src="https://cdn-icons-png.flaticon.com/512/300/300221.png"
                    alt="" />
                  Google
                </button>
                <button class="social-btn">
                  <img
                    src="https://cdn-icons-png.flaticon.com/512/831/831276.png"
                    alt="" />
                  Apple
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </header>

  <!-- Bootstrap JS + Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</body>

</html>