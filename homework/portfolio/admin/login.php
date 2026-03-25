<?php
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../config/database.php';

if (isLoggedIn()) {
    redirect(BASE_URL . '/admin/');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        redirect(BASE_URL . '/admin/');
    } else {
        $error = t('login_error');
    }
}
?>
<!DOCTYPE html>
<html lang="<?= currentLang() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/admin.css">
    <title><?= t('login') ?> - <?= t('admin_panel') ?></title>
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class='bx bxs-briefcase-alt-2'></i>
                <h1><?= t('admin_panel') ?></h1>
                <p><?= t('login') ?></p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= e($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username"><i class='bx bxs-user'></i> <?= t('username') ?></label>
                    <input type="text" id="username" name="username" required
                           value="<?= e($username ?? '') ?>" placeholder="<?= t('username') ?>">
                </div>
                <div class="form-group">
                    <label for="password"><i class='bx bxs-lock'></i> <?= t('password') ?></label>
                    <input type="password" id="password" name="password" required
                           placeholder="<?= t('password') ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class='bx bxs-log-in'></i> <?= t('login') ?>
                </button>
            </form>

            <div class="login-lang">
                <?php foreach (AVAILABLE_LANGS as $l): ?>
                    <a href="?lang=<?= $l ?>" class="<?= currentLang() === $l ? 'active' : '' ?>"><?= strtoupper($l) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
