<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <a href="<?= BASE_URL ?>/" class="logo">
                    <span class="logo-text">Portfolio<span class="dot">.</span></span>
                </a>
                <p class="footer-desc"><?= t('hero_subtitle') ?></p>
                <div class="social-links">
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Telegram"><i class="fab fa-telegram-plane"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4><?= t('home') ?></h4>
                <a href="<?= BASE_URL ?>/about.php"><?= t('about') ?></a>
                <a href="<?= BASE_URL ?>/blogs.php"><?= t('blog') ?></a>
                <a href="<?= BASE_URL ?>/projects.php"><?= t('projects') ?></a>
                <a href="<?= BASE_URL ?>/contact.php"><?= t('contact') ?></a>
            </div>
            <div class="footer-col">
                <h4><?= t('contact') ?></h4>
                <p><i class="fas fa-envelope"></i> <a href="mailto:bargida.tilyakova25@gmail.com">bargida.tilyakova25@gmail.com</a></p>
                <p><i class="fas fa-phone"></i> +998 90 123 45 67</p>
                <p><i class="fas fa-map-marker-alt"></i> Tashkent, Uzbekistan</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Portfolio. <?= t('footer_text') ?></p>
        </div>
    </div>
</footer>

<!-- BACK TO TOP -->
<a href="#" class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<script src="<?= BASE_URL ?>/assets/js/main.js"></script>
</body>
</html>
