<?php require_once __DIR__ . '/../includes/admin_header.php';

// Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("SELECT image FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch();
    if ($project) {
        deleteImage($project['image']);
        $pdo->prepare("DELETE FROM projects WHERE id = ?")->execute([$id]);
    }
    redirect(BASE_URL . '/admin/projects.php?msg=deleted');
}

// Save
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $data = [
        'name_uz' => trim($_POST['name_uz']),
        'name_en' => trim($_POST['name_en']),
        'slug' => generateSlug($_POST['name_en']),
        'description_uz' => trim($_POST['description_uz']),
        'description_en' => trim($_POST['description_en']),
        'technologies' => trim($_POST['technologies']),
        'github_link' => trim($_POST['github_link']),
        'live_link' => trim($_POST['live_link']),
        'is_featured' => isset($_POST['is_featured']) ? 1 : 0,
    ];

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = uploadImage($_FILES['image'], 'project');
    }

    if ($id > 0) {
        $sql = "UPDATE projects SET name_uz=:name_uz, name_en=:name_en, slug=:slug,
                description_uz=:description_uz, description_en=:description_en,
                technologies=:technologies, github_link=:github_link, live_link=:live_link, is_featured=:is_featured";
        if ($image) {
            $old = $pdo->prepare("SELECT image FROM projects WHERE id = ?");
            $old->execute([$id]);
            $oldProject = $old->fetch();
            deleteImage($oldProject['image']);
            $sql .= ", image=:image";
            $data['image'] = $image;
        }
        $sql .= " WHERE id=:id";
        $data['id'] = $id;
        $pdo->prepare($sql)->execute($data);
    } else {
        $data['image'] = $image;
        $pdo->prepare("INSERT INTO projects (name_uz, name_en, slug, description_uz, description_en, technologies, github_link, live_link, image, is_featured)
                        VALUES (:name_uz, :name_en, :slug, :description_uz, :description_en, :technologies, :github_link, :live_link, :image, :is_featured)")
             ->execute($data);
    }
    redirect(BASE_URL . '/admin/projects.php?msg=saved');
}

$editProject = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([(int)$_GET['edit']]);
    $editProject = $stmt->fetch();
}

$result = paginate($pdo, 'projects');
?>

<div class="head-title">
    <div class="left">
        <h1><?= t('projects') ?></h1>
    </div>
    <a href="?add=1" class="btn btn-primary"><i class='bx bx-plus'></i> <?= t('add_project') ?></a>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= t('success') ?></div>
<?php endif; ?>

<?php if (isset($_GET['add']) || $editProject): ?>
<div class="form-card">
    <h3><?= $editProject ? t('edit_project') : t('add_project') ?></h3>
    <form method="POST" enctype="multipart/form-data">
        <?php if ($editProject): ?>
            <input type="hidden" name="id" value="<?= $editProject['id'] ?>">
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('project_name') ?> (UZ)</label>
                <input type="text" name="name_uz" required value="<?= e($editProject['name_uz'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label><?= t('project_name') ?> (EN)</label>
                <input type="text" name="name_en" required value="<?= e($editProject['name_en'] ?? '') ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('project_desc') ?> (UZ)</label>
                <textarea name="description_uz" rows="5"><?= e($editProject['description_uz'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label><?= t('project_desc') ?> (EN)</label>
                <textarea name="description_en" rows="5"><?= e($editProject['description_en'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('technologies') ?></label>
                <input type="text" name="technologies" placeholder="PHP, JS, MySQL..." value="<?= e($editProject['technologies'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label><?= t('github_link') ?></label>
                <input type="url" name="github_link" value="<?= e($editProject['github_link'] ?? '') ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('live_demo') ?></label>
                <input type="url" name="live_link" value="<?= e($editProject['live_link'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label><?= t('blog_image') ?></label>
                <input type="file" name="image" accept="image/*">
                <?php if ($editProject && $editProject['image']): ?>
                    <img src="<?= BASE_URL ?>/assets/uploads/<?= e($editProject['image']) ?>" class="preview-img" alt="">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_featured" <?= ($editProject['is_featured'] ?? 0) ? 'checked' : '' ?>>
                <?= t('featured') ?>
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> <?= t('save') ?></button>
            <a href="<?= BASE_URL ?>/admin/projects.php" class="btn btn-secondary"><?= t('cancel') ?></a>
        </div>
    </form>
</div>
<?php else: ?>

<div class="table-data">
    <div class="order">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th><?= t('image') ?></th>
                    <th><?= t('project_name') ?></th>
                    <th><?= t('technologies') ?></th>
                    <th><?= t('date') ?></th>
                    <th><?= t('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result['items'] as $project): ?>
                <tr>
                    <td><?= $project['id'] ?></td>
                    <td>
                        <?php if ($project['image']): ?>
                            <img src="<?= BASE_URL ?>/assets/uploads/<?= e($project['image']) ?>" class="table-img" alt="">
                        <?php else: ?>
                            <i class='bx bxs-image' style="font-size:24px;color:#aaa"></i>
                        <?php endif; ?>
                    </td>
                    <td><?= e(getField($project, 'name')) ?></td>
                    <td><span class="tech-tags"><?= e($project['technologies']) ?></span></td>
                    <td><?= date('d.m.Y', strtotime($project['created_at'])) ?></td>
                    <td class="action-btns">
                        <a href="?edit=<?= $project['id'] ?>" class="btn-edit"><i class='bx bxs-edit'></i></a>
                        <a href="?delete=<?= $project['id'] ?>" class="btn-delete"><i class='bx bxs-trash'></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($result['items'])): ?>
                <tr><td colspan="6"><?= t('no_data') ?></td></tr>
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
<?php endif; ?>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
