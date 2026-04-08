<?php
require_once 'config/database.php';

$cartCount = 0;

if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];

    $check = $pdo->prepare("SELECT id FROM utilisateurs WHERE token = ?");
    $check->execute([$token]);
    $user = $check->fetch();

    if ($user) {
        $stmt = $pdo->prepare("SELECT SUM(quantite) as total FROM panier WHERE utilisateur_id = ?");
        $stmt->execute([$user['id']]);
        $result = $stmt->fetch();
        $cartCount = $result['total'] ?? 0;
    }
}

echo json_encode(["count" => $cartCount]);