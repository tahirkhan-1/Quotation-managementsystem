<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuoteMaster Pro | Advanced Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --purple: #8b5cf6;
            --pink: #ec4899;
            --dark: #1e293b;
            --light: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-success: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --gradient-warning: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --gradient-danger: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --gradient-purple: linear-gradient(135deg, #a78bfa 0%, #7c3aed 100%);
            --gradient-pink: linear-gradient(135deg, #f472b6 0%, #db2777 100%);
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            overflow-x: hidden;
            color: #1e293b;
        }
        
        /* Sidebar with glowing active states */
        .sidebar {
            min-width: 280px;
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            color: white;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .sidebar .nav-link:hover::before,
        .sidebar .nav-link.active::before {
            left: 100%;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left-color: white;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }
        
        /* Animated statistic widgets */
        .stat-card {
            border-radius: 15px;
            color: white;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.6s forwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        
        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stat-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            background: rgba(255, 255, 255, 0.2);
            margin-bottom: 1rem;
        }
        
        /* Low stock alert panel with blinking highlights */
        .low-stock {
            border-left: 4px solid var(--danger);
            animation: pulse 2s infinite;
            background: linear-gradient(45deg, #fee2e2, #fef2f2);
            color: #1e293b;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }
        
        .low-stock-item {
            transition: all 0.3s ease;
        }
        
        .low-stock-item:hover {
            transform: translateX(5px);
            background-color: rgba(239, 68, 68, 0.05);
        }
        
        /* Quotation activity timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary), var(--success));
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 25px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -25px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--primary);
            border: 2px solid white;
            box-shadow: 0 0 0 3px var(--primary);
        }
        
        .timeline-item:nth-child(2n)::before {
            background: var(--success);
            box-shadow: 0 0 0 3px var(--success);
        }
        
        .timeline-item:nth-child(3n)::before {
            background: var(--warning);
            box-shadow: 0 0 0 3px var(--warning);
        }
        
        /* Neumorphic effects for cards */
        .neumorphic-card {
            background: #f0f0f0;
            border-radius: 15px;
            box-shadow: 10px 10px 20px #d9d9d9, -10px -10px 20px #ffffff;
            transition: all 0.3s ease;
            color: #1e293b;
        }
        
        .neumorphic-card:hover {
            box-shadow: 5px 5px 15px #d9d9d9, -5px -5px 15px #ffffff;
        }
        
        /* Parallax backgrounds */
        .parallax-section {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        
        .parallax-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.85);
        }
        
        .parallax-section > * {
            position: relative;
            z-index: 1;
        }
        
        /* Interactive tooltips */
        .tooltip-inner {
            background: var(--primary);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 0.875rem;
        }
        
        .tooltip.bs-tooltip-top .tooltip-arrow::before {
            border-top-color: var(--primary);
        }
        
        /* User profile dropdown */
        .user-profile-dropdown {
            min-width: 200px;
        }
        
        .user-profile-dropdown .dropdown-item {
            padding: 0.5rem 1rem;
        }
        
        .user-profile-dropdown .dropdown-divider {
            margin: 0.5rem 0;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
        
        /* Floating animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -10px); }
            100% { transform: translate(0, 0px); }
        }
        
        /* Profile Modal Styles */
        .profile-modal .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }
        
        .profile-modal .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-bottom: none;
        }
        
        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .profile-stats {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin: 1.5rem 0;
        }
        
        .profile-stat {
            padding: 0 1rem;
        }
        
        .profile-stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .profile-stat-label {
            font-size: 0.85rem;
            color: var(--secondary);
        }
        
        /* Login Page Styles */
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-align: center;
            padding: 2rem;
        }
        
        .login-body {
            padding: 2rem;
        }
        
        .login-footer {
            padding: 1rem 2rem;
            text-align: center;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        
        /* Hidden class for toggling visibility */
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Login Page (initially shown) -->
    <div id="loginPage" class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-file-invoice me-2"></i>QMS Admin</h2>
                <p class="mb-0">Sign in to your account</p>
            </div>
            <div class="login-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>
            </div>
            <div class="login-footer">
                <p class="small text-muted mb-0">Don't have an account? <a href="#" class="text-primary">Contact administrator</a></p>
            </div>
        </div>
    </div>

    <!-- Dashboard (initially hidden) -->
    <div id="dashboard" class="d-flex h-100 hidden">
        <!-- Enhanced Sidebar with Multi-level Menus -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 fw-bold text-white"><i class="fas fa-file-invoice me-2"></i>QMS Admin</h1>
                <button type="button" class="btn-close btn-close-white d-md-none" data-bs-dismiss="offcanvas"></button>
            </div>
            
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link active">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#quoteSubmenu">
                        <i class="fas fa-file-contract me-2"></i>Quotations <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse show" id="quoteSubmenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="/createquotation" class="nav-link">Create New</a>
                            </li>
                            <li class="nav-item">
                                <a href="/costumerdetails" class="nav-link">Customer Details</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#inventorySubmenu">
                        <i class="fas fa-boxes me-2"></i>Item Management <i class="fas fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse" id="inventorySubmenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="/additempage" class="nav-link">Add Item</a>
                            </li>
                            <li class="nav-item">
                                <a href="/display_items" class="nav-link">Manage Items</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            
            <div class="mt-auto pt-3 border-top">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=3b82f6&color=fff" 
                             alt="User" class="rounded-circle me-2" width="40" height="40">
                        <div>
                            <div class="text-white fw-medium" id="userName">Admin User</div>
                            <small class="text-white-50">Administrator</small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark user-profile-dropdown text-small shadow" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fas fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt me-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand bg-white shadow-sm">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler me-2 d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h4 class="mb-0">Quotation Management System Overview</h4>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="dropdown me-3">
                            <button class="btn btn-light position-relative" type="button" data-bs-toggle="dropdown" 
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications">
                                <i class="fas fa-bell"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    5 <span class="visually-hidden">unread notifications</span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end p-3" style="width: 320px;">
                                <h6 class="dropdown-header">Recent Notifications</h6>
                                <div class="dropdown-item d-flex align-items-center py-2">
                                    <div class="bg-primary bg-opacity-10 rounded p-2 me-2">
                                        <i class="fas fa-file-invoice text-primary"></i>
                                    </div>
                                    <div>
                                    
                           
                        </div>
                        
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="navbarProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i>Admin User
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfileDropdown">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fas fa-user me-2"></i>Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" id="navbarLogoutBtn"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            
            <!-- Main Content Area -->
   <!-- Main Content Area -->
            <main class="flex-grow-1 overflow-y-auto p-4">
                <!-- Animated Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card" style="background: var(--gradient-primary);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="small opacity-75 mb-1">Total Item</p>
                                    <h3 class="fw-bold fs-3 mb-0">{{ $totalItems }}</h3>
                                    <p class="small opacity-75 mt-1 mb-0"><i class="fas fa-arrow-up me-1"></i></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card" style="background: var(--gradient-warning);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="small opacity-75 mb-1">Cost Price</p>
                                    <h3 class="fw-bold fs-3 mb-0">{{ number_format($totalCostPrice, 2) }}</h3>
                                    <p class="small opacity-75 mt-1 mb-0"><i class="fas fa-arrow-down me-1"></i>5% from last month</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card" style="background: var(--gradient-success);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="small opacity-75 mb-1">Sell Price</p>
                                    <h3 class="fw-bold fs-3 mb-0">{{ number_format($totalSellPrice, 2) }}</h3>
                                    <p class="small opacity-75 mt-1 mb-0"><i class="fas fa-arrow-up me-1"></i></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card" style="background: var(--gradient-purple);">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="small opacity-75 mb-1">Total Revenue</p>
                                    <h3 class="fw-bold fs-3 mb-0">{{ number_format($profit, 2) }}0</h3>
                                    <p class="small opacity-75 mt-1 mb-0"><i class="fas fa-arrow-up me-1"></i></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Charts and Main Content Row -->
                <div class="row g-4 mb-4">
                    <!-- Stock and Price Trend Chart with Gradient Fills -->
                    <div class="col-lg-8">
                        <div class="card neumorphic-card">
                            <div class="card-header bg-transparent border-bottom-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Stock and Price Trends</h5>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary active" data-period="week">Weekly</button>
                                    <button class="btn btn-outline-primary" data-period="month">Monthly</button>
                                    <button class="btn btn-outline-primary" data-period="year">Yearly</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="stockPriceTrendChart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Sidebar Content -->
                    <div class="col-lg-4">
                                              <!-- Low Stock Alert Panel -->
@if($lowStockItems->count())
<div class="card low-stock mb-4">
    <div class="card-header bg-danger text-white d-flex align-items-center">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <h5 class="card-title mb-0">Low Stock Alerts</h5>
    </div>
    <div class="card-body">
        <p class="small text-danger mb-3">Items with inventory below 5 units:</p>
        <div class="list-group list-group-flush">
            @foreach($lowStockItems as $item)
                <div class="list-group-item low-stock-item d-flex justify-content-between align-items-center bg-transparent px-0">
                    <div>
                        <h6 class="mb-1">{{ $item->name }}</h6>
                        <small class="text-muted">Category: {{ $item->category }}</small>
                    </div>
                    <span class="badge {{ $item->stock <= 2 ? 'bg-danger' : 'bg-warning' }}">
                        {{ $item->stock }} units
                    </span>
                </div>
            @endforeach
        </div>

        <button class="btn btn-danger w-100 mt-3">
            <i class="fas fa-sync-alt me-1"></i> Reorder Items
        </button>
    </div>
</div>
@endif


    <!-- Profile Modal -->
    <div class="modal fade profile-modal" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">User Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=3b82f6&color=fff&size=128" 
                         alt="Profile" class="profile-picture mb-3">
                    <h4 id="profileUserName">Admin User</h4>
                    <p class="text-muted">Administrator</p>

                    <div class="mt-4">
                        <h6>Account Details</h6>
                        <div class="text-start">
                            <p><strong>Email:</strong> admin@qms.com</p>
                            <p><strong>Member Since:</strong> January 2023</p>
                            <p><strong>Last Login:</strong> Today, 10:30 AM</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.min.js"></script>
    <script>

        // DOM Elements
        const loginPage = document.getElementById('loginPage');
        const dashboard = document.getElementById('dashboard');
        const loginForm = document.getElementById('loginForm');
        const logoutBtn = document.getElementById('logoutBtn');
        const navbarLogoutBtn = document.getElementById('navbarLogoutBtn');
        const userName = document.getElementById('userName');
        const profileUserName = document.getElementById('profileUserName');

        // Check if user is already logged in
        if (localStorage.getItem('isLoggedIn') === 'true') {
            showDashboard();
        }

        // Login form submission
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Simple validation (in a real app, this would be a server-side check)
            if (username && password) {
                localStorage.setItem('isLoggedIn', 'true');
                localStorage.setItem('username', username);
                showDashboard();
            } else {
                alert('Please enter both username and password');
            }
        });

        // Logout functionality
        function logout() {
            localStorage.removeItem('isLoggedIn');
            localStorage.removeItem('username');
            showLoginPage();
        }

        // Attach logout functionality to both logout buttons
        logoutBtn.addEventListener('click', logout);
        navbarLogoutBtn.addEventListener('click', logout);

        // Show dashboard
        function showDashboard() {
            loginPage.classList.add('hidden');
            dashboard.classList.remove('hidden');
            
            // Set the username if available
            const savedUsername = localStorage.getItem('username');
            if (savedUsername) {
                userName.textContent = savedUsername;
                profileUserName.textContent = savedUsername;
                document.querySelector('#navbarProfileDropdown').innerHTML = 
                    `<i class="fas fa-user-circle me-2"></i>${savedUsername}`;
            }
            
            // Initialize dashboard components
            initializeDashboard();
        }

        // Show login page
        function showLoginPage() {
            dashboard.classList.add('hidden');
            loginPage.classList.remove('hidden');
            loginForm.reset();
        }

        // Initialize dashboard components
        function initializeDashboard() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Stock and Price Trend Chart with Actual Data
            var trendOptions = {
                series: [
                    {
                        name: 'Stock',
                        type: 'column',
                        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
                    },
                    {
                        name: 'Sell Price',
                        type: 'line',
                        data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39, 51]
                    }
                ],
                chart: {
                    height: '100%',
                    type: 'line',
                    toolbar: {
                        show: true
                    }
                },
                colors: ['#3b82f6', '#10b981'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: [0, 3],
                    curve: 'smooth'
                },
                fill: {
                    type: 'solid',
                    opacity: [0.85, 0]
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yaxis: [
                    {
                        seriesName: 'Stock',
                        title: {
                            text: 'Stock'
                        },
                        labels: {
                            formatter: function(value) {
                                return value.toFixed(0);
                            }
                        }
                    },
                    {
                        seriesName: 'Sell Price',
                        opposite: true,
                        title: {
                            text: 'Sell Price'
                        },
                        labels: {
                            formatter: function(value) {
                                return '$' + value.toFixed(2);
                            }
                        }
                    }
                ],
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (value, { seriesIndex }) {
                            if (seriesIndex === 0) {
                                return value + ' units';
                            } else if (seriesIndex === 1) {
                                return '$' + value.toFixed(2);
                            }
                        }
                    }
                },
                legend: {
                    position: 'top'
                }
            };
            
            var trendChart = new ApexCharts(document.querySelector("#stockPriceTrendChart"), trendOptions);
            trendChart.render();
            const chartLabels = @json($labels);
            const stockData   = @json($stockValues);
            const sellData    = @json($sellValues);
            // Chart period switching
            document.querySelectorAll('[data-period]').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('[data-period]').forEach(btn => {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    // In a real application, you would update the chart data here
                    // based on the selected period
                });
            });
            
            // Add floating animation to elements
            const floatingElements = document.querySelectorAll('.floating');
            floatingElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.2}s`;
            });
            
            // Parallax effect on scroll
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.parallax-section');
                
                parallaxElements.forEach(element => {
                    const rate = scrolled * 0.5;
                    element.style.backgroundPosition = `center ${rate}px`;
                });
                
                // Animate cards on scroll
                const cards = document.querySelectorAll('.card');
                cards.forEach(card => {
                    const rect = card.getBoundingClientRect();
                    const isVisible = (rect.top <= window.innerHeight) && (rect.bottom >= 0);
                    
                    if (isVisible) {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }
                });
            });
            
            // Initialize card animations
            document.querySelectorAll('.card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            });
            
            // Trigger initial animation
            window.dispatchEvent(new Event('scroll'));
        }
    </script>
</body>
</html>