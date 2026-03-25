<?php

function generateSlug($text) {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9-]/', '-', $text);
    $text = preg_replace('/-+/', '-', $text);
    return trim($text, '-');
}

function uploadImage($file, $prefix = 'img') {
    $uploadDir = __DIR__ . '/../assets/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowedTypes)) {
        return false;
    }

    if ($file['size'] > 5 * 1024 * 1024) {
        return false;
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = $prefix . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $destination = $uploadDir . $filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return $filename;
    }
    return false;
}

function deleteImage($filename) {
    $filepath = __DIR__ . '/../assets/uploads/' . $filename;
    if ($filename && file_exists($filepath)) {
        unlink($filepath);
    }
}

function getField($row, $field) {
    $lang = currentLang();
    $langField = $field . '_' . $lang;
    return $row[$langField] ?? $row[$field . '_en'] ?? '';
}

function timeAgo($datetime) {
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->y > 0) return $diff->y . ' yil oldin';
    if ($diff->m > 0) return $diff->m . ' oy oldin';
    if ($diff->d > 0) return $diff->d . ' kun oldin';
    if ($diff->h > 0) return $diff->h . ' soat oldin';
    if ($diff->i > 0) return $diff->i . ' daqiqa oldin';
    return 'Hozirgina';
}

function paginate($pdo, $table, $perPage = 10, $conditions = '1=1') {
    $page = max(1, (int)($_GET['page'] ?? 1));
    $offset = ($page - 1) * $perPage;

    $countStmt = $pdo->query("SELECT COUNT(*) FROM $table WHERE $conditions");
    $total = $countStmt->fetchColumn();
    $totalPages = ceil($total / $perPage);

    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $conditions ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetchAll();

    return [
        'items' => $items,
        'page' => $page,
        'totalPages' => $totalPages,
        'total' => $total
    ];
}
