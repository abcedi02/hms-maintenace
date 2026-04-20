<?php
$page_title = 'Job Detail';
require_once 'includes/header.php';
require_once 'includes/config.php';

$slug = $_GET['slug'] ?? '';
$sql = "SELECT * FROM careers WHERE slug = ? AND status = 'open'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

if (!$job) {
    header("Location: careers.php");
    exit;
}
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo htmlspecialchars($job['title']); ?></h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="careers.php">Careers</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php echo htmlspecialchars($job['title']); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Job Detail Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4"><?php echo htmlspecialchars($job['title']); ?></h1>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Department</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($job['department']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Location</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($job['location']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Employment Type</h5>
                        <p class="mb-0"><span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($job['employment_type']); ?></span></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Salary Range</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($job['salary_range']); ?></p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h4 class="mb-3">Job Description</h4>
                    <p class="mb-4"><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
                </div>
                
                <?php if(!empty($job['requirements'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Requirements</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($job['requirements'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($job['responsibilities'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Responsibilities</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($job['responsibilities'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($job['benefits'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Benefits</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($job['benefits'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <a href="contact.php?subject=job_application&job=<?php echo $job['slug']; ?>" class="btn btn-primary rounded-pill py-3 px-5">Apply Now</a>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Job Summary</h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <small class="text-muted">Posted</small>
                            <p class="mb-0 fw-bold"><?php echo date('F j, Y', strtotime($job['created_at'])); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Type</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($job['employment_type']); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Salary</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($job['salary_range']); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Location</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($job['location']); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Why HSM?</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Competitive salary</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Career growth</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Training support</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Pension scheme</li>
                        <li class="mb-0"><i class="fa fa-check text-primary me-3"></i>Health benefits</li>
                    </ul>
                </div>
                
                <div class="bg-light p-4 rounded">
                    <h4 class="mb-3">Other Openings</h4>
                    <?php
                    $other_sql = "SELECT * FROM careers WHERE id != ? AND status = 'open' ORDER BY created_at DESC LIMIT 3";
                    $other_stmt = $conn->prepare($other_sql);
                    $other_stmt->bind_param("i", $job['id']);
                    $other_stmt->execute();
                    $other_result = $other_stmt->get_result();
                    while($other = $other_result->fetch_assoc()):
                    ?>
                        <a href="job-detail.php?slug=<?php echo $other['slug']; ?>" class="d-block mb-3 text-decoration-none">
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($other['title']); ?></h6>
                            <small class="text-muted"><?php echo htmlspecialchars($other['location']); ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->

<?php require_once 'includes/footer.php'; ?>
