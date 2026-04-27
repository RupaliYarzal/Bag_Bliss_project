<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bag Bliss</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">123 Street, New York</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">info@gmail.com</a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="/privacy" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                    <a href="/terms" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    <a href="/return" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">

                <img src="{{ asset('images/logo1.jpg') }}" alt="Logo" style="height: 50px; margin-right: 7px;">
                <h1 class="text-primary display-6 mb-0">Bag Bliss</h1>


                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="nalvbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="/" class="nav-item nav-link active">Home</a> {{-- href=route name --}}
                        <a href="/shop" class="nav-item nav-link">Shop</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="{{ url('/cart') }}" class="dropdown-item">Cart</a>
                                <a href="{{ url('/checkout') }}" class="dropdown-item">Checkout</a>

                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <button
                            class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i>
                        </button>

                        <!-- shopping cart icon -->
                        @php
                            $cart = session('cart', []);
                            $cartCount = array_sum(array_column($cart, 'quantity'));
                        @endphp

                        <a href="{{ url('/cart') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                {{ $cartCount }}
                            </span>
                        </a>

                        {{-- If user is logged in --}}

                        <div class="nav-links" style="display: flex; gap: 10px;">
                            @if (session()->has('user_id'))
                                <div class="dropdown" style="position: relative;">
                                    <a href="#"
                                        style="background-color: rgb(129, 196, 8); padding: 6px 10px; color: white; text-decoration: none; display: inline-block; border-radius: 5px;">
                                        <i class="fas fa-user"></i> Profile
                                    </a>

                                    <div class="dropdown-content"
                                        style="
                                            position: absolute;
                                            background-color: white;
                                            min-width: 150px;
                                            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
                                            border-radius: 5px;
                                            z-index: 1;
                                            top: 38px;
                                        ">
                                        <a href="{{ url('my-orders/' . urlencode(session('user_name'))) }}"
                                            style="color: black; padding: 12px 16px; display: block; text-decoration: none;">
                                            My Orders
                                        </a>

                                        <a href="{{ url('show-profile') }}"
                                            style="color: black; padding: 12px 16px; display: block; text-decoration: none;">Show
                                            Profile</a>
                                        <a href="{{ url('logout') }}"
                                            style="color: red; padding: 12px 16px; display: block; text-decoration: none;">Logout</a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ url('login') }}"
                                    style="background-color: rgb(129, 196, 8);; padding: 6px 10px; color: white; text-decoration: none;">Login</a>
                            @endif
                        </div>

                        <style>
                            .dropdown-content {
                                display: none;
                            }

                            .dropdown:hover .dropdown-content {
                                display: block;
                            }

                            .dropdown-content a:hover {
                                background-color: #f1f1f1;
                            }
                        </style>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('/search') }}" method="GET" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Search Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="query" class="form-control" placeholder="Enter product name..."
                        required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Search End -->

    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5);">
                <div class="row g-4">
                    <div class="col-lg-3">

                        <h1 class="text-primary mb-0">Bag Bliss</h1>
                        <p class="text-secondary mb-0">Carry Style, Simply.</p>

                    </div>
                    <div class="col-lg-6">
                        <form action="{{ url('/subscribe') }}" method="POST">
                            @csrf
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email"
                                    name="email" placeholder="Your Email" required>
                                <button type="submit"
                                    class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                                    style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle"
                                href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle"
                                href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like Us!</h4>
                        <p class="mb-4">We offer quality, design, and comfort all in one stylish bag — redefining
                            your accessory game.</p>
                        <a href="{{ url('/about') }}"
                            class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="{{ url('/about') }}">About Us</a>
                        <a class="btn-link" href="{{ url('/contact') }}">Contact Us</a>
                        <a class="btn-link" href="{{ url('/privacy') }}">Privacy Policy</a>
                        <a class="btn-link" href="{{ url('/terms') }}">Terms & Conditions</a>
                        <a class="btn-link" href="{{ url('/return') }}">Return Policy</a>
                        <a class="btn-link" href="{{ url('/faq') }}">FAQs & Help</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="{{ url('/show-profile') }}">My Account</a>
                        <a class="btn-link" href="{{ url('/cart') }}">Shopping Cart</a>
                        <a class="btn-link" href="{{ url('my-orders/' . urlencode(session('user_name'))) }}">Order History</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: <a href="mailto:bagbliss@gmail.com" class="text-white">bagbliss@gmail.com</a></p>
                        <p>Phone: <a href="tel:+012345678910" class="text-white">+0123 4567 8910</a></p>
                        <p>Payment Accepted</p>
                        <img src="{{ asset('frontend/img/payment.png') }}" class="img-fluid" alt="Payment Options">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
