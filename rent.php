<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental UI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f8f9;
        }

        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            background-color: #fff;
            border-radius: 12px;
            padding: 24px;
        }

        .main-content {
            border-radius: 12px;
            padding: 24px;
        }

        .car-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .car-card:hover {
            transform: translateY(-5px);
        }

        .review-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
        }

        .btn-rent {
            background-color: #3563e9;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .btn-rent:hover {
            background-color: #2b57d6;
            color: #fff;
        }

        .btn-show-more {
            color: #3563e9;
            cursor: pointer;
        }

        .review-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .review-text.expanded {
            -webkit-line-clamp: unset;
        }

        .text-blue {
            color: #3563e9 !important;
        }

        .text-light-gray {
            color: #90a3bf !important;
        }

        .badge-info {
            background-color: #f6f7f9;
            color: #90a3bf;
        }

        @media (max-width: 992px) {
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg sticky-top navbar-custom p-4">
        <div class="container-fluid">
            <a class="navbar-brand me-auto text-blue fw-bold fs-4" href="#">MORENT</a>
            <div class="d-flex align-items-center me-3">
                <div class="input-group d-none d-lg-flex me-3" style="width: 400px;">
                    <input type="text" class="form-control rounded-pill px-3 py-2" placeholder="Search something here">
                    <span class="input-group-text bg-white border-0 ps-0" style="margin-left: -50px; z-index: 1;">
                        <i class="bi bi-search text-secondary"></i>
                    </span>
                </div>
                <ul class="navbar-nav d-flex flex-row align-items-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link mx-2" href="#"><i class="bi bi-heart fs-5 text-secondary"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link mx-2" href="#"><i class="bi bi-bell-fill fs-5 text-secondary"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link mx-2" href="#"><i class="bi bi-gear-fill fs-5 text-secondary"></i></a>
                    </li>
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://placehold.co/40x40/E8D2E1/ffffff?text=U" alt="Profile" class="rounded-circle" width="40" height="40">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="container-fluid py-4">
        <div class="row">
            <!-- Sidebar (d-none d-lg-block for responsiveness) -->
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar">
                    <h5 class="fw-bold mb-3">TYPES</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="sport" checked>
                        <label class="form-check-label text-light-gray" for="sport">
                            Sport (10)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="suv">
                        <label class="form-check-label text-light-gray" for="suv">
                            SUV (12)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="mpv">
                        <label class="form-check-label text-light-gray" for="mpv">
                            MPV (16)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="sedan">
                        <label class="form-check-label text-light-gray" for="sedan">
                            Sedan (20)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="coupe">
                        <label class="form-check-label text-light-gray" for="coupe">
                            Coupe (14)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="hatchback">
                        <label class="form-check-label text-light-gray" for="hatchback">
                            Hatchback (14)
                        </label>
                    </div>

                    <h5 class="fw-bold mt-4 mb-3">CAPACITY</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="2person">
                        <label class="form-check-label text-light-gray" for="2person">
                            2 Person (10)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="4person">
                        <label class="form-check-label text-light-gray" for="4person">
                            4 Person (14)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="6person">
                        <label class="form-check-label text-light-gray" for="6person">
                            6 Person (12)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="8more">
                        <label class="form-check-label text-light-gray" for="8more">
                            8 or More (16)
                        </label>
                    </div>

                    <h5 class="fw-bold mt-4 mb-3">PRICE</h5>
                    <input type="range" class="form-range" id="priceRange" min="0" max="100">
                    <p class="text-center text-light-gray mt-2">Max. $100.00</p>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="main-content">
                    <!-- Banner -->
                    <div class="card text-white p-4 rounded-4" style="background: url('../Assets/bg.png') no-repeat center/cover;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h2 class="card-title fw-bold">Sports car with the best design and acceleration</h2>
                                    <p class="card-text">Safety and comfort while driving a luxury car is our highest priority.</p>
                                    <button class="btn btn-light rounded-pill px-4">Rent Now</button>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-end">
                                    <img src="Assets/car.png" class="img-fluid" alt="Sports car">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Car Details Section -->
                    <div class="mt-4 car-card p-4">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="fw-bold mb-2">Nissan GT - R</h3>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <i class="bi bi-star-half text-warning me-2"></i>
                                    <span class="text-secondary fw-semibold">440+ Reviewer</span>
                                </div>
                                <p class="text-secondary">Nismo has become the embodiment of Nissan's outstanding performance, inherited by the most challenging proving ground, the "Nurburgring".</p>

                                <div class="row gx-4 mb-4">
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-secondary">Type Car</span>
                                            <span class="text-end fw-semibold">Sport</span>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-secondary">Capacity</span>
                                            <span class="text-end fw-semibold">2 Person</span>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-secondary">Steering</span>
                                            <span class="text-end fw-semibold">Manual</span>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-secondary">Gasoline</span>
                                            <span class="text-end fw-semibold">70L</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fw-bold fs-4 mb-0">$80.00/ <span class="text-secondary fw-normal fs-6">day</span></p>
                                    <button class="btn btn-rent">Rent Now</button>
                                </div>
                            </div>
                            <div class="col-lg-5 text-center mt-3 mt-lg-0">
                                <img src="Assets/carthumb.png" class="img-fluid" alt="Car Image" style="border-radius: 12px;">
                                <div class="d-flex justify-content-center mt-3">
                                    <img src="Assets/interior.png" class="img-fluid rounded me-2" alt="Car Thumbnail">
                                    <img src="https://placehold.co/80x80/f6f7f9/90a3bf?text=Car+Thumb" class="img-fluid rounded me-2" alt="Car Thumbnail">
                                    <img src="https://placehold.co/80x80/f6f7f9/90a3bf?text=Car+Thumb" class="img-fluid rounded" alt="Car Thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="mt-4">
                        <h5 class="fw-bold mb-3">Reviews <span class="badge badge-info ms-2">13</span></h5>
                        <div id="reviews-container">
                            <!-- Review 1 -->
                            <div class="review-card">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://placehold.co/50x50/f6f7f9/90a3bf?text=A" class="rounded-circle me-3" alt="Reviewer Avatar">
                                    <div class="d-flex justify-content-between w-100">
                                        <div>
                                            <h6 class="fw-bold mb-0">Alex Stanton</h6>
                                            <p class="text-secondary mb-0">Founder & CEO</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-secondary">21 July 2022</small>
                                            <div>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="review-text">
                                    Very happy with the service from the MORENT App. Moral has become a reliable car rental company. I am very happy with the quality of cars and good care of the staff and I feel very at home.
                                </p>
                            </div>

                            <!-- Review 2 -->
                            <div class="review-card">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://placehold.co/50x50/f6f7f9/90a3bf?text=S" class="rounded-circle me-3" alt="Reviewer Avatar">
                                    <div class="d-flex justify-content-between w-100">
                                        <div>
                                            <h6 class="fw-bold mb-0">Skyler Dias</h6>
                                            <p class="text-secondary mb-0">Student</p>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-secondary">20 July 2022</small>
                                            <div>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="review-text">
                                    Nismo has become the embodiment of Nissan's outstanding performance, inherited by the most challenging proving ground, the "Nurburgring". Very happy with the service from the MORENT App. Moral has become a reliable car rental company. I am very happy with the quality of cars and good care of the staff and I feel very at home.
                                </p>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a class="btn-show-more" href="#" onclick="toggleReviews(event)">Show All <i class="bi bi-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white py-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h4 class="text-blue fw-bold">MORENT</h4>
                    <p class="text-secondary mt-3">Our vision is to provide convenience and help increase your sales business.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-lg-0">
                    <h6 class="fw-bold">About</h6>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="#" class="text-decoration-none text-secondary">How it works</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Featured</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Partnership</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Business Relation</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-lg-0">
                    <h6 class="fw-bold">Community</h6>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="#" class="text-decoration-none text-secondary">Events</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Blog</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Podcast</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Invite a friend</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-lg-0">
                    <h6 class="fw-bold">Socials</h6>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="#" class="text-decoration-none text-secondary">Discord</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Instagram</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Twitter</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Facebook</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="text-secondary mb-2 mb-md-0">&copy;2022 MORENT. All right reserved</p>
                <div class="d-flex">
                    <a href="#" class="text-decoration-none text-dark me-4">Privacy & Policy</a>
                    <a href="#" class="text-decoration-none text-dark">Terms & Condition</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        function toggleReviews(event) {
            event.preventDefault();
            const reviewsContainer = document.getElementById('reviews-container');
            const showMoreBtn = event.currentTarget;

            const reviews = reviewsContainer.querySelectorAll('.review-card');
            reviews.forEach(review => {
                const text = review.querySelector('.review-text');
                text.classList.toggle('expanded');
            });

            if (showMoreBtn.innerText.includes('Show All')) {
                showMoreBtn.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
            } else {
                showMoreBtn.innerHTML = 'Show All <i class="bi bi-chevron-down"></i>';
            }
        }
    </script>
</body>
</html>
