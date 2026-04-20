<?php
$page_title = 'Industries';
require_once 'includes/header.php';
require_once 'includes/config.php';

// Fetch industries from database
$sql = "SELECT * FROM industries WHERE status = 'active' ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Industries We Serve</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Industries</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Industries Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Industries We Serve</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">HSM provides specialized maintenance solutions across diverse industries. Our expertise spans commercial, residential, and industrial sectors, delivering tailored services to meet unique requirements.</p>
        </div>
        
        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($industry = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="service-item bg-light border h-100 p-5">
                            <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                                <?php if($industry['icon']): ?>
                                    <i class="<?php echo $industry['icon']; ?> text-primary" style="font-size: 24px;"></i>
                                <?php else: ?>
                                    <i class="fa fa-building text-primary" style="font-size: 24px;"></i>
                                <?php endif; ?>
                            </div>
                            <h4 class="mb-3"><?php echo htmlspecialchars($industry['name']); ?></h4>
                            <p class="mb-4"><?php echo htmlspecialchars($industry['description']); ?></p>
                            <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback static content -->
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-building text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Commercial Property</h4>
                        <p class="mb-4">Office buildings, retail spaces, and commercial complexes. Comprehensive maintenance solutions for business properties.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-home text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Residential</h4>
                        <p class="mb-4">Apartment complexes, housing associations, and private residences. Responsive maintenance for residential properties.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-industry text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Industrial</h4>
                        <p class="mb-4">Manufacturing facilities, warehouses, and industrial plants. Specialized maintenance for industrial environments.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-hospital text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Healthcare</h4>
                        <p class="mb-4">Hospitals, clinics, and healthcare facilities. Compliance-focused maintenance for critical healthcare environments.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-graduation-cap text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Education</h4>
                        <p class="mb-4">Schools, universities, and educational institutions. Safe and reliable maintenance for learning environments.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-landmark text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Government & Public Sector</h4>
                        <p class="mb-4">Government buildings, public facilities, and municipal properties. Trusted maintenance for public sector clients.</p>
                        <a class="btn btn-primary rounded-pill" href="contact.php">Learn More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Industries End -->


<!-- Why Choose Us Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 ps-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-5">Why Industries Trust HSM</h1>
                    <p class="mb-4 pb-2">We understand that different industries have unique maintenance requirements. Our experienced team delivers specialized solutions tailored to each sector's specific needs.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-shield-alt text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Industry</p>
                                    <h5 class="mb-0">Expertise</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-certificate text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Full</p>
                                    <h5 class="mb-0">Compliance</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-cogs text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Tailored</p>
                                    <h5 class="mb-0">Solutions</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle" style="width: 64px; height: 64px;">
                                    <i class="fa fa-handshake text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-primary mb-2">Long-term</p>
                                    <h5 class="mb-0">Partnerships</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="Industry Solutions">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us End -->

<?php require_once 'includes/footer.php'; ?>
