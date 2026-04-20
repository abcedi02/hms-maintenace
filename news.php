<?php
$page_title = 'News';
require_once 'includes/header.php';
require_once 'includes/config.php';

// Fetch news articles from database
$sql = "SELECT n.*, u.full_name as author_name FROM news n LEFT JOIN users u ON n.author_id = u.id WHERE n.status = 'published' ORDER BY n.published_at DESC LIMIT 6";
$result = $conn->query($sql);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">News & Insights</h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">News</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- News Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">Latest News & Industry Insights</h1>
            <p class="mb-5 mx-auto" style="max-width: 800px;">Stay updated with the latest maintenance industry trends, company news, and expert insights from our team.</p>
        </div>
        
        <div class="row g-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while($news = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <img class="img-fluid" src="<?php echo $news['featured_image'] ? htmlspecialchars($news['featured_image']) : 'img/blog-1.jpg'; ?>" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                                <div class="blog-overlay">
                                    <a class="btn btn-square rounded-circle border border-white text-white" href="#"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="text-primary"><?php echo date('F j, Y', strtotime($news['published_at'])); ?></small>
                                    <small class="text-muted"><?php echo htmlspecialchars($news['category']); ?></small>
                                </div>
                                <h4 class="mb-3"><?php echo htmlspecialchars($news['title']); ?></h4>
                                <p class="mb-4"><?php echo htmlspecialchars(substr($news['excerpt'], 0, 100)) . '...'; ?></p>
                                <a class="btn btn-primary rounded-pill" href="news-detail.php?slug=<?php echo $news['slug']; ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback static content -->
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-1.jpg" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="blog-overlay">
                                <a class="btn btn-square rounded-circle border border-white text-white" href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="text-primary">January 15, 2024</small>
                                <small class="text-muted">Industry News</small>
                            </div>
                            <h4 class="mb-3">The Future of Reactive Maintenance in 2024</h4>
                            <p class="mb-4">Exploring emerging trends in reactive maintenance and how technology is transforming emergency response...</p>
                            <a class="btn btn-primary rounded-pill" href="contact.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-2.jpg" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="blog-overlay">
                                <a class="btn btn-square rounded-circle border border-white text-white" href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="text-primary">December 20, 2023</small>
                                <small class="text-muted">Company News</small>
                            </div>
                            <h4 class="mb-3">HSM Commits to ISO 9001 Certification</h4>
                            <p class="mb-4">We are pleased to announce our commitment to achieving ISO 9001 Quality Management certification, reinforcing our dedication to quality standards...</p>
                            <a class="btn btn-primary rounded-pill" href="contact.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/blog-3.jpg" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="blog-overlay">
                                <a class="btn btn-square rounded-circle border border-white text-white" href="#"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="text-primary">November 10, 2023</small>
                                <small class="text-muted">Tips & Advice</small>
                            </div>
                            <h4 class="mb-3">5 Tips for Effective Planned Maintenance</h4>
                            <p class="mb-4">Discover how to implement an effective planned maintenance program for your property...</p>
                            <a class="btn btn-primary rounded-pill" href="contact.php">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- News End -->

<?php require_once 'includes/footer.php'; ?>
