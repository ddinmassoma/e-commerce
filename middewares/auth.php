<?php
require_once 'config/database.php';

if (!isset($_COOKIE['auth_token'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Non authentifié"
    ]);
    exit;
}

$token = $_COOKIE['auth_token'];

$check = $pdo->prepare("SELECT ID, Prenom, `E-mail` FROM utilisateurs WHERE token = ?");
$check->execute([$token]);

$user = $check->fetch();

if (!$user) {
    echo json_encode([
        "status" => "error",
        "message" => "Utilisateur invalide"
    ]);
    exit;
}

$currentUser = $user;