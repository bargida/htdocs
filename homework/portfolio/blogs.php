<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('blog') . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';

$result = paginate($pdo, 'blogs', 9, 'is_published = 1');
?>

<section class="breadcrumb-section">
    <div class="container">
        <h1><?= t('blog') ?></h1>
        <div class="breadcrumb-nav">
            <a href="<?= BASE_URL ?>/"><?= t('home') ?></a>
            <span>/</span>
            <span class="current"><?= t('blog') ?></span>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="blog-grid">
            <?php foreach ($result['items'] as $blog): ?>
            <article class="blog-card" data-aos="fade-up">
                <div class="blog-img">
                    <?php if ($blog['image']): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/<?= e($blog['image']) ?>" alt="<?= e(getField($blog, 'title')) ?>">
                    <?php else: ?>
                        <div class="blog-placeholder"><i class="fas fa-pen-fancy"></i></div>
                    <?php endif; ?>
                    <span class="blog-date"><?= date('d M Y', strtotime($blog['created_at'])) ?></span>
                </div>
                <div class="blog-info">
                    <h3><a href="<?= BASE_URL ?>/blog-detail.php?slug=<?= e($blog['slug']) ?>"><?= e(getField($blog, 'title')) ?></a></h3>
                    <p><?= e(mb_substr(getField($blog, 'short_desc'), 0, 150)) ?></p>
                    <a href="<?= BASE_URL ?>/blog-detail.php?slug=<?= e($blog['slug']) ?>" class="read-more">
                        <?= t('read_more') ?> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <?php if (empty($result['items'])): ?>
            <div class="empty-state">
                <i class="fas fa-newspaper"></i>
                <p><?= t('no_posts') ?></p>
            </div>
        <?php endif; ?>

        <?php if ($result['totalPages'] > 1): ?>
        <div class="pagination-front">
            <?php for ($i = 1; $i <= $result['totalPages']; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $result['page'] ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
