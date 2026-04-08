<?php
require_once 'config/database.php';

if (!isset($_COOKIE['auth_token'])) {
    header ("Location: index.php?page=connexion");
    exit;
}

$token = $_COOKIE['auth_token'];

$check = $pdo->prepare("SELECT id, prenom, email FROM utilisateurs WHERE token = ?");
$check->execute([$token]);

$user = $check->fetch();

if (!$user) {
    header ("Location: index.php?page=connexion");
    exit;
}

$currentUser = $user;