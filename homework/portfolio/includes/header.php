<?php
if (!function_exists('t')) {
    require_once __DIR__ . '/../config/app.php';
    require_once __DIR__ . '/../config/database.php';
    require_once __DIR__ . '/../includes/functions.php';
}

$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="<?= currentLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? t('site_name') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>

<!-- PRELOADER -->
<div class="preloader" id="preloader">
    <div class="loader">
        <div class="loader-ring"></div>
        <span>Portfolio</span>
    </div>
</div>

<!-- HEADER -->
<header class="header" id="header">
    <div class="container">
        <a href="<?= BASE_URL ?>/" class="logo">
            <span class="logo-text">Portfolio<span class="dot">.</span></span>
        </a>

        <nav class="nav" id="nav">
            <a href="<?= BASE_URL ?>/" class="nav-link <?= $currentPage === 'index' ? 'active' : '' ?>"><?= t('home') ?></a>
            <a href="<?= BASE_URL ?>/about.php" class="nav-link <?= $currentPage === 'about' ? 'active' : '' ?>"><?= t('about') ?></a>
            <a href="<?= BASE_URL ?>/blogs.php" class="nav-link <?= $currentPage === 'blogs' ? 'active' : '' ?>"><?= t('blog') ?></a>
            <a href="<?= BASE_URL ?>/projects.php" class="nav-link <?= $currentPage === 'projects' ? 'active' : '' ?>"><?= t('projects') ?></a>
            <a href="<?= BASE_URL ?>/contact.php" class="nav-link <?= $currentPage === 'contact' ? 'active' : '' ?>"><?= t('contact') ?></a>
        </nav>

        <div class="header-right">
            <div class="lang-switcher">
                <?php foreach (AVAILABLE_LANGS as $l): ?>
                    <a href="?lang=<?= $l ?>" class="<?= currentLang() === $l ? 'active' : '' ?>"><?= strtoupper($l) ?></a>
                <?php endforeach; ?>
            </div>
            <a href="<?= BASE_URL ?>/contact.php" class="btn btn-primary"><?= t('hire_me') ?></a>
            <button class="mobile-toggle" id="mobileToggle">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
