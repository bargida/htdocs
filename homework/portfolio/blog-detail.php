<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$slug = $_GET['slug'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? AND is_published = 1");
$stmt->execute([$slug]);
$blog = $stmt->fetch();

if (!$blog) {
    header("HTTP/1.0 404 Not Found");
    $pageTitle = '404';
    require_once __DIR__ . '/includes/header.php';
    echo '<section class="section"><div class="container"><div class="empty-state"><i class="fas fa-exclamation-triangle"></i><p>' . t('no_data') . '</p></div></div></section>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$pageTitle = e(getField($blog, 'title')) . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';
?>

<section class="breadcrumb-section">
    <div class="container">
        <h1><?= e(getField($blog, 'title')) ?></h1>
        <div class="breadcrumb-nav">
            <a href="<?= BASE_URL ?>/"><?= t('home') ?></a>
            <span>/</span>
            <a href="<?= BASE_URL ?>/blogs.php"><?= t('blog') ?></a>
            <span>/</span>
            <span class="current"><?= e(getField($blog, 'title')) ?></span>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <article class="blog-detail">
            <?php if ($blog['image']): ?>
            <div class="blog-detail-img">
                <img src="<?= BASE_URL ?>/assets/uploads/<?= e($blog['image']) ?>" alt="<?= e(getField($blog, 'title')) ?>">
            </div>
            <?php endif; ?>

            <div class="blog-detail-meta">
                <span><i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($blog['created_at'])) ?></span>
            </div>

            <div class="blog-detail-content">
                <?= nl2br(e(getField($blog, 'content'))) ?>
            </div>

            <a href="<?= BASE_URL ?>/blogs.php" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> <?= t('back') ?>
            </a>
        </article>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
