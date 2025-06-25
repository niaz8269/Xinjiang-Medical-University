<?php
// Start session
session_start();

// Initialize variables
$error = '';
$registerError = '';
$registerSuccess = '';
$systemError = '';

try {
    // Include database connection with error handling
    if (!@include_once 'db_connect.php') {
        throw new Exception('Database configuration error');
    }

    // Handle login form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Validate inputs
        if (empty($email) || empty($password)) {
            $error = "Please enter both email and password";
        } else {
            // Prepare SQL statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                
                // Verify password (assuming passwords are hashed in the database)
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    
                    // Regenerate session ID for security
                    session_regenerate_id(true);
                    
                    // Redirect to main.php
                    header("Location: main.php");
                    exit();
                } else {
                    $error = "Invalid email or password";
                }
            } else {
                $error = "Invalid email or password";
            }
            
            $stmt->close();
        }
    }

    // Handle registration form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        $fullName = $_POST['fullName'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirmPassword'] ?? '';
        
        // Validate inputs
        if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
            $registerError = "Please fill in all fields";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $registerError = "Invalid email format";
        } elseif (strlen($password) < 8) {
            $registerError = "Password must be at least 8 characters";
        } elseif ($password !== $confirmPassword) {
            $registerError = "Passwords do not match";
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $registerError = "Email already registered";
            } else {
                // Hash password before storing
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $fullName, $email, $hashedPassword);
                
                if ($stmt->execute()) {
                    $registerSuccess = "Registration successful! Please login with your credentials";
                    
                    // Clear form
                    $_POST = array();
                } else {
                    $registerError = "Registration failed. Please try again.";
                }
            }
            
            $stmt->close();
        }
    }
} catch (Exception $e) {
    error_log("System error: " . $e->getMessage());
    $systemError = "System error occurred. Please try again later.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Xinjiang Medical University</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --xmured: #8e0e00;
            --xmudark: #1a1a2e;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .auth-container {
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }
        
        .auth-header {
            background-color: var(--xmured);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .auth-body {
            padding: 2rem;
        }
        
        .form-control:focus {
            border-color: var(--xmured);
            box-shadow: 0 0 0 0.25rem rgba(142, 14, 0, 0.25);
        }
        
        .btn-xmu {
            background-color: var(--xmured);
            color: white;
            border: none;
            padding: 10px 20px;
        }
        
        .btn-xmu:hover {
            background-color: #6d0b00;
            color: white;
        }
        
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 500;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--xmured);
            font-weight: 600;
            border-bottom: 3px solid var(--xmured);
        }
        
        .form-floating label {
            color: #6c757d;
        }
        
        .alert {
            margin-bottom: 1rem;
        }
        
        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-header">
                <h2>Student Portal</h2>
                <p class="mb-0">Xinjiang Medical University</p>
            </div>
            
            <?php if (!empty($systemError)): ?>
                <div class="alert alert-danger m-3"><?php echo htmlspecialchars($systemError); ?></div>
            <?php endif; ?>
            
            <div class="auth-body">
                <ul class="nav nav-tabs nav-justified mb-4" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                </ul>
                
                <div class="tab-content" id="authTabsContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        
                        <form id="loginForm" method="POST" action="">
                            <input type="hidden" name="login" value="1">
                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Email" required 
                                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                <label for="loginEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required>
                                <label for="loginPassword"><i class="fas fa-lock me-2"></i>Password</label>
                            </div>
                            
                            <button type="submit" class="btn btn-xmu w-100 mb-3">Login</button>
                            
                            <div class="text-center">
                                <a href="forgot_password.php" class="text-decoration-none">Forgot password?</a>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel">
                        <?php if (!empty($registerError)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($registerError); ?></div>
                        <?php elseif (!empty($registerSuccess)): ?>
                            <div class="alert alert-success"><?php echo htmlspecialchars($registerSuccess); ?></div>
                        <?php endif; ?>
                        
                        <form id="registerForm" method="POST" action="">
                            <input type="hidden" name="register" value="1">
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required 
                                    value="<?php echo isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : ''; ?>">
                                <label for="fullName"><i class="fas fa-user me-2"></i>Full Name</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Email" required 
                                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                <label for="registerEmail"><i class="fas fa-envelope me-2"></i>Email</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Password" required
                                    oninput="checkPasswordStrength(this.value)">
                                <label for="registerPassword"><i class="fas fa-lock me-2"></i>Password</label>
                                <div class="password-strength">
                                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                                </div>
                                <small class="text-muted">Minimum 8 characters</small>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required
                                    oninput="checkPasswordMatch()">
                                <label for="confirmPassword"><i class="fas fa-lock me-2"></i>Confirm Password</label>
                                <small id="passwordMatchText" class="text-muted"></small>
                            </div>
                            
                            <button type="submit" class="btn btn-xmu w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Password strength indicator
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('passwordStrengthBar');
            let strength = 0;
            
            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]/)) strength += 1;
            if (password.match(/[A-Z]/)) strength += 1;
            if (password.match(/[0-9]/)) strength += 1;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 1;
            
            const width = (strength / 5) * 100;
            strengthBar.style.width = width + '%';
            
            if (width < 40) {
                strengthBar.style.backgroundColor = '#dc3545';
            } else if (width < 70) {
                strengthBar.style.backgroundColor = '#fd7e14';
            } else {
                strengthBar.style.backgroundColor = '#28a745';
            }
        }
        
        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const matchText = document.getElementById('passwordMatchText');
            
            if (confirmPassword.length === 0) {
                matchText.textContent = '';
                matchText.className = 'text-muted';
            } else if (password === confirmPassword) {
                matchText.textContent = 'Passwords match';
                matchText.className = 'text-success';
            } else {
                matchText.textContent = 'Passwords do not match';
                matchText.className = 'text-danger';
            }
        }
        
        // Switch to login tab if registration was successful
        <?php if (!empty($registerSuccess)): ?>
            document.addEventListener('DOMContentLoaded', function() {
                const loginTab = new bootstrap.Tab(document.getElementById('login-tab'));
                loginTab.show();
            });
        <?php endif; ?>
    </script>
</body>
</html>