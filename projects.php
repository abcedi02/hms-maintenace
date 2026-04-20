<?php
$page_title = 'Projects';
require_once 'includes/header.php';
require_once 'includes/config.php';

// Fetch case studies from database
$sql = "SELECT * FROM case_studies WHERE status = 'active' ORDER BY featured DESC, completion_date DESC";
$result = $conn->query($sql);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Projects</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Projects</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Our Project Portfolio</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">Explore our completed projects and see how HSM delivers exceptional maintenance solutions across various industries and property types.</p>
        </div>
        
        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($case = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="case-study-card">
                            <img class="img-fluid w-100" src="<?php echo $case['after_image'] ? htmlspecialchars($case['after_image']) : 'img/portfolio-1.jpg'; ?>" alt="<?php echo htmlspecialchars($case['title']); ?>">
                            <div class="case-study-overlay">
                                <div class="text-center text-white p-4">
                                    <h4 class="mb-2"><?php echo htmlspecialchars($case['title']); ?></h4>
                                    <p class="mb-2"><?php echo htmlspecialchars($case['client_name']); ?></p>
                                    <p class="mb-3"><small><?php echo htmlspecialchars($case['industry']); ?> - <?php echo htmlspecialchars($case['location']); ?></small></p>
                                    <a href="project-detail.php?slug=<?php echo $case['slug']; ?>" class="btn btn-primary rounded-pill">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback static content if database not set up -->
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-1.jpg" alt="Kitchen Refurbishment - Hackney">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Kitchen Refurbishment</h4>
                        <p class="text-muted mb-2"><small>Type: Planned Maintenance</small></p>
                        <p class="mb-2"><small>Scope: Full kitchen replacement, plumbing, electrical</small></p>
                        <p class="mb-2"><small>Borough: Hackney</small></p>
                        <p class="mb-2"><small>Turnaround: 5 days</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Excellent work, completed on time and to specification."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-2.jpg" alt="Emergency Plumbing - Tower Hamlets">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Emergency Plumbing Repair</h4>
                        <p class="text-muted mb-2"><small>Type: Reactive Repair</small></p>
                        <p class="mb-2"><small>Scope: Burst pipe repair, water damage mitigation</small></p>
                        <p class="mb-2"><small>Borough: Tower Hamlets</small></p>
                        <p class="mb-2"><small>Turnaround: 4 hours</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Rapid response prevented major damage to the property."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-3.jpg" alt="Void Refurbishment - Camden">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Void Property Refurbishment</h4>
                        <p class="text-muted mb-2"><small>Type: Void Refurbishment</small></p>
                        <p class="mb-2"><small>Scope: Full property turnaround to lettable standard</small></p>
                        <p class="mb-2"><small>Borough: Camden</small></p>
                        <p class="mb-2"><small>Turnaround: 10 days</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Property ready for re-letting ahead of schedule."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-4.jpg" alt="Window Replacement - Islington">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Window Replacement Program</h4>
                        <p class="text-muted mb-2"><small>Type: Planned Maintenance</small></p>
                        <p class="mb-2"><small>Scope: 20 property window replacements, double glazing</small></p>
                        <p class="mb-2"><small>Borough: Islington</small></p>
                        <p class="mb-2"><small>Turnaround: 3 weeks</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Professional team, minimal disruption to residents."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-5.jpg" alt="Damp Remediation - Lambeth">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Damp & Mould Remediation</h4>
                        <p class="text-muted mb-2"><small>Type: Compliance Works</small></p>
                        <p class="mb-2"><small>Scope: Damp survey, mould removal, ventilation upgrade</small></p>
                        <p class="mb-2"><small>Borough: Lambeth</small></p>
                        <p class="mb-2"><small>Turnaround: 7 days</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Thorough approach, resident satisfaction improved."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="project-card bg-white border h-100 p-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100 rounded" src="img/portfolio-6.jpg" alt="Roofing Repair - Southwark">
                            <div class="position-absolute top-0 end-0 bg-primary text-white px-3 py-1 rounded-start">Before/After</div>
                        </div>
                        <h4 class="mb-2">Roofing Repair Project</h4>
                        <p class="text-muted mb-2"><small>Type: Reactive Repair</small></p>
                        <p class="mb-2"><small>Scope: Flat roof repair, waterproofing, insulation</small></p>
                        <p class="mb-2"><small>Borough: Southwark</small></p>
                        <p class="mb-2"><small>Turnaround: 2 days</small></p>
                        <p class="text-primary mb-3 fst-italic"><small>"Quality workmanship, no leaks since completion."</small></p>
                        <p class="text-muted mb-0"><small>— Tier 1 Contract Manager</small></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Projects End -->


<!-- Featured Project Start -->
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg" style="object-fit: cover;" alt="Featured Project">
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-4">Featured Project: London Office Complex</h1>
                    <p class="mb-4 pb-2">Complete infrastructure overhaul for a 50,000 sq ft office complex in Central London. This project involved full electrical compliance, HVAC system upgrades, and implementation of a comprehensive planned maintenance program.</p>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-6">
                            <h5 class="text-primary mb-2">Client</h5>
                            <p class="mb-0">Fortune 500 Corporation</p>
                        </div>
                        <div class="col-6">
                            <h5 class="text-primary mb-2">Duration</h5>
                            <p class="mb-0">6 Months</p>
                        </div>
                        <div class="col-6">
                            <h5 class="text-primary mb-2">Value</h5>
                            <p class="mb-0">£2.5 Million</p>
                        </div>
                        <div class="col-6">
                            <h5 class="text-primary mb-2">Status</h5>
                            <p class="mb-0">Completed</p>
                        </div>
                    </div>
                    
                    <h5 class="mb-3">Key Achievements</h5>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>100% Compliance with all safety regulations</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Reduced energy consumption by 35%</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Zero downtime during implementation</li>
                        <li class="mb-2"><i class="fa fa-check text-primary me-3"></i>Client satisfaction score: 9.8/10</li>
                    </ul>
                    
                    <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-5">Read Full Project</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured Project End -->


<!-- Stats Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center p-4 bg-light rounded">
                    <h1 class="display-4 text-primary mb-0" data-toggle="counter-up">2000+</h1>
                    <p class="mb-0">Projects Completed</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center p-4 bg-light rounded">
                    <h1 class="display-4 text-primary mb-0" data-toggle="counter-up">98%</h1>
                    <p class="mb-0">Client Satisfaction</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center p-4 bg-light rounded">
                    <h1 class="display-4 text-primary mb-0" data-toggle="counter-up">15+</h1>
                    <p class="mb-0">Years Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center p-4 bg-light rounded">
                    <h1 class="display-4 text-primary mb-0" data-toggle="counter-up">500+</h1>
                    <p class="mb-0">Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Stats Section End -->

<?php require_once 'includes/footer.php'; ?>
