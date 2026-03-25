<?php require_once __DIR__ . '/../includes/admin_header.php';

// Mark as read
if (isset($_GET['read'])) {
    $pdo->prepare("UPDATE contacts SET is_read = 1 WHERE id = ?")->execute([(int)$_GET['read']]);
    redirect(BASE_URL . '/admin/messages.php');
}

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM contacts WHERE id = ?")->execute([(int)$_GET['delete']]);
    redirect(BASE_URL . '/admin/messages.php?msg=deleted');
}

$result = paginate($pdo, 'contacts');
?>

<div class="head-title">
    <div class="left">
        <h1><?= t('messages') ?></h1>
    </div>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= t('success') ?></div>
<?php endif; ?>

<div class="table-data">
    <div class="order">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th><?= t('your_name') ?></th>
                    <th><?= t('your_email') ?></th>
                    <th><?= t('your_message') ?></th>
                    <th><?= t('date') ?></th>
                    <th><?= t('status') ?></th>
                    <th><?= t('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result['items'] as $msg): ?>
                <tr class="<?= $msg['is_read'] ? '' : 'unread-row' ?>">
                    <td><?= $msg['id'] ?></td>
                    <td><?= e($msg['name']) ?></td>
                    <td><a href="mailto:<?= e($msg['email']) ?>"><?= e($msg['email']) ?></a></td>
                    <td class="msg-cell"><?= e(mb_substr($msg['message'], 0, 100)) ?>...</td>
                    <td><?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?></td>
                    <td>
                        <span class="status <?= $msg['is_read'] ? 'completed' : 'pending' ?>">
                            <?= $msg['is_read'] ? t('mark_read') : t('unread') ?>
                        </span>
                    </td>
                    <td class="action-btns">
                        <?php if (!$msg['is_read']): ?>
                            <a href="?read=<?= $msg['id'] ?>" class="btn-edit" title="<?= t('mark_read') ?>"><i class='bx bxs-check-circle'></i></a>
                        <?php endif; ?>
                        <a href="?delete=<?= $msg['id'] ?>" class="btn-delete"><i class='bx bxs-trash'></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($result['items'])): ?>
                <tr><td colspan="7"><?= t('no_data') ?></td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($result['totalPages'] > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $result['totalPages']; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $result['page'] ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
