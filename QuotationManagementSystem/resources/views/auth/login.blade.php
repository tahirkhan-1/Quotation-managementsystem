<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quotation Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c5aa0;
            --primary-dark: #1e3d6f;
            --secondary: #6c757d;
            --success: #198754;
            --light-bg: #f8f9fa;
            --border-color: #dee2e6;
            --text-dark: #212529;
            --text-muted: #6c757d;
            --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            max-width: 420px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.2);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .logo i {
            margin-right: 0.5rem;
        }

        .system-name {
            font-size: 1.5rem;
            font-weight: 300;
            opacity: 0.9;
        }

        .login-body {
            padding: 2rem;
        }

        .form-title {
            color: var(--text-dark);
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.25rem;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(44, 90, 160, 0.25);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            z-index: 3;
        }

        .input-group .form-control {
            padding-left: 3rem;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            z-index: 2;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            padding: 0.75rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 0.5rem;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--text-muted);
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: var(--border-color);
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .alert {
            border-radius: 6px;
            border: none;
            font-size: 0.9rem;
        }

        .footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-container {
                max-width: 100%;
            }
            
            .login-header {
                padding: 1.5rem;
            }
            
            .login-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-file-invoice-dollar"></i>QMS
            </div>
            <div class="system-name">Quotation Management System</div>
        </div>
        
        <div class="login-body">
            <p class="form-title">Log in to your account</p>

            <!-- Session Status -->
            <div class="alert alert-info" id="session-status" style="display: none;">
                <!-- Session status will appear here -->
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address">
                    </div>
                    <div class="alert alert-danger mt-2" style="display: none;">
                        <!-- Email errors will appear here -->
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="alert alert-danger mt-2" style="display: none;">
                        <!-- Password errors will appear here -->
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="form-options">
                    <div class="remember-me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <label for="remember_me" class="mb-0">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn btn-login">
                    Log In
                </button>
            </form>

            <div class="divider">
                <span>OR</span>
            </div>

            <div class="footer">
                Don't have an account? <a href="{{ route('register') }}">Sign up</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.parentNode.querySelector('.password-toggle i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Simulate session status and error messages
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            
            if (urlParams.get('demoStatus') === 'true') {
                const statusEl = document.getElementById('session-status');
                statusEl.textContent = 'Your session has expired. Please log in again.';
                statusEl.style.display = 'block';
            }
            
            if (urlParams.get('demoErrors') === 'true') {
                const errorEls = document.querySelectorAll('.alert-danger');
                errorEls[1].textContent = 'These credentials do not match our records.';
                errorEls[1].style.display = 'block';
            }
        });
    </script>
</body>
</html>