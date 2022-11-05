<!DOCTYPE html>
<!--
		Developer	: Ecompartner
		Website		: https://ecompartner.asia/
		Copyright	: Ecompartner
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{ asset('frontend/Images/favicon.png')}}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">


    <title>{{config('app.name')}}</title>
</head>

<body>
    <!-- Preloader starts -->
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <!-- Preloader starts -->

    <!-- Navigation Bar starts -->
    <header id="header">
        <div class="menu-btn"><img src="{{ asset('frontend/Images/menu.svg')}}" alt="menu"></div>
        <div href="#" class="logo"><a href="#"><img src="{{ asset('frontend/Images/logo.svg')}}" alt="logo"> </a></div>
        <div class="navigation">
            <ul class="menu">
                <div class="close-btn"><i class="fa fa-times"></i></div>
                <li class="menu-item"><a href="#">Home</a></li>
                <li class="menu-item"><a href="#features">Our Services</a></li>
                <li class="menu-item"><a href="#about">About us</a></li>
                <li class="menu-item"><a href="#contact-us">Contact us</a></li>
                <li class="menu-item">
                    <a href="{{route('login')}}"> <i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                </li>
                <li class="menu-item">
                    <a style="background-color: #fff;padding: 7px 12px 7px 12px;border-radius: 12px;color: var(--primary-color)" href="{{route('register')}}" class="text-primary"> <i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a>
                </li>

            </ul>
        </div>
    </header>
    <!-- Navigation Bar ends -->

    <section >
        @yield('content')
    </section>

    <!-- Footer Section starts -->
    <footer id="footer">
        <div class="footer-top"><img src="{{ asset('frontend/Images/footer-top.svg')}}" alt="image">
            <div class="sub-to-newsletter">
                <h1>Subscribe Our <span>newsletter</span> </h1>
                <div>
                    <input type="email" placeholder="Your Email">
                    <button type="submit" class="btn btn-2"><i class="fa fa-envelope"></i> Subscribe</button>
                </div>
            </div>
        </div>
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="footer-column">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{url('page/policy')}}">Terms & Conditions</a></li>
                            <li><a href="{{url('page/terms-conditions')}}">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Contact us</h4>
                        <ul>
                            <li><a href="mailto:contact@ecompartner.asia">contact@ecompartner.asia</a></li>
                            <li><a href="tel:971582453879">+971582453879</a></li>

                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="credit">Copyright ©2022 @ecompartner.asia

        </div>
    </footer>
    <!-- Footer Section ends -->


    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
    <!--Javascript -->
    <script src="{{ asset('frontend/js/index.js')}}"></script>
</body>

</html>
