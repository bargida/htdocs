<?php
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = t('contact') . ' - ' . t('site_name');
require_once __DIR__ . '/includes/header.php';

$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
        $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);
        $success = t('message_sent');
    } else {
        $error = t('message_error');
    }
}
?>

<section class="breadcrumb-section">
    <div class="container">
        <h1><?= t('contact_me') ?></h1>
        <div class="breadcrumb-nav">
            <a href="<?= BASE_URL ?>/"><?= t('home') ?></a>
            <span>/</span>
            <span class="current"><?= t('contact') ?></span>
        </div>
    </div>
</section>

<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info" data-aos="fade-right">
                <h2><?= t('get_in_touch') ?></h2>
                <p><?= t('hero_subtitle') ?></p>

                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p><a href="mailto:bargida.tilyakova25@gmail.com">bargida.tilyakova25@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4><?= t('contact') ?></h4>
                            <p>+998 90 123 45 67</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Location</h4>
                            <p>Tashkent, Uzbekistan</p>
                        </div>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-telegram-plane"></i></a>
                </div>
            </div>

            <div class="contact-form-wrapper" data-aos="fade-left">
                <?php if ($success): ?>
                    <div class="alert-front alert-success"><?= e($success) ?></div>
                <?php elseif ($error): ?>
                    <div class="alert-front alert-danger"><?= e($error) ?></div>
                <?php endif; ?>

                <form method="POST" class="contact-form">
                    <div class="form-group-front">
                        <label><?= t('your_name') ?></label>
                        <input type="text" name="name" required placeholder="<?= t('your_name') ?>">
                    </div>
                    <div class="form-group-front">
                        <label><?= t('your_email') ?></label>
                        <input type="email" name="email" required placeholder="<?= t('your_email') ?>">
                    </div>
                    <div class="form-group-front">
                        <label><?= t('your_message') ?></label>
                        <textarea name="message" rows="6" required placeholder="<?= t('your_message') ?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fas fa-paper-plane"></i> <?= t('send_message') ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
