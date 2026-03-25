<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('about') . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';

$about = $pdo->query("SELECT * FROM about LIMIT 1")->fetch();
$skills = $pdo->query("SELECT * FROM skills ORDER BY sort_order ASC")->fetchAll();
?>

<!-- BREADCRUMB -->
<section class="breadcrumb-section">
    <div class="container">
        <h1><?= t('about_me') ?></h1>
        <div class="breadcrumb-nav">
            <a href="<?= BASE_URL ?>/"><?= t('home') ?></a>
            <span>/</span>
            <span class="current"><?= t('about') ?></span>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image" data-aos="fade-right">
                <div class="about-img-wrapper">
                    <?php if ($about && $about['profile_image']): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/<?= e($about['profile_image']) ?>" alt="About">
                    <?php else: ?>
                        <div class="about-placeholder"><i class="fas fa-user"></i></div>
                    <?php endif; ?>
                </div>
                <div class="experience-badge">
                    <span class="exp-number">3+</span>
                    <span class="exp-text"><?= t('years_experience') ?></span>
                </div>
            </div>
            <div class="about-content" data-aos="fade-left">
                <span class="section-tag"><?= t('about_me') ?></span>
                <h2><?= t('about_me') ?></h2>
                <div class="about-bio">
                    <?= nl2br(e(getField($about ?: ['bio_uz' => '', 'bio_en' => ''], 'bio'))) ?>
                </div>

                <div class="about-details">
                    <div class="detail-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <h4><?= t('education') ?></h4>
                            <p><?= nl2br(e(getField($about ?: ['education_uz' => '', 'education_en' => ''], 'education'))) ?></p>
                        </div>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-briefcase"></i>
                        <div>
                            <h4><?= t('experience') ?></h4>
                            <p><?= nl2br(e(getField($about ?: ['experience_uz' => '', 'experience_en' => ''], 'experience'))) ?></p>
                        </div>
                    </div>
                </div>

                <?php if ($about && $about['resume_file']): ?>
                <a href="<?= BASE_URL ?>/assets/uploads/<?= e($about['resume_file']) ?>" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> <?= t('download_cv') ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
<section class="section skills-section alt-bg">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><?= t('my_skills') ?></span>
            <h2 class="section-title"><?= t('my_skills') ?></h2>
        </div>
        <div class="skills-bars">
            <?php foreach ($skills as $skill): ?>
            <div class="skill-bar-item" data-aos="fade-up">
                <div class="skill-bar-header">
                    <span><i class="<?= e($skill['icon']) ?>"></i> <?= e($skill['name']) ?></span>
                    <span><?= $skill['percentage'] ?>%</span>
                </div>
                <div class="skill-bar-track">
                    <div class="skill-bar-fill" data-width="<?= $skill['percentage'] ?>"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
