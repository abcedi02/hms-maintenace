<?php
$page_title = 'Testimonials';
require_once 'includes/header.php';
require_once 'includes/config.php';

// Fetch testimonials from database
$sql = "SELECT * FROM testimonials WHERE status = 'active' ORDER BY featured DESC, created_at DESC";
$result = $conn->query($sql);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Client Testimonials</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Testimonials</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Testimonials Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">What Our Clients Say</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">Don't just take our word for it. Here's what our clients have to say about working with HSM Home Service Maintenance.</p>
        </div>
        
        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($testimonial = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="testimonial-item bg-light p-4 rounded">
                            <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                                <?php if($testimonial['image']): ?>
                                    <img class="img-fluid rounded-circle" src="<?php echo htmlspecialchars($testimonial['image']); ?>" style="width: 80px; height: 80px;" alt="">
                                <?php else: ?>
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <span class="text-white fs-4"><?php echo substr($testimonial['client_name'], 0, 1); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="ps-4">
                                    <h4 class="text-primary mb-1"><?php echo htmlspecialchars($testimonial['client_name']); ?></h4>
                                    <span class="text-secondary"><?php echo htmlspecialchars($testimonial['position']); ?>, <?php echo htmlspecialchars($testimonial['company']); ?></span>
                                </div>
                            </div>
                            <p class="mb-4"><?php echo htmlspecialchars($testimonial['testimonial']); ?></p>
                            <div class="d-flex">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= $testimonial['rating']): ?>
                                        <i class="fa fa-star text-primary"></i>
                                    <?php else: ?>
                                        <i class="fa fa-star text-secondary"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback static content -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">John Smith</h4>
                                <span class="text-secondary">Property Manager, ABC Properties</span>
                            </div>
                        </div>
                        <p class="mb-4">HSM provides exceptional reactive maintenance services. Their 24/7 response team is always available when we need them most. Professional, reliable, and efficient - exactly what we need for our portfolio.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">Sarah Johnson</h4>
                                <span class="text-secondary">Facilities Director, Retail Chain UK</span>
                            </div>
                        </div>
                        <p class="mb-4">Their planned maintenance program has significantly reduced our repair costs. The team is professional, CIS-registered, and always meets SLA requirements. Highly recommend for any commercial property.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">Michael Brown</h4>
                                <span class="text-secondary">Procurement Manager, Infrastructure Corp</span>
                            </div>
                        </div>
                        <p class="mb-4">CIS-registered and SLA-driven - exactly what we look for in a maintenance partner. Their infrastructure services are top-notch, and they handle large-scale projects with ease. A trusted partner for Tier 1 companies.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">Emma Wilson</h4>
                                <span class="text-secondary">Estate Manager, Housing Association</span>
                            </div>
                        </div>
                        <p class="mb-4">HSM has been our maintenance partner for over 5 years. Their responsive team handles all our residential property needs efficiently. The compliance tracking system gives us peace of mind.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-5.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">David Clark</h4>
                                <span class="text-secondary">Operations Manager, Healthcare Trust</span>
                            </div>
                        </div>
                        <p class="mb-4">In healthcare, compliance is everything. HSM understands this and delivers maintenance services that meet all regulatory requirements. Their electrical compliance work is exceptional.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="testimonial-item bg-light p-4 rounded">
                        <div class="d-flex align-items-center border-bottom border-primary border-opacity-25 pb-4 mb-4">
                            <img class="img-fluid rounded-circle" src="img/testimonial-6.jpg" style="width: 80px; height: 80px;" alt="">
                            <div class="ps-4">
                                <h4 class="text-primary mb-1">Lisa Thompson</h4>
                                <span class="text-secondary">Director, Property Management Ltd</span>
                            </div>
                        </div>
                        <p class="mb-4">From emergency repairs to planned maintenance, HSM handles it all professionally. Their helpdesk system provides excellent visibility into job status. A true service platform, not just a website.</p>
                        <div class="d-flex">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Testimonials End -->


<!-- Client Logos Start -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-5 mb-5">Trusted By Leading Companies</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-building text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-industry text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-hospital text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-graduation-cap text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-landmark text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 wow fadeIn" data-wow-delay="0.6s">
                <div class="text-center p-4 bg-white rounded">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa fa-shopping-cart text-primary" style="font-size: 48px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Client Logos End -->

<?php require_once 'includes/footer.php'; ?>
