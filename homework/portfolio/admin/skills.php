<?php require_once __DIR__ . '/../includes/admin_header.php';

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM skills WHERE id = ?")->execute([(int)$_GET['delete']]);
    redirect(BASE_URL . '/admin/skills.php?msg=deleted');
}

// Save
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $data = [
        'name' => trim($_POST['name']),
        'percentage' => (int)$_POST['percentage'],
        'icon' => trim($_POST['icon']),
        'sort_order' => (int)$_POST['sort_order'],
    ];

    if ($id > 0) {
        $data['id'] = $id;
        $pdo->prepare("UPDATE skills SET name=:name, percentage=:percentage, icon=:icon, sort_order=:sort_order WHERE id=:id")
            ->execute($data);
    } else {
        $pdo->prepare("INSERT INTO skills (name, percentage, icon, sort_order) VALUES (:name, :percentage, :icon, :sort_order)")
            ->execute($data);
    }
    redirect(BASE_URL . '/admin/skills.php?msg=saved');
}

$editSkill = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM skills WHERE id = ?");
    $stmt->execute([(int)$_GET['edit']]);
    $editSkill = $stmt->fetch();
}

$skills = $pdo->query("SELECT * FROM skills ORDER BY sort_order ASC")->fetchAll();
?>

<div class="head-title">
    <div class="left">
        <h1><?= t('manage_skills') ?></h1>
    </div>
    <a href="?add=1" class="btn btn-primary"><i class='bx bx-plus'></i> <?= t('add') ?></a>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= t('success') ?></div>
<?php endif; ?>

<?php if (isset($_GET['add']) || $editSkill): ?>
<div class="form-card">
    <h3><?= $editSkill ? t('edit') : t('add') ?></h3>
    <form method="POST">
        <?php if ($editSkill): ?>
            <input type="hidden" name="id" value="<?= $editSkill['id'] ?>">
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label>Skill Name</label>
                <input type="text" name="name" required value="<?= e($editSkill['name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Percentage (0-100)</label>
                <input type="number" name="percentage" min="0" max="100" value="<?= e($editSkill['percentage'] ?? 80) ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Icon Class (FontAwesome)</label>
                <input type="text" name="icon" placeholder="fab fa-php" value="<?= e($editSkill['icon'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="<?= e($editSkill['sort_order'] ?? 0) ?>">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> <?= t('save') ?></button>
            <a href="<?= BASE_URL ?>/admin/skills.php" class="btn btn-secondary"><?= t('cancel') ?></a>
        </div>
    </form>
</div>
<?php endif; ?>

<div class="table-data">
    <div class="order">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Skill</th>
                    <th>%</th>
                    <th><?= t('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($skills as $skill): ?>
                <tr>
                    <td><?= $skill['sort_order'] ?></td>
                    <td><i class="<?= e($skill['icon']) ?>" style="font-size:20px"></i></td>
                    <td><?= e($skill['name']) ?></td>
                    <td>
                        <div class="skill-bar-mini">
                            <div style="width:<?= $skill['percentage'] ?>%"></div>
                            <span><?= $skill['percentage'] ?>%</span>
                        </div>
                    </td>
                    <td class="action-btns">
                        <a href="?edit=<?= $skill['id'] ?>" class="btn-edit"><i class='bx bxs-edit'></i></a>
                        <a href="?delete=<?= $skill['id'] ?>" class="btn-delete"><i class='bx bxs-trash'></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
