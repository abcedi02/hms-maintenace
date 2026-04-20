<?php
$page_title = 'Service Detail';
require_once 'includes/header.php';
require_once 'includes/config.php';

$slug = $_GET['slug'] ?? '';
$sql = "SELECT * FROM services WHERE slug = ? AND status = 'active'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$service = $result->fetch_assoc();

if (!$service) {
    header("Location: services.php");
    exit;
}
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo htmlspecialchars($service['title']); ?></h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="services.php">Services</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php echo htmlspecialchars($service['title']); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Detail Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4"><?php echo htmlspecialchars($service['title']); ?></h1>
                <div class="mb-4">
                    <?php echo nl2br(htmlspecialchars($service['description'])); ?>
                </div>
                
                <?php if(!empty($service['content'])): ?>
                    <div class="mb-4">
                        <?php echo $service['content']; ?>
                    </div>
                <?php endif; ?>
                
                <?php if(!empty($service['image'])): ?>
                    <div class="mb-4">
                        <img class="img-fluid w-100 rounded" src="<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>">
                    </div>
                <?php endif; ?>
                
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Service Features</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Professional and certified technicians</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>24/7 emergency response available</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Compliance with all safety regulations</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Quality assured workmanship</li>
                        <li class="mb-0"><i class="fa fa-check text-primary me-3"></i>Competitive pricing</li>
                    </ul>
                </div>
                
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5">Request Service</a>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Quick Contact</h4>
                    <p class="mb-3">Need this service urgently? Contact us now.</p>
                    <p class="mb-2"><i class="fa fa-phone text-primary me-2"></i>+44 20 1234 5678</p>
                    <p class="mb-0"><i class="fa fa-envelope text-primary me-2"></i>info@hsm-maintenance.com</p>
                </div>
                
                <div class="bg-light p-4 rounded">
                    <h4 class="mb-3">Related Services</h4>
                    <?php
                    $related_sql = "SELECT * FROM services WHERE id != ? AND status = 'active' ORDER BY RAND() LIMIT 3";
                    $related_stmt = $conn->prepare($related_sql);
                    $related_stmt->bind_param("i", $service['id']);
                    $related_stmt->execute();
                    $related_result = $related_stmt->get_result();
                    while($related = $related_result->fetch_assoc()):
                    ?>
                        <a href="service-detail.php?slug=<?php echo $related['slug']; ?>" class="d-block mb-3 text-decoration-none">
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($related['title']); ?></h6>
                            <small class="text-muted"><?php echo htmlspecialchars(substr($related['description'], 0, 80)) . '...'; ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Detail End -->

<?php require_once 'includes/footer.php'; ?>
