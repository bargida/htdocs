<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('projects') . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';

$result = paginate($pdo, 'projects', 9);
?>

<section class="breadcrumb-section">
    <div class="container">
        <h1><?= t('my_projects') ?></h1>
        <div class="breadcrumb-nav">
            <a href="<?= BASE_URL ?>/"><?= t('home') ?></a>
            <span>/</span>
            <span class="current"><?= t('projects') ?></span>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="projects-grid">
            <?php foreach ($result['items'] as $project): ?>
            <div class="project-card" data-aos="fade-up">
                <div class="project-img">
                    <?php if ($project['image']): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/<?= e($project['image']) ?>" alt="<?= e(getField($project, 'name')) ?>">
                    <?php else: ?>
                        <div class="project-placeholder"><i class="fas fa-project-diagram"></i></div>
                    <?php endif; ?>
                    <div class="project-overlay">
                        <?php if ($project['github_link']): ?>
                            <a href="<?= e($project['github_link']) ?>" target="_blank"><i class="fab fa-github"></i></a>
                        <?php endif; ?>
                        <?php if ($project['live_link']): ?>
                            <a href="<?= e($project['live_link']) ?>" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="project-info">
                    <h3><?= e(getField($project, 'name')) ?></h3>
                    <p><?= e(mb_substr(getField($project, 'description'), 0, 120)) ?></p>
                    <div class="project-tech">
                        <?php foreach (explode(',', $project['technologies']) as $tech): ?>
                            <span><?= e(trim($tech)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($result['items'])): ?>
            <div class="empty-state">
                <i class="fas fa-folder-open"></i>
                <p><?= t('no_projects') ?></p>
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
