<?php
$page_title = 'Services';
require_once 'includes/header.php';
require_once 'includes/config.php';

// Fetch services from database
$sql = "SELECT * FROM services WHERE status = 'active' ORDER BY featured DESC, id ASC";
$result = $conn->query($sql);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Services</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Our Services</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">We offer a complete range of maintenance services built around the demands of social housing contracts — from 24-hour reactive repairs to long-term planned programmes. All works are carried out by our directly employed, multi-trade workforce operating across all London boroughs.</p>
        </div>
        
        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($service = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="service-item bg-light border h-100 p-5">
                            <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                                <?php if($service['icon']): ?>
                                    <i class="<?php echo $service['icon']; ?> text-primary" style="font-size: 24px;"></i>
                                <?php else: ?>
                                    <i class="fa fa-tools text-primary" style="font-size: 24px;"></i>
                                <?php endif; ?>
                            </div>
                            <h4 class="mb-3"><?php echo htmlspecialchars($service['title']); ?></h4>
                            <p class="mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
                            <a class="btn" href="service-detail.php?slug=<?php echo $service['slug']; ?>"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback static content if database not set up -->
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-calendar-check text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Planned Maintenance</h4>
                        <p class="mb-4">Kitchens, bathrooms, windows, doors, roofing, cyclical decoration</p>
                        <a class="btn" href="contact.php"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-tools text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Reactive / Responsive Repairs</h4>
                        <p class="mb-4">Emergency call-outs, multi-trade repairs, SLA-driven response</p>
                        <a class="btn" href="contact.php"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-home text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Void Refurbishments</h4>
                        <p class="mb-4">Full property turnaround between tenancies to lettable standard</p>
                        <a class="btn" href="contact.php"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-shield-alt text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Compliance Works</h4>
                        <p class="mb-4">Fire safety, damp and mould remediation, electrical, gas support works</p>
                        <a class="btn" href="contact.php"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="service-item bg-light border h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <i class="fa fa-building text-primary" style="font-size: 24px;"></i>
                        </div>
                        <h4 class="mb-3">Estate Agency Works</h4>
                        <p class="mb-4">Property maintenance and repair services for estate agents and lettings agencies — including works instructed via LTA Direct and similar managing agent</p>
                        <a class="btn" href="contact.php"><i class="fa fa-arrow-right text-white me-2"></i>Read More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Service Detail Sections -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Planned Maintenance</h1>
                <p class="mb-4">Our planned maintenance services cover kitchens, bathrooms, windows, doors, roofing, and cyclical decoration. We work to scheduled programmes that keep social housing properties in optimal condition.</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Kitchen & Bathroom Refurbishments</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Window & Door Replacements</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Roofing Repairs & Maintenance</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Cyclical Decoration Programmes</li>
                </ul>
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Get a Quote</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" src="img/service-2.jpg" style="object-fit: cover; border-radius: 8px;" alt="Planned Maintenance">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" src="img/service-1.jpg" style="object-fit: cover; border-radius: 8px;" alt="Reactive / Responsive Repairs">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Reactive / Responsive Repairs</h1>
                <p class="mb-4">Our reactive maintenance service provides emergency call-outs and multi-trade repairs with SLA-driven response times. We ensure urgent issues are resolved quickly to maintain resident safety and satisfaction.</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Emergency Call-outs</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Multi-trade Repair Capabilities</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>SLA-driven Response Times</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Priority Urgent Repairs</li>
                </ul>
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Request Service</a>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Void Refurbishments</h1>
                <p class="mb-4">Full property turnaround between tenancies to lettable standard. We handle complete void refurbishments to ensure properties are ready for new tenants quickly and efficiently.</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Complete Property Turnaround</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lettable Standard Finishes</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Quick Turnaround Times</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Multi-trade Coordination</li>
                </ul>
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Learn More</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" src="img/service-3.jpg" style="object-fit: cover; border-radius: 8px;" alt="Void Refurbishments">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" src="img/service-4.jpg" style="object-fit: cover; border-radius: 8px;" alt="Compliance Works">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Compliance Works</h1>
                <p class="mb-4">Essential compliance services including fire safety, damp and mould remediation, electrical, and gas support works. We ensure your properties meet all regulatory requirements.</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fire Safety Compliance</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Damp & Mould Remediation</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Electrical Safety Works</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Gas Support Works</li>
                </ul>
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Discuss Compliance</a>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Estate Agency Works</h1>
                <p class="mb-4">Property maintenance and repair services for estate agents and lettings agencies. We handle works instructed via LTA Direct and similar managing agents to keep your portfolio in top condition.</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Property Maintenance Services</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>LTA Direct Integration</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Managing Agent Partnerships</li>
                    <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lettings Agency Support</li>
                </ul>
                <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5 mt-3">Partner With Us</a>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100" src="img/service-5.jpg" style="object-fit: cover; border-radius: 8px;" alt="Estate Agency Works">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
