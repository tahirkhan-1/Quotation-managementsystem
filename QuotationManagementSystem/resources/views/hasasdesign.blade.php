<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasas Construction - Building Pakistan's Future</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a3a5f;
            --secondary-color: #3825e6;
            --accent-color: #2c5282;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --text-color: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #f9f9f9;
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
   .navbar {
    background-color: #1a3a5f !important; /* Deep blue instead of default bg-dark */
}

        .navbar.scrolled {
            background-color: rgba(0, 0, 0, 0.95);
            padding: 10px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand span {
    font-size: 1.3rem;
    letter-spacing: 0.5px;
    color: #ffffff;
}

        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff !important;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            margin-right: 10px;
            border-radius: 4px;
        }

.navbar-nav .nav-link {
    font-weight: 500;
    padding-left: 18px;
    padding-right: 18px;
    transition: color 0.3s;
}

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--secondary-color);
            transition: width 0.3s;
        }
.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #38b6ff !important; /* Nice hover/active color */
}

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--secondary-color) !important;
        }

        .btn-contact {
            background-color: var(--secondary-color);
            color: #fff;
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-contact:hover {
            background-color: #2a1db3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(56, 37, 230, 0.3);
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(rgba(26, 58, 95, 0.85), rgba(26, 58, 95, 0.85)),
                        url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
            padding: 150px 0 100px;
            text-align: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .hero-section p {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .text-green {
            color: #4CAF50;
        }

        .text-white-custom {
            color: #ffffff;
        }

        .scroll-indicator {
            margin-top: 50px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* ===== WELCOME SECTION ===== */
        .welcome-photo-section {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background:
                linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
                url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1600&q=80')
                center/cover no-repeat;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 50px 5%;
        }

        .overlay-content {
            max-width: 520px;
            color: #ffffff;
            text-align: justify;
            line-height: 1.5;
        }

        .overlay-content h6 {
            font-size: 2rem;
            font-weight: 400;
            margin-bottom: 25px;
            text-align: right;
            letter-spacing: 1px;
        }

        .overlay-content p {
            font-size: 1.0rem;
            margin-bottom: 22px;
            text-align: justify;
        }

        /* ===== INDUSTRY SECTION ===== */
        .industry-section {
            padding: 80px 0;
            background: #acc1d6;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 600;
            color: #222;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-subtitle {
            text-align: center;
            max-width: 1080px;
            margin: 0 auto 60px;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            font-weight: 400;
        }

        .industry-item {
            background: #ffffff;
            padding: 30px 20px;
            margin-bottom: 40px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 90%;
        }

        .industry-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.12);
        }

        .industry-icon {
            font-size: 40px;
            color: #28a745;
            margin-bottom: 15px;
        }

        .industry-item h4 {
            font-size: 1.3rem;
            color: #222;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .industry-item p {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
        }

  
        
        /* ===== PROJECTS SECTION ===== */
        .projects-section {
            padding: 80px 0;
            background-color: #f5f7fa;
        }

        .project-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            transition: transform 0.3s;
            background: #fff;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .project-img {
            height: 250px;
            background-size: cover;
            background-position: center;
        }

        .project-content {
            padding: 20px;
        }

        .project-badge {
            background: var(--secondary-color);
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }
/* show photo secation 2007 */
       .showcase-photo-section {
    position: relative;
    width: 100%;
    min-height: 60vh; /* Adjust height if needed */
    background:
         linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)),
        url('https://images.unsplash.com/photo-1503387762603-91073566e9c8?auto=format&fit=crop&w=1600&q=80')
        center/cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 15px;
    margin-top: 40px; /* Space after previous section */
}

.showcase-photo-section {
    min-height: 100vh;         /* Fill the entire viewport height */
    display: flex;             /* Use flexbox for centering */
    justify-content: ;   /* Center horizontally */
    align-items: ;       /* Center vertically */
    text-align: ;        /* Center text inside */
    padding: 20px;
}

.overlay-text {
    max-width: 800px;          /* Keep text nicely contained */
    font-size: 2.2rem;
    line-height: 1.8;
    color: #000;               /* Black text (change if needed) */
}

.overlay-text .ceo-name {
    margin-top: 20px;
    font-weight: 500;
    font-size: 1.1rem;
}
.hero-slider {
    position: relative;
    height: 100vh;
    overflow: hidden;
}
.hero-slider .slide {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.hero-slider .slide.active {
    opacity: 1;
    z-index: 1;
}
.hero-slider .container {
    color: white;
    max-width: 900px;
}
.hero-slider h1, .hero-slider h3, .hero-slider p {
    margin: 10px 0;
}

/* Buttons */
.hero-slider .prev, .hero-slider .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.4);
    color: #fff;
    border: none;
    font-size: 30px;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 50%;
}
.hero-slider .prev { left: 20px; }
.hero-slider .next { right: 20px; }
.hero-slider .prev:hover, .hero-slider .next:hover {
    background: rgba(0,0,0,0.7);
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 30px;
    width: 100%;
    text-align: center;
}
        
        /* ===== FOOTER ===== */
        .footer {
            background-color: var(--dark-color);
            color: #fff;
            padding: 60px 0 20px;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
        }

        .footer-links h5 {
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-links h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--secondary-color);
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li {
            margin-bottom: 10px;
        }

        .footer-links ul li a {
            color: #b0b0b0;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links ul li a:hover {
            color: #fff;
            padding-left: 5px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            color: #fff;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 0.9rem;
            color: #b0b0b0;
        }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section p {
                font-size: 1.1rem;
            }
            
            .overlay-content {
                text-align: center;
            }
            
            .overlay-content h6 {
                text-align: center;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .contact-info {
                padding-left: 0;
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>

   <!-- ✅ Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#home">
            <img src="https://via.placeholder.com/50x50/1a3a5f/ffffff?text=H"
                 alt="Hasas Construction Logo"
                 class="me-2"
                 style="height:50px;width:50px;border-radius:6px;">
            <span class="fw-bold">Hasas Construction</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">What We Do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sustainability">Sustainability</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#media">Media</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<section id="home" class="hero-slider">
    <div class="slide active" style="background-image: url('images/slide1.jpg');">
        <div class="container">
            <h1 class="text-green">Welcome to<br>Hasas Construction</h1>
            <h3 class="text-white-custom">Building Pakistan's Future</h3>
            <p class="lead">Your Business, Our Expertise.</p>
        </div>
    </div>

    <div class="slide" style="background-image: url('images/slide2.jpg');">
        <div class="container">
            <h1 class="text-green">Quality & Innovation</h1>
            <h3 class="text-white-custom">Infrastructure for Generations</h3>
            <p class="lead">Delivering Excellence Since 2007.</p>
        </div>
    </div>

    <div class="slide" style="background-image: url('images/slide3.jpg');">
        <div class="container">
            <h1 class="text-green">Strong Foundations</h1>
            <h3 class="text-white-custom">Shaping Pakistan’s Skyline</h3>
            <p class="lead">Trust. Innovation. Growth.</p>
        </div>
    </div>

    <!-- Navigation -->
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <h4 class="text-white-custom">
            <i class="fas fa-chevron-down me-2"></i> KEEP SCROLLING
        </h4>
    </div>
</section>

    <!-- Welcome Section -->
    <section id="about" class="welcome-photo-section">
        <div class="overlay-content">
            <h6>Welcome to <br>Hasas Construction</h6>
            <p>
                A company in the name and style of <strong>M/S SHEKH MEN HASSAN &amp; HAJI MARDAN KHAN</strong>
                was established in 1942 by our forefathers, descendants of a distinguished family of
                Mandokhel tribe hailing from Ex-Fort Sandeman now Zhob district of Balochistan.
                Having its principal office in Quetta, the firm was initially registered in
                Balochistan A-Category, and had worked with prominent organizations such as
                MES &amp; PWD.
            </p>
            <p>
                Following the creation of Pakistan, the firm expanded its business and undertook
                the execution of sizeable construction contracts of national significance with
                numerous government and semi-government departments and organizations.
            </p>
        </div>
    </section>

    <!-- Industry Experience Section -->
    <section class="industry-section">
        <div class="container">
            <h2 class="section-title">Who We Are</h2>
            <p class="section-subtitle">
                Hasas Construction (Pvt) Ltd. carries forward a proud legacy in Pakistan's construction industry that began in 1942 
                with our forefathers under the name M/S Sheikh Mir Hassan & Haji Mardan Khan. Over the decades, our journey evolved through 
                M/S Muhammad Ayub & B Ayub & Brothers (MAB) in 1975, and in 2007, with a vision to embrace modern technologies and expand horizons, 
                Hasas Construction (Pvt) Ltd. was established in Islamabad.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="industry-item">
                        <div class="industry-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Proven Legacy & Expertise</h4>
                        <p>With over eight decades of experience in the construction industry, Hasas Construction stands on a legacy of excellence passed down through generations. From highways and tunnels to mega infrastructure projects, our proven track record reflects reliability, innovation, and success.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="industry-item">
                        <div class="industry-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h4>Commitment to Quality & Innovation</h4>
                        <p>We combine advanced construction technologies with uncompromising quality standards to deliver projects that meet global benchmarks. Every project is executed with precision, ensuring durability, safety, and long-term value for our clients.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="industry-item">
                        <div class="industry-icon">
                            <i class="fas fa-bridge"></i>
                        </div>
                        <h4>Strong Team & Resources</h4>
                        <p>Our strength lies in a professional team of highly qualified engineers, managers, and skilled workforce, supported by state-of-the-art equipment and solid financial backing. Together, they enable us to take on complex projects with confidence and deliver excellence on time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- //////////////////////////////////////// --}}
<!-- Showcase Photo Section -->

<section class="showcase-photo-section">
    <div class="overlay-text">
        <p>
            Established in 2007, <strong>Hasas Construction</strong> is committed to 
            excellence, innovation, and trust. By combining modern 
            technologies with a legacy of over eight decades in 
            construction, we are shaping Pakistan's infrastructure 
            and building a stronger future.
        </p>
        <p class="ceo-name">
            Engr. Sh. Abdul Samad Khan, CEO, Hasas Construction
        </p>
    </div>
</section>


   
    {{-- <!-- Projects Section -->
    <section id="projects" class="projects-section">
        <div class="container">
            <div class="section-title">Our Projects</div>
            <p class="section-subtitle">Showcasing our completed construction projects across Pakistan</p>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="project-card">
                        <div class="project-img" style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="project-content">
                            <span class="project-badge">Completed</span>
                            <h4>Modern Residential Complex</h4>
                            <p>Lahore, Pakistan</p>
                            <p>A contemporary residential complex featuring sustainable design elements and modern amenities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="project-card">
                        <div class="project-img" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="project-content">
                            <span class="project-badge">Completed</span>
                            <h4>Commercial Office Tower</h4>
                            <p>Karachi, Pakistan</p>
                            <p>A 25-story office building with state-of-the-art facilities and green certification.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="project-card">
                        <div class="project-img" style="background-image: url('https://images.unsplash.com/photo-1504309092620-4d0ec72658c1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                        <div class="project-content">
                            <span class="project-badge">In Progress</span>
                            <h4>Industrial Warehouse</h4>
                            <p>Islamabad, Pakistan</p>
                            <p>A large-scale industrial facility with advanced logistics and storage solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- Footer -->
    {{-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="footer-logo text-white">Hasas Construction</a>
                    <p>Building Pakistan's future with excellence, innovation, and sustainability since 1942.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#projects">Projects</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-links">
                        <h5>Our Services</h5>
                        <ul>
                            <li><a href="#">Residential Construction</a></li>
                            <li><a href="#">Commercial Construction</a></li>
                            <li><a href="#">Industrial Construction</a></li>
                            <li><a href="#">Infrastructure Development</a></li>
                            <li><a href="#">Renovation & Remodeling</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-links">
                        <h5>Contact Info</h5>
                        <ul>
                            <li><i class="fas fa-map-marker-alt me-2"></i> Lahore, Pakistan</li>
                            <li><i class="fas fa-phone me-2"></i> +92 300 0089667</li>
                            <li><i class="fas fa-envelope me-2"></i> info@hasasconstruction.com</li>
                            <li><i class="fas fa-clock me-2"></i> Mon-Fri: 9AM-6PM</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Hasas Construction. All Rights Reserved.</p>
            </div>
        </div>
    </footer> --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>