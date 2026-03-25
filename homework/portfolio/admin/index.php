<?php require_once __DIR__ . '/../includes/admin_header.php';

$totalBlogs = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$totalProjects = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();
$totalMessages = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
$unreadMessages = $pdo->query("SELECT COUNT(*) FROM contacts WHERE is_read = 0")->fetchColumn();

$recentMessages = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC LIMIT 5")->fetchAll();
$recentBlogs = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<div class="head-title">
    <div class="left">
        <h1><?= t('dashboard') ?></h1>
        <ul class="breadcrumb">
            <li><a href="#"><?= t('dashboard') ?></a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="active" href="#"><?= t('home') ?></a></li>
        </ul>
    </div>
</div>

<ul class="box-info">
    <li>
        <i class='bx bxs-book-content'></i>
        <span class="text">
            <h3><?= $totalBlogs ?></h3>
            <p><?= t('total_blogs') ?></p>
        </span>
    </li>
    <li>
        <i class='bx bxs-folder-open'></i>
        <span class="text">
            <h3><?= $totalProjects ?></h3>
            <p><?= t('total_projects') ?></p>
        </span>
    </li>
    <li>
        <i class='bx bxs-message-dots'></i>
        <span class="text">
            <h3><?= $totalMessages ?></h3>
            <p><?= t('total_messages') ?> (<?= $unreadMessages ?> <?= t('unread') ?>)</p>
        </span>
    </li>
</ul>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h3><?= t('recent_messages') ?></h3>
            <a href="<?= BASE_URL ?>/admin/messages.php"><?= t('view') ?> &rarr;</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th><?= t('your_name') ?></th>
                    <th><?= t('your_email') ?></th>
                    <th><?= t('date') ?></th>
                    <th><?= t('status') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentMessages as $msg): ?>
                <tr>
                    <td><?= e($msg['name']) ?></td>
                    <td><?= e($msg['email']) ?></td>
                    <td><?= date('d.m.Y', strtotime($msg['created_at'])) ?></td>
                    <td>
                        <span class="status <?= $msg['is_read'] ? 'completed' : 'pending' ?>">
                            <?= $msg['is_read'] ? t('mark_read') : t('unread') ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($recentMessages)): ?>
                <tr><td colspan="4"><?= t('no_data') ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="todo">
        <div class="head">
            <h3><?= t('latest_posts') ?></h3>
            <a href="<?= BASE_URL ?>/admin/blogs.php"><?= t('view') ?> &rarr;</a>
        </div>
        <ul class="todo-list">
            <?php foreach ($recentBlogs as $blog): ?>
            <li class="<?= $blog['is_published'] ? 'completed' : 'not-completed' ?>">
                <p><?= e(getField($blog, 'title')) ?></p>
                <small><?= date('d.m.Y', strtotime($blog['created_at'])) ?></small>
            </li>
            <?php endforeach; ?>
            <?php if (empty($recentBlogs)): ?>
            <li><p><?= t('no_data') ?></p></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
