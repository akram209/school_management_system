<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Trible A School</title>
    <meta name="description" content="">
    <meta name="keywords" content="">



    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link href="{{ asset('build/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

   
    <link href="{{ asset('build/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
             
                <h1 class="sitename">Trible A School</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home<br></a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('login') }}">login</a></li>


                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>



        </div>
    </header>

    <main class="main">

        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('build\assets\images\hero-bg.jpg') }}" alt="" data-aos="fade-in">
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="100">Welcome Students</h2>
                <p data-aos="fade-up" data-aos-delay="200">This is a place where you can get your assignments and get
                    your best grades .</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a class="btn-get-started" href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>

        </section>

        <section id="why-us" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('build\assets\images\about.jpg') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>10 Key Benefits of a School Management System</h3>
                        <p class="fst-italic">
                            A School Management System (SMS) is a comprehensive software solution designed to streamline
                            school operations and improve the overall educational experience. Here are 10 key benefits
                            of implementing an SMS:
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Centralized Data Management</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Improved Communication</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Efficient Attendance Management</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Enhanced Administrative Efficiency</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Student Performance Tracking</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Financial Management</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Timetable and Scheduling</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Scalability and Flexibility</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Security and Data Privacy</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Accessible Anywhere, Anytime</span></li>
                        </ul>
                    </div>

                </div>


    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Trible A School</span>
                    </a>
                    <div id="contact" class="footer-contact pt-3">
                        <p>Akram Ahemd Ahmed </p>
                        <p>Zagazig - Egypt </p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+20 1220945823</span></p>
                        <p><strong>Email:</strong> <span>akramhesham209@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="" style="color: rgb(56, 110, 236)"><i class="bi bi-twitter-x"></i></a>
                        <a href="" style="color: rgb(56, 110, 236)"><i class="bi bi-facebook"></i></a>
                        <a href="" style="color: rgb(56, 110, 236)"><i class="bi bi-instagram"></i></a>
                        <a href="" style="color: rgb(56, 110, 236)"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">School Management Platform</a></li>
                        <li><a href="#">Online Assignment</a></li>
                        <li><a href="#">Fee Management</a></li>
                        <li><a href="#">Attendance System</a></li>
                        <li><a href="#">Grades Management</a></li>
                        <li><a href="#">Exams Management</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-roles">
                    <h4>Roles in platform</h4>
                    <ul>
                        <li><a href="#">Student</a></li>
                        <li><a href="#">Parent</a></li>
                        <li><a href="#">Teacher</a></li>
                        <li><a href="#">Admin</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Trible A School</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">

                Designed by <a href="https://bootstrapmade.com/">Akram Hesham</a>
            </div>
        </div>

    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="{{ asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('build/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('build/assets/js/main.js') }}"></script>

</body>

</html>
