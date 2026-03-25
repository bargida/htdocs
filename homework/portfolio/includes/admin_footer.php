    </main>
</section>

<script>
// Toggle sidebar
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
});

if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
}

window.addEventListener('resize', function () {
    if (this.innerWidth < 768) {
        sidebar.classList.add('hide');
    }
});

// Confirm delete
document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function(e) {
        if (!confirm('<?= t('confirm_delete') ?>')) {
            e.preventDefault();
        }
    });
});
</script>
</body>
</html>
