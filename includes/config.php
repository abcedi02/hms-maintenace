<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'hsm_maintenance');

// Create database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8mb4");

// Site Configuration
define('SITE_NAME', 'HSM Home Service Maintenance');
define('SITE_URL', 'http://localhost/securex-1.0.0');
define('ADMIN_EMAIL', 'admin@hsm-maintenance.com');

// Brand Colors
define('COLOR_PRIMARY', '#0A0A0A');  // Jet Black
define('COLOR_ACCENT', '#C9A84C');   // Gold
define('COLOR_SUPPORT', '#FAFAF7');  // Off-White / Warm Cream

// Error Reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
