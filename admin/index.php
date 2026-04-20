<?php
session_start();
require_once '../includes/config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get dashboard statistics
$stats = [];
$stats['contacts'] = $conn->query("SELECT COUNT(*) as count FROM contacts")->fetch_assoc()['count'];
$stats['services'] = $conn->query("SELECT COUNT(*) as count FROM services")->fetch_assoc()['count'];
$stats['case_studies'] = $conn->query("SELECT COUNT(*) as count FROM case_studies")->fetch_assoc()['count'];
$stats['news'] = $conn->query("SELECT COUNT(*) as count FROM news")->fetch_assoc()['count'];

// Get recent contacts
$recent_contacts = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5");

// Get recent service requests
$recent_requests = $conn->query("SELECT * FROM service_requests ORDER BY created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --hsm-primary: #0A0A0A;
            --hsm-accent: #C9A84C;
            --hsm-support: #FAFAF7;
        }
        body {
            background-color: var(--hsm-support);
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            background-color: var(--hsm-primary);
            min-height: 100vh;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--hsm-accent);
            color: var(--hsm-primary);
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .stat-icon.primary { background: var(--hsm-accent); color: var(--hsm-primary); }
        .stat-icon.success { background: #28a745; color: white; }
        .stat-icon.info { background: #17a2b8; color: white; }
        .stat-icon.warning { background: #ffc107; color: var(--hsm-primary); }
        .table thead {
            background-color: var(--hsm-primary);
            color: white;
        }
        .table tbody tr:hover {
            background-color: rgba(201, 168, 76, 0.1);
        }
        .badge {
            padding: 8px 12px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-4 border-bottom border-secondary">
                    <h4 class="mb-0" style="color: var(--hsm-accent);">HSM Admin</h4>
                </div>
                <nav class="nav flex-column p-3">
                    <a class="nav-link active" href="index.php"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a class="nav-link" href="contacts.php"><i class="fas fa-envelope me-2"></i>Contacts</a>
                    <a class="nav-link" href="services.php"><i class="fas fa-tools me-2"></i>Services</a>
                    <a class="nav-link" href="projects.php"><i class="fas fa-folder me-2"></i>Projects</a>
                    <a class="nav-link" href="news.php"><i class="fas fa-newspaper me-2"></i>News</a>
                    <a class="nav-link" href="testimonials.php"><i class="fas fa-quote-left me-2"></i>Testimonials</a>
                    <a class="nav-link" href="careers.php"><i class="fas fa-briefcase me-2"></i>Careers</a>
                    <a class="nav-link" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a>
                    <a class="nav-link mt-4" href="../index.php" target="_blank"><i class="fas fa-external-link-alt me-2"></i>View Site</a>
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Dashboard</h2>
                    <div>
                        <span class="me-3">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Contacts</h6>
                                    <h3 class="mb-0"><?php echo $stats['contacts']; ?></h3>
                                </div>
                                <div class="stat-icon primary">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Services</h6>
                                    <h3 class="mb-0"><?php echo $stats['services']; ?></h3>
                                </div>
                                <div class="stat-icon success">
                                    <i class="fas fa-tools"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Projects</h6>
                                    <h3 class="mb-0"><?php echo $stats['case_studies']; ?></h3>
                                </div>
                                <div class="stat-icon info">
                                    <i class="fas fa-folder"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">News Articles</h6>
                                    <h3 class="mb-0"><?php echo $stats['news']; ?></h3>
                                </div>
                                <div class="stat-icon warning">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Contacts -->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Contacts</h5>
                        <a href="contacts.php" class="btn btn-sm btn-light">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($recent_contacts->num_rows > 0): ?>
                                        <?php while($contact = $recent_contacts->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                                                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                                                <td><?php echo htmlspecialchars($contact['service_interest']); ?></td>
                                                <td><span class="badge bg-primary"><?php echo htmlspecialchars($contact['status']); ?></span></td>
                                                <td><?php echo date('M j, Y', strtotime($contact['created_at'])); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr><td colspan="5" class="text-center py-4">No contacts yet</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Service Requests -->
                <div class="card">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Service Requests</h5>
                        <a href="service-requests.php" class="btn btn-sm btn-light">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Request #</th>
                                        <th>Client</th>
                                        <th>Type</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($recent_requests->num_rows > 0): ?>
                                        <?php while($request = $recent_requests->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($request['request_number']); ?></td>
                                                <td><?php echo htmlspecialchars($request['client_name']); ?></td>
                                                <td><?php echo htmlspecialchars($request['service_type']); ?></td>
                                                <td><span class="badge bg-warning"><?php echo htmlspecialchars($request['priority']); ?></span></td>
                                                <td><span class="badge bg-primary"><?php echo htmlspecialchars($request['status']); ?></span></td>
                                                <td><?php echo date('M j, Y', strtotime($request['created_at'])); ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr><td colspan="6" class="text-center py-4">No service requests yet</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
