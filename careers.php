<?php
$page_title = 'Work With Us';
require_once 'includes/header.php';
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Work With Us</h1>
        <p class="lead text-white mb-4 animated slideInDown">Targeted directly at Tier 1 contractors seeking reliable Tier 2 subcontractors for social housing maintenance projects across London.</p>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Work With Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Work With Us Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Partner With HSM</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">We are a CIS-registered Tier 2 subcontractor with a proven track record in social housing planned works and reactive repairs. Partner with us to deliver exceptional maintenance services across London.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-light p-5 rounded">
                    <h3 class="mb-4">Why Partner With HSM?</h3>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>CIS-registered Tier 2 subcontractor</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Proven track record in social housing</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Multi-trade directly employed workforce</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>SLA-driven reactive and planned maintenance</li>
                        <li class="mb-3"><i class="fa fa-check text-primary me-3"></i>Full compliance with safety regulations</li>
                        <li class="mb-0"><i class="fa fa-check text-primary me-3"></i>Available for framework and spot contracts</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-light p-5 rounded">
                    <h3 class="mb-4">Compliance Pack Available</h3>
                    <p class="mb-4">Request our comprehensive compliance pack to verify our credentials and capabilities. All documentation available on request.</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa fa-file-alt text-primary"></i>
                                </div>
                                <span>RAMS</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa fa-shield-alt text-primary"></i>
                                </div>
                                <span>Insurance Certificates</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa fa-certificate text-primary"></i>
                                </div>
                                <span>CIS Details</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="btn-square bg-white rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fa fa-users text-primary"></i>
                                </div>
                                <span>Staff Qualifications</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Work With Us End -->


<!-- Partnership Enquiry Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                <h1 class="display-5 mb-4">Partner Enquiry Form</h1>
                <p class="mb-4 pb-2">Interested in partnering with HSM? Complete the form below and our team will get back to you within 24 hours to discuss potential collaboration opportunities.</p>
                <form action="process-partnership.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control border-0" name="company_name" placeholder="Company Name" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select border-0" name="contract_type" style="height: 55px;" required>
                                <option value="">Select Contract Type</option>
                                <option value="framework">Framework Agreement</option>
                                <option value="spot">Spot / Ad-Hoc Contract</option>
                                <option value="both">Both Framework & Spot</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select border-0" name="borough" style="height: 55px;" required>
                                <option value="">Select Borough</option>
                                <option value="all">All London Boroughs</option>
                                <option value="central">Central London</option>
                                <option value="north">North London</option>
                                <option value="south">South London</option>
                                <option value="east">East London</option>
                                <option value="west">West London</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0" name="expected_volumes" placeholder="Expected Volumes (e.g., £500k/year, 50 jobs/month)" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control border-0" name="contact_name" placeholder="Contact Name" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control border-0" name="contact_email" placeholder="Contact Email" style="height: 55px;" required>
                        </div>
                        <div class="col-12">
                            <input type="tel" class="form-control border-0" name="contact_phone" placeholder="Contact Phone" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0" name="message" placeholder="Additional details about your requirements" rows="4"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Submit Enquiry</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover; border-radius: 8px;" alt="Partner With HSM">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partnership Enquiry End -->

<?php require_once 'includes/footer.php'; ?>
