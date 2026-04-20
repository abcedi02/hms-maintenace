<?php
$page_title = 'News Detail';
require_once 'includes/header.php';
require_once 'includes/config.php';

$slug = $_GET['slug'] ?? '';
$sql = "SELECT n.*, u.full_name as author_name FROM news n LEFT JOIN users u ON n.author_id = u.id WHERE n.slug = ? AND n.status = 'published'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

if (!$news) {
    header("Location: news.php");
    exit;
}
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo htmlspecialchars($news['title']); ?></h1>
        <nav aria-label="breadcrumb animated slideInUp">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="news.php">News</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"><?php echo htmlspecialchars($news['title']); ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- News Detail Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                <?php if(!empty($news['featured_image'])): ?>
                    <img class="img-fluid w-100 rounded mb-4" src="<?php echo htmlspecialchars($news['featured_image']); ?>" alt="<?php echo htmlspecialchars($news['title']); ?>">
                <?php endif; ?>
                
                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <small class="text-primary"><i class="fa fa-user me-2"></i><?php echo htmlspecialchars($news['author_name'] ?? 'HSM Team'); ?></small>
                    </div>
                    <div>
                        <small class="text-muted"><i class="fa fa-calendar me-2"></i><?php echo date('F j, Y', strtotime($news['published_at'])); ?></small>
                    </div>
                </div>
                
                <h1 class="display-5 mb-4"><?php echo htmlspecialchars($news['title']); ?></h1>
                
                <div class="mb-4">
                    <?php echo $news['content']; ?>
                </div>
                
                <?php if(!empty($news['category'])): ?>
                    <div class="mb-4">
                        <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($news['category']); ?></span>
                    </div>
                <?php endif; ?>
                
                <div class="d-flex align-items-center pt-4 border-top">
                    <div class="btn-square bg-primary rounded-circle me-3" style="width: 50px; height: 50px;">
                        <i class="fa fa-share-alt text-white"></i>
                    </div>
                    <div>
                        <p class="mb-1">Share this article</p>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-dark rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm btn-dark rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm btn-dark rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-4 rounded mb-4">
                    <h4 class="mb-3">Article Info</h4>
                    <div class="row g-3">
                        <div class="col-12">
                            <small class="text-muted">Published</small>
                            <p class="mb-0 fw-bold"><?php echo date('F j, Y', strtotime($news['published_at'])); ?></p>
                        </div>
                        <div class="col-12">
                            <small class="text-muted">Author</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($news['author_name'] ?? 'HSM Team'); ?></p>
                        </div>
                        <div class="col-12">
                            <small class="text-muted">Category</small>
                            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($news['category'] ?? 'General'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-light p-4 rounded">
                    <h4 class="mb-3">Recent Articles</h4>
                    <?php
                    $recent_sql = "SELECT * FROM news WHERE id != ? AND status = 'published' ORDER BY published_at DESC LIMIT 5";
                    $recent_stmt = $conn->prepare($recent_sql);
                    $recent_stmt->bind_param("i", $news['id']);
                    $recent_stmt->execute();
                    $recent_result = $recent_stmt->get_result();
                    while($recent = $recent_result->fetch_assoc()):
                    ?>
                        <a href="news-detail.php?slug=<?php echo $recent['slug']; ?>" class="d-block mb-3 text-decoration-none">
                            <h6 class="text-primary mb-1"><?php echo htmlspecialchars($recent['title']); ?></h6>
                            <small class="text-muted"><?php echo date('F j, Y', strtotime($recent['published_at'])); ?></small>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News Detail End -->

<?php require_once 'includes/footer.php'; ?>
