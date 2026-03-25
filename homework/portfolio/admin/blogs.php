<?php require_once __DIR__ . '/../includes/admin_header.php';

// Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("SELECT image FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    $blog = $stmt->fetch();
    if ($blog) {
        deleteImage($blog['image']);
        $pdo->prepare("DELETE FROM blogs WHERE id = ?")->execute([$id]);
    }
    redirect(BASE_URL . '/admin/blogs.php?msg=deleted');
}

// Save (Add/Edit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $data = [
        'title_uz' => trim($_POST['title_uz']),
        'title_en' => trim($_POST['title_en']),
        'slug' => generateSlug($_POST['title_en']),
        'short_desc_uz' => trim($_POST['short_desc_uz']),
        'short_desc_en' => trim($_POST['short_desc_en']),
        'content_uz' => $_POST['content_uz'],
        'content_en' => $_POST['content_en'],
        'is_published' => isset($_POST['is_published']) ? 1 : 0,
    ];

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $image = uploadImage($_FILES['image'], 'blog');
    }

    if ($id > 0) {
        // Update
        $sql = "UPDATE blogs SET title_uz=:title_uz, title_en=:title_en, slug=:slug,
                short_desc_uz=:short_desc_uz, short_desc_en=:short_desc_en,
                content_uz=:content_uz, content_en=:content_en, is_published=:is_published";
        if ($image) {
            $old = $pdo->prepare("SELECT image FROM blogs WHERE id = ?");
            $old->execute([$id]);
            $oldBlog = $old->fetch();
            deleteImage($oldBlog['image']);
            $sql .= ", image=:image";
            $data['image'] = $image;
        }
        $sql .= " WHERE id=:id";
        $data['id'] = $id;
        $pdo->prepare($sql)->execute($data);
    } else {
        // Insert
        $data['image'] = $image;
        $pdo->prepare("INSERT INTO blogs (title_uz, title_en, slug, short_desc_uz, short_desc_en, content_uz, content_en, image, is_published)
                        VALUES (:title_uz, :title_en, :slug, :short_desc_uz, :short_desc_en, :content_uz, :content_en, :image, :is_published)")
             ->execute($data);
    }
    redirect(BASE_URL . '/admin/blogs.php?msg=saved');
}

// Edit form data
$editBlog = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->execute([(int)$_GET['edit']]);
    $editBlog = $stmt->fetch();
}

// List
$result = paginate($pdo, 'blogs');
?>

<div class="head-title">
    <div class="left">
        <h1><?= t('blog_posts') ?></h1>
    </div>
    <a href="?add=1" class="btn btn-primary"><i class='bx bx-plus'></i> <?= t('add_blog') ?></a>
</div>

<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?= t('success') ?></div>
<?php endif; ?>

<?php if (isset($_GET['add']) || $editBlog): ?>
<!-- ADD / EDIT FORM -->
<div class="form-card">
    <h3><?= $editBlog ? t('edit_blog') : t('add_blog') ?></h3>
    <form method="POST" enctype="multipart/form-data">
        <?php if ($editBlog): ?>
            <input type="hidden" name="id" value="<?= $editBlog['id'] ?>">
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('blog_title') ?> (UZ)</label>
                <input type="text" name="title_uz" required value="<?= e($editBlog['title_uz'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label><?= t('blog_title') ?> (EN)</label>
                <input type="text" name="title_en" required value="<?= e($editBlog['title_en'] ?? '') ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('short_description') ?> (UZ)</label>
                <textarea name="short_desc_uz" rows="3"><?= e($editBlog['short_desc_uz'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label><?= t('short_description') ?> (EN)</label>
                <textarea name="short_desc_en" rows="3"><?= e($editBlog['short_desc_en'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('blog_content') ?> (UZ)</label>
                <textarea name="content_uz" rows="8"><?= e($editBlog['content_uz'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label><?= t('blog_content') ?> (EN)</label>
                <textarea name="content_en" rows="8"><?= e($editBlog['content_en'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label><?= t('blog_image') ?></label>
                <input type="file" name="image" accept="image/*">
                <?php if ($editBlog && $editBlog['image']): ?>
                    <img src="<?= BASE_URL ?>/assets/uploads/<?= e($editBlog['image']) ?>" class="preview-img" alt="">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_published" <?= ($editBlog['is_published'] ?? 1) ? 'checked' : '' ?>>
                    <?= t('published') ?>
                </label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> <?= t('save') ?></button>
            <a href="<?= BASE_URL ?>/admin/blogs.php" class="btn btn-secondary"><?= t('cancel') ?></a>
        </div>
    </form>
</div>
<?php else: ?>

<!-- LIST -->
<div class="table-data">
    <div class="order">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th><?= t('image') ?></th>
                    <th><?= t('blog_title') ?></th>
                    <th><?= t('status') ?></th>
                    <th><?= t('date') ?></th>
                    <th><?= t('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result['items'] as $blog): ?>
                <tr>
                    <td><?= $blog['id'] ?></td>
                    <td>
                        <?php if ($blog['image']): ?>
                            <img src="<?= BASE_URL ?>/assets/uploads/<?= e($blog['image']) ?>" class="table-img" alt="">
                        <?php else: ?>
                            <i class='bx bxs-image' style="font-size:24px;color:#aaa"></i>
                        <?php endif; ?>
                    </td>
                    <td><?= e(getField($blog, 'title')) ?></td>
                    <td><span class="status <?= $blog['is_published'] ? 'completed' : 'pending' ?>"><?= $blog['is_published'] ? t('published') : 'Draft' ?></span></td>
                    <td><?= date('d.m.Y', strtotime($blog['created_at'])) ?></td>
                    <td class="action-btns">
                        <a href="?edit=<?= $blog['id'] ?>" class="btn-edit" title="<?= t('edit') ?>"><i class='bx bxs-edit'></i></a>
                        <a href="?delete=<?= $blog['id'] ?>" class="btn-delete" title="<?= t('delete') ?>"><i class='bx bxs-trash'></i></a>
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
