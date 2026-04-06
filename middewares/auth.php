<?php
require_once 'config/database.php';

if (!isset($_COOKIE['auth_token'])) {
    return null;
}

$token = $_COOKIE['auth_token'];

$check = $pdo->prepare("SELECT ID, Prenom, `E-mail` FROM utilisateurs WHERE token = ?");
$check->execute([$token]);

$user = $check->fetch();

if (!$user) {
    return null;
}

$currentUser = $user;
?>