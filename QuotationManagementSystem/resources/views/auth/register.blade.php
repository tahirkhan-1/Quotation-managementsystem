<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - QMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --border-radius: 8px;
            --shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
        }

        .register-left {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-right {
            padding: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 30px;
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

        .form-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .form-subtitle {
            color: var(--gray);
            margin-bottom: 30px;
        }

        .form-control {
            padding: 12px 16px;
            border-radius: var(--border-radius);
            border: 1px solid #dee2e6;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }

        .input-group-text {
            background: white;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .login-link {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s;
        }

        .login-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .feature-list {
            list-style: none;
            padding: 0;
            margin: 30px 0;
        }

        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 992px) {
            .register-left {
                display: none;
            }
        }

        .password-toggle {
            cursor: pointer;
            background: white;
            border-left: 0;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
    </style>
</head>
<body>
            </div>
            <div class="col-lg-7">
                <div class="register-right">
                    <div class="logo mb-4">
                        <div class="logo-icon">Q</div>
                        <span>QMS</span>
                    </div>
                    <h2 class="form-title">Create Account</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your full name">
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email address">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Create a password">
                                <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                <span class="input-group-text password-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <a class="login-link" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }} <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.nextElementSibling.querySelector('i');
            
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
    </script>
</body>
</html>