<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --border-radius: 12px;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 24px;
            color: var(--primary);
        }

        .logo-icon {
            background: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        .nav-btn {
            padding: 12px 24px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .login-btn {
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .login-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        .register-btn {
            background-color: var(--primary);
            color: white;
        }

        .register-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin: 40px 0 80px;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            max-width: 800px;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 600px;
            margin-bottom: 40px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .feature-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .feature-card p {
            color: var(--gray);
        }

        .cta {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: var(--border-radius);
            padding: 60px 40px;
            text-align: center;
            color: white;
            margin-bottom: 60px;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta p {
            max-width: 600px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .cta-btn {
            padding: 15px 30px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .primary-cta {
            background: white;
            color: var(--primary);
        }

        .primary-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .secondary-cta {
            border: 2px solid white;
            color: white;
        }

        .secondary-cta:hover {
            background: white;
            color: var(--primary);
        }

        footer {
            margin-top: auto;
            text-align: center;
            padding: 30px 0;
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            nav {
                gap: 10px;
            }
            
            .nav-btn {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            header {
                flex-direction: column;
                gap: 15px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .feature-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <div class="logo-icon">Q</div>
                <span>QuotationPro</span>
            </div>
            <nav>
                <a href="{{ route('login') }}" class="nav-btn login-btn">Log in</a>
                <a href="{{ route('register') }}" class="nav-btn register-btn">Register</a>
            </nav>
        </header>

        <section class="hero">
            <h1>Quotation Management System</h1>
            <p>Create, manage, and track professional quotations with our powerful and intuitive platform. Save time and improve your business workflow.</p>
        </section>

        {{-- <section class="features">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-file-invoice"></i></div>
                <h3>Create Professional Quotes</h3>
                <p>Design beautiful, customized quotations with your branding in minutes.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-clock"></i></div>
                <h3>Save Time</h3>
                <p>Automate repetitive tasks and focus on what matters most - growing your business.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                <h3>Track & Analyze</h3>
                <p>Monitor quote acceptance rates and gain insights to improve your sales process.</p>
            </div>
        </section> --}}

    
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 QuotationPro. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation for feature cards
        document.addEventListener('DOMContentLoaded', function() {
            const featureCards = document.querySelectorAll('.feature-card');
            
            featureCards.forEach((card, index) => {
                // Add delay for staggered animation
                card.style.transitionDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>