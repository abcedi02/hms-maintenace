<?php
$page_title = 'Project Detail';
require_once 'includes/header.php';
require_once 'includes/config.php';

$slug = $_GET['slug'] ?? '';
$sql = "SELECT * FROM case_studies WHERE slug = ? AND status = 'active'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$case = $result->fetch_assoc();

if (!$case) {
    header("Location: projects.php");
    exit;
}
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo htmlspecialchars($case['title']); ?></h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="projects.php">Projects</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php echo htmlspecialchars($case['title']); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Project Detail Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4"><?php echo htmlspecialchars($case['title']); ?></h1>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Client</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($case['client_name']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Location</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($case['location']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Industry</h5>
                        <p class="mb-0"><?php echo htmlspecialchars($case['industry']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary mb-2">Completion Date</h5>
                        <p class="mb-0"><?php echo date('F j, Y', strtotime($case['completion_date'])); ?></p>
                    </div>
                </div>
                
                <?php if(!empty($case['before_image'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Before</h4>
                        <img class="img-fluid w-100 rounded" src="<?php echo htmlspecialchars($case['before_image']); ?>" alt="Before">
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($case['after_image'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">After</h4>
                        <img class="img-fluid w-100 rounded" src="<?php echo htmlspecialchars($case['after_image']); ?>" alt="After">
                    </div>
                <?php endif; ?>
                
                <div class="mb-4">
                    <h4 class="mb-3">Project Overview</h4>
                    <p class="mb-4"><?php echo nl2br(htmlspecialchars($case['description'])); ?></p>
                </div>
                
                <?php if(!empty($case['content'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Project Details</h4>
                        <?php echo $case['content']; ?>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($case['challenges'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Challenges</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($case['challenges'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($case['solutions'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Solutions</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($case['solutions'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($case['results'])): ?>
                    <div class="mb-4">
                        <h4 class="mb-3">Results</h4>
                        <p class="mb-4"><?php echo nl2br(htmlspecialchars($case['results'])); ?></p>
                    </div>
                <?php endif; ?>
                
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5">Discuss Similar Project</a>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Project Summary</h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <small class="text-muted">Duration</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($case['duration'] ?? 'TBD'); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Value</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($case['value'] ?? 'TBD'); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Team Size</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($case['team_size'] ?? 'TBD'); ?></p>
                        </div>
                        <div class="col-6">
                            <small class="text-muted">Status</small>
                            <p class="mb-0 fw-bold text-primary">Completed</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 rounded">
                    <h4 class="mb-3">Related Projects</h4>
                    <?php
                    $related_sql = "SELECT * FROM case_studies WHERE id != ? AND status = 'active' ORDER BY RAND() LIMIT 3";
                    $related_stmt = $conn->prepare($related_sql);
                    $related_stmt->bind_param("i", $case['id']);
                    $related_stmt->execute();
                    $related_result = $related_stmt->get_result();
                    while($related = $related_result->fetch_assoc()):
                    ?>
                        <a href="project-detail.php?slug=<?php echo $related['slug']; ?>" class="d-block mb-3 text-decoration-none">
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($related['title']); ?></h6>
                            <small class="text-muted"><?php echo htmlspecialchars($related['client_name']); ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Detail End -->

<?php require_once 'includes/footer.php'; ?>
