<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('home') . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';

$about = $pdo->query("SELECT * FROM about LIMIT 1")->fetch();
$skills = $pdo->query("SELECT * FROM skills ORDER BY sort_order ASC")->fetchAll();
$featuredProjects = $pdo->query("SELECT * FROM projects ORDER BY is_featured DESC, created_at DESC LIMIT 6")->fetchAll();
$latestBlogs = $pdo->query("SELECT * FROM blogs WHERE is_published = 1 ORDER BY created_at DESC LIMIT 3")->fetchAll();
?>

<!-- HERO SECTION -->
<section class="hero" id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <span class="hero-greeting" data-aos="fade-up"><?= t('hero_greeting') ?></span>
                <h1 class="hero-name" data-aos="fade-up">
                    <span class="name-highlight">Full Stack</span>
                    <?= t('hero_title') ?>
                </h1>
                <p class="hero-desc" data-aos="fade-up"><?= t('hero_subtitle') ?></p>
                <div class="hero-btns" data-aos="fade-up">
                    <a href="<?= BASE_URL ?>/projects.php" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> <?= t('view_projects') ?>
                    </a>
                    <a href="<?= BASE_URL ?>/contact.php" class="btn btn-outline">
                        <i class="fas fa-envelope"></i> <?= t('contact_me') ?>
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number" data-count="3">0</span><span class="stat-plus">+</span>
                        <span class="stat-label"><?= t('years_experience') ?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-number" data-count="50">0</span><span class="stat-plus">+</span>
                        <span class="stat-label"><?= t('projects_completed') ?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-number" data-count="30">0</span><span class="stat-plus">+</span>
                        <span class="stat-label"><?= t('happy_clients') ?></span>
                    </div>
                </div>
            </div>
            <div class="hero-image" data-aos="fade-left">
                <div class="hero-img-wrapper">
                    <div class="hero-blob"></div>
                    <?php if ($about && $about['profile_image']): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/<?= e($about['profile_image']) ?>" alt="Profile">
                    <?php else: ?>
                        <div class="hero-placeholder">
                            <i class="fas fa-code"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="floating-card card-1">
                    <i class="fab fa-php"></i>
                    <span>PHP</span>
                </div>
                <div class="floating-card card-2">
                    <i class="fab fa-python"></i>
                    <span>Django</span>
                </div>
                <div class="floating-card card-3">
                    <i class="fas fa-database"></i>
                    <span>MySQL</span>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
</section>

<!-- SKILLS SECTION -->
<section class="section skills-section" id="skills">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><?= t('my_skills') ?></span>
            <h2 class="section-title"><?= t('my_skills') ?></h2>
        </div>
        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
            <div class="skill-card" data-aos="fade-up">
                <div class="skill-icon">
                    <i class="<?= e($skill['icon']) ?>"></i>
                </div>
                <h3><?= e($skill['name']) ?></h3>
                <div class="skill-bar">
                    <div class="skill-progress" data-width="<?= $skill['percentage'] ?>"></div>
                </div>
                <span class="skill-percent"><?= $skill['percentage'] ?>%</span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FEATURED PROJECTS -->
<section class="section projects-section" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><?= t('my_projects') ?></span>
            <h2 class="section-title"><?= t('my_projects') ?></h2>
        </div>
        <div class="projects-grid">
            <?php foreach ($featuredProjects as $project): ?>
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
                    <p><?= e(mb_substr(getField($project, 'description'), 0, 100)) ?></p>
                    <div class="project-tech">
                        <?php foreach (explode(',', $project['technologies']) as $tech): ?>
                            <span><?= e(trim($tech)) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (count($featuredProjects) > 0): ?>
        <div class="section-cta">
            <a href="<?= BASE_URL ?>/projects.php" class="btn btn-outline"><?= t('view_projects') ?> <i class="fas fa-arrow-right"></i></a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- LATEST BLOG -->
<section class="section blog-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><?= t('blog') ?></span>
            <h2 class="section-title"><?= t('latest_posts') ?></h2>
        </div>
        <div class="blog-grid">
            <?php foreach ($latestBlogs as $blog): ?>
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
                    <p><?= e(mb_substr(getField($blog, 'short_desc'), 0, 120)) ?></p>
                    <a href="<?= BASE_URL ?>/blog-detail.php?slug=<?= e($blog['slug']) ?>" class="read-more">
                        <?= t('read_more') ?> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2><?= t('get_in_touch') ?></h2>
            <p><?= t('hero_subtitle') ?></p>
            <a href="<?= BASE_URL ?>/contact.php" class="btn btn-white"><?= t('contact_me') ?> <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
