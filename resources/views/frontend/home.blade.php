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

    <!-- Home Section starts -->
    <section id="home">
        <div class="home-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="home-text">
                        <h1>Forget Dropshipping Problems And Welcome To The Cash World ! </h1>
                        <h2>New Way To Launch Your e-commerce Business on Un-Tapped Market All From One Platform

                            </h2>
                        <a href="{{url('get-started')}}" class="btn btn-1">Get Started <i class="fas fa-angle-double-right"></i></a>
                    </div>
                    <div class="home-img">
                        <img style="max-height: 500px" src="{{ asset('frontend/Images/laptop2.png')}}" alt="Gradesy">
                    </div>
                </div>
            </div>
        </div>
        <div class="home-bottom"><img src="{{ asset('frontend/Images/home-bottom.svg')}}" alt=""></div>
    </section>
    <!-- Home Section ends -->
    <br>
    <br>
    <!-- Feature Section starts -->
    <section id="features">
        <div class="features-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="section-title">
                        <h2>Our <span>Services</span></h2>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-ship"></i></div>
                        <h1>Sourcing</h1>
                        <p>Get better and faster sourcing for your products directly from china factories.</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-cubes"></i></div>
                        <h1>Fulfillment</h1>
                        <p>product customization, custom packaging, fulfillment at our warehouses.</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <h1>Call Center</h1>
                        <p>Get a professional call-center to confirm leads and upsell products.</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-truck"></i></div>
                        <h1>Shipping</h1>
                        <p>Get fast shipping Increase conversion rates with Cash On Delivery (COD).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section ends -->

    <!-- About Section starts -->
    <section id="about">
        <div class="particle-1"></div>
        <div class="particle-2"></div>
        <div class="about-section">
            <div class="container">
                <div class="row align-item-center justify-content-center">
                    <div class="about-img">
                        <img src="{{ asset('frontend/Images/manwithlaptop.png')}}" alt="Gradesy">
                    </div>
                    <div class="about-text">
                        <div class="section-title">
                            <h2>The Only Partner You Need For Your  
                                <span>Ecommerce Business 
                            </span></h2>
                            <p>We are here to help you Start, Optimize and Scale your e-commerce by giving you easy access to our, fulfillment,call centers and shipping carriers in many countries.</p>
                            <p>So do only the marketing for your products and we will do the rest.
                                and Just Focus on increase your number of orders,products.
                            </p>
                         
                            <a href="{{url('get-started')}}" class="btn btn-2">Get Started <i class="fas fa-angle-double-right"></i></a>

                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section ends -->

    <!-- ScreenShot Section starts -->
    <section id="screenshots">
        <div class="screenshots-section">
            <div class="container">
                <div class="section-title">
                    <h2>SELL On 
                        <span>Un-Tapped Markets
                    </span></h2>
                </div>
                <div class="row">
                    <div class="screenshots-carousel owl-carousel">
                        <div class="screenshots-item"><img src="{{ asset('frontend/Images/Screenshots/3.svg')}}" alt="screenshot"></div>
                        <div class="screenshots-item"><img src="{{ asset('frontend/Images/Screenshots/22.svg')}}" alt="screenshot"></div>
                        <div class="screenshots-item"><img src="{{ asset('frontend/Images/Screenshots/11.svg')}}" alt="screenshot"></div>
                        <div class="screenshots-item"><img src="{{ asset('frontend/Images/Screenshots/4.svg')}}" alt="screenshot"></div>
                        <div class="screenshots-item"><img src="{{ asset('frontend/Images/Screenshots/5.svg')}}" alt="screenshot"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ScreenShot Section ends -->

    <section id="features">
        <div class="features-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="section-title">
                        <h2>GET A SPECIAL<span> ACCESS TO</span></h2>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-laptop"></i></div>
                        <h1>System Access</h1>
                        <p>you will have access to our advanced platform to track all your orders , COD Reports..</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-address-card"></i></div>
                        <h1> Support</h1>
                        <p>dedicated account manager that will guide you thru your E-commerce journey.</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-play-circle"></i></div>
                        <h1>Free Training
                        </h1>
                        <p>we offer a Free training to learn more about the COD business model, Advertising strategy...</p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <h1>Live Meetings</h1>
                        <p>Our COD experts will meet you live 2 times a month to discuss all business related issues.</p>
                    </div>
               
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                        <h1>Hot Products</h1>
                        <p>we sent a list of hot products each week to our active clients .
                        </p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-signal"></i></div>
                        <h1>scalling</h1>
                        <p>we will be with you on all steps to scale your number of orders, products.  </p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-cubes"></i></div>
                        <h1>branding</h1>
                        <p>Get a professional costumer services product,packaging customization...
                        </p>
                    </div>
                    <div class="feature-item">
                        <div class="icon"><i class="fa fa-check-circle"></i></div>
                        <h1> Experience
                        </h1>
                        <p>We will help you avoid mistakes and make the rights decisions at the right time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <div class="section-title">
                        <h2>GET STARTED WITH A <span> FREE MEETING</span></h2>
                    </div>
    
<section>
   <!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/d/gqh-3hy-628?hide_gdpr_banner=1&primary_color=0467ff" style="min-width:320px;height:630px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Calendly inline widget end -->
    </section>

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
                            <li><a href="{{route('view.page', 'terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('view.page', 'policy')}}">Privacy Policy</a></li>
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
                            <a href="https://www.facebook.com/Ecompartner.asia"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/ecompartner.asia/"><i class="fab fa-instagram"></i></a>
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