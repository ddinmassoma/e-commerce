<?php
require_once 'config/database.php';
// 1. On supprime le cookie dans le navigateur (en lui donnant une date expirée)
if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];

    // 2. OPTIONNEL : On vide le token dans la DB pour invalider la session côté serveur
    $update = $pdo->prepare("UPDATE utilisateurs SET token = NULL WHERE token = ?");
    $update->execute([$token]);

    // On expire le cookie
    setcookie("auth_token", "", time() - 3600, "/");
}

// 3. Redirection vers la page de connexion ou l'accueil
header("Location: index.php?page=profil");
exit;