<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$unreadCount = $pdo->query("SELECT COUNT(*) FROM contacts WHERE is_read = 0")->fetchColumn();
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="<?= currentLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/admin.css">
    <title><?= t('admin_panel') ?> - <?= t('site_name') ?></title>
</head>
<body>

<section id="sidebar">
    <a href="<?= BASE_URL ?>/admin/" class="brand">
        <i class='bx bxs-briefcase-alt-2'></i>
        <span class="text"><?= t('admin_panel') ?></span>
    </a>
    <ul class="side-menu top">
        <li class="<?= $currentPage === 'index' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>/admin/">
                <i class='bx bxs-dashboard'></i>
                <span class="text"><?= t('dashboard') ?></span>
            </a>
        </li>
        <li class="<?= $currentPage === 'blogs' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>/admin/blogs.php">
                <i class='bx bxs-book-content'></i>
                <span class="text"><?= t('blogs') ?></span>
            </a>
        </li>
        <li class="<?= $currentPage === 'projects' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>/admin/projects.php">
                <i class='bx bxs-folder-open'></i>
                <span class="text"><?= t('projects') ?></span>
            </a>
        </li>
        <li class="<?= $currentPage === 'messages' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>/admin/messages.php">
                <i class='bx bxs-message-dots'></i>
                <span class="text"><?= t('messages') ?> <?php if ($unreadCount > 0): ?><span class="badge"><?= $unreadCount ?></span><?php endif; ?></span>
            </a>
        </li>
        <li class="<?= $currentPage === 'skills' ? 'active' : '' ?>">
            <a href="<?= BASE_URL ?>/admin/skills.php">
                <i class='bx bxs-bar-chart-alt-2'></i>
                <span class="text"><?= t('manage_skills') ?></span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="<?= BASE_URL ?>/" target="_blank">
                <i class='bx bxs-show'></i>
                <span class="text"><?= t('view') ?> <?= t('site_name') ?></span>
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>/admin/logout.php" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text"><?= t('logout') ?></span>
            </a>
        </li>
    </ul>
</section>

<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="<?= t('search') ?>...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>

        <div class="lang-switch">
            <?php foreach (AVAILABLE_LANGS as $l): ?>
                <a href="?lang=<?= $l ?>" class="<?= currentLang() === $l ? 'active' : '' ?>"><?= strtoupper($l) ?></a>
            <?php endforeach; ?>
        </div>

        <a href="<?= BASE_URL ?>/admin/messages.php" class="notification">
            <i class='bx bxs-bell'></i>
            <?php if ($unreadCount > 0): ?>
                <span class="num"><?= $unreadCount ?></span>
            <?php endif; ?>
        </a>
        <span class="admin-name"><?= e($_SESSION['admin_username'] ?? 'Admin') ?></span>
    </nav>

    <main>
