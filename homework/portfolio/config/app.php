<?php
session_start();

define('BASE_URL', '/homework/portfolio');
define('UPLOAD_DIR', __DIR__ . '/../assets/uploads/');
define('DEFAULT_LANG', 'uz');
define('AVAILABLE_LANGS', ['uz', 'en']);

// Set language
if (isset($_GET['lang']) && in_array($_GET['lang'], AVAILABLE_LANGS)) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? DEFAULT_LANG;

// Load language file
$translations = require __DIR__ . '/../lang/' . $lang . '/messages.php';

function t($key) {
    global $translations;
    return $translations[$key] ?? $key;
}

function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ' . BASE_URL . '/admin/login.php');
        exit;
    }
}

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function redirect($url) {
    header("Location: $url");
    exit;
}

function currentLang() {
    return $_SESSION['lang'] ?? DEFAULT_LANG;
}
