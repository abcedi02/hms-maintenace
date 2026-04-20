<?php
session_start();
require_once '../includes/config.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "SELECT * FROM users WHERE username = '$username' AND status = 'active'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --hsm-primary: #0A0A0A;
            --hsm-accent: #C9A84C;
            --hsm-support: #FAFAF7;
        }
        body {
            background: linear-gradient(135deg, var(--hsm-primary) 0%, #1a1a1a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            background: var(--hsm-primary);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .login-header h3 {
            color: var(--hsm-accent);
            font-weight: 700;
        }
        .login-body {
            padding: 30px;
        }
        .form-control {
            border: 2px solid #e0e0e0;
            padding: 12px;
            border-radius: 8px;
        }
        .form-control:focus {
            border-color: var(--hsm-accent);
            box-shadow: 0 0 0 0.2rem rgba(201, 168, 76, 0.25);
        }
        .btn-login {
            background: var(--hsm-accent);
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--hsm-primary);
        }
        .btn-login:hover {
            background: #b8953e;
            color: var(--hsm-primary);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h2 class="mb-2">HSM</h2>
            <h3 class="mb-0">Admin Login</h3>
        </div>
        <div class="login-body">
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login w-100 mb-3">Login</button>
            </form>
            
            <div class="text-center">
                <a href="../index.php" class="text-muted text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Back to Website
                </a>
            </div>
            
            <div class="mt-4 pt-3 border-top text-center text-muted small">
                <p class="mb-1">Default credentials:</p>
                <p class="mb-0">Username: admin | Password: admin123</p>
            </div>
        </div>
    </div>
</body>
</html>
