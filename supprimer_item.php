<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM panier WHERE id = ? AND utilisateur_id = ?");
    $stmt->execute([$_GET['id'], $currentUser['ID']]);
}

header("Location: index.php?page=panier");
exit;