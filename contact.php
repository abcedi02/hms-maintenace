<?php
$page_title = 'Contact Us';
require_once 'includes/header.php';
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid bg-light overflow-hidden px-lg-0">
    <div class="container contact px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 ps-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    <h1 class="display-5 mb-5">Get In Touch</h1>
                    <p class="mb-4 pb-2">Have a question or need a quote? Contact us today and our team will respond within 24 hours. We're here to help with all your maintenance needs.</p>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="btn-square rounded-circle flex-shrink-0" style="width: 64px; height: 64px; background: var(--hsm-accent);">
                                    <i class="fa fa-map-marker-alt text-white" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-primary mb-1">Address</p>
                                    <h5 class="mb-0">London, UK</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="btn-square rounded-circle flex-shrink-0" style="width: 64px; height: 64px; background: var(--hsm-accent);">
                                    <i class="fa fa-phone-alt text-white" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-primary mb-1">Phone</p>
                                    <h5 class="mb-0" style="white-space: nowrap;">+44 20 1234 5678</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="btn-square rounded-circle flex-shrink-0" style="width: 64px; height: 64px; background: var(--hsm-accent);">
                                    <i class="fa fa-envelope-open text-white" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-primary mb-1">Email</p>
                                    <h5 class="mb-0">info@hsm-maintenance.com</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="btn-square rounded-circle flex-shrink-0" style="width: 64px; height: 64px; background: var(--hsm-accent);">
                                    <i class="fa fa-clock text-white" style="font-size: 24px;"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-primary mb-1">Support</p>
                                    <h5 class="mb-0">24/7 Emergency</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a class="btn-social" href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: var(--hsm-accent); color: white; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        <a class="btn-social" href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: var(--hsm-accent); color: white; text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn-social" href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: var(--hsm-accent); color: white; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn-social" href="#" style="width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: var(--hsm-accent); color: white; text-decoration: none;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <iframe class="position-absolute w-100 h-100" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.47340002653!2d-0.2416814469920966!3d51.5287702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963e5c452da38e!2sLondon%2C%20UK!5e0!3m2!1sen!2sus!4v1615413556282!5m2!1sen!2sus" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Contact Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Send Us a Message</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="mb-4">Fill out the form below and we'll get back to you as soon as possible. For emergency maintenance requests, please call our 24/7 hotline.</p>
                <form action="process-contact.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control border-0" name="name" placeholder="Your Name" style="height: 55px;" required>
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control border-0" name="email" placeholder="Your Email" style="height: 55px;" required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0" name="phone" placeholder="Your Phone" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <select class="form-select border-0" name="subject" style="height: 55px;">
                                <option value="">Select Subject</option>
                                <option value="quote" <?php echo (isset($_GET['subject']) && $_GET['subject'] == 'job_application') ? '' : ''; ?>>Request a Quote</option>
                                <option value="reactive">Reactive Maintenance</option>
                                <option value="planned">Planned Maintenance</option>
                                <option value="infrastructure">Infrastructure Services</option>
                                <option value="emergency">Emergency Request</option>
                                <option value="general">General Inquiry</option>
                                <option value="job_application" <?php echo (isset($_GET['subject']) && $_GET['subject'] == 'job_application') ? 'selected' : ''; ?>>Job Application</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0" name="message" placeholder="Your Message" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-5 rounded">
                    <h3 class="mb-4">Office Hours</h3>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <i class="fa fa-clock text-primary me-3" style="font-size: 24px;"></i>
                        <div>
                            <h5 class="mb-0">Monday - Friday</h5>
                            <small class="text-muted">8:00 AM - 6:00 PM</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-3">
                        <i class="fa fa-clock text-primary me-3" style="font-size: 24px;"></i>
                        <div>
                            <h5 class="mb-0">Saturday</h5>
                            <small class="text-muted">9:00 AM - 2:00 PM</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center py-3">
                        <i class="fa fa-exclamation-triangle text-primary me-3" style="font-size: 24px;"></i>
                        <div>
                            <h5 class="mb-0">Emergency Support</h5>
                            <small class="text-muted">24/7 Available</small>
                        </div>
                    </div>
                    
                    <h3 class="mb-4 mt-5">Service Areas</h3>
                    <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Greater London</p>
                    <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>South East England</p>
                    <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Home Counties</p>
                    <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>UK-wide (for large projects)</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form End -->

<?php require_once 'includes/footer.php'; ?>
