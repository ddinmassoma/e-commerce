<?php
require_once 'middewares/auth.php'; // Sécurité : l'utilisateur doit être connecté
require_once 'config/database.php';

if (isset($_POST['produit_id'])) {
    $produit_id = $_POST['produit_id'];
    $utilisateur_id = $currentUser['ID']; // Récupéré via auth.php

    // On vérifie si le produit est déjà dans le panier
    $check = $pdo->prepare("SELECT id FROM panier WHERE utilisateur_id = ? AND produit_id = ?");
    $check->execute([$utilisateur_id, $produit_id]);
    $exists = $check->fetch();

    if ($exists) {
        // On augmente la quantité
        $update = $pdo->prepare("UPDATE panier SET quantite = quantite + 1 WHERE id = ?");
        $update->execute([$exists['id']]);
    } else {
        // On insère le nouveau produit
        $insert = $pdo->prepare("INSERT INTO panier (utilisateur_id, produit_id, quantite) VALUES (?, ?, 1)");
        $insert->execute([$utilisateur_id, $produit_id]);
    }
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Produit ID manquant"]);
}