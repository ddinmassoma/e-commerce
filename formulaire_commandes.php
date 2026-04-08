<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

?>

<div class="checkout-container">
    <h2>Finaliser ma commande</h2>

    <form class="checkout-form" method="post" action="">
        
        <div class="form-group full">
            <label>Adresse de livraison</label>
            <textarea placeholder="Votre adresse complète..." required name="adresse"></textarea>
        </div>

        <div class="form-group full">
            <label>Numéro de carte</label>
            <input type="text" placeholder="0000 0000 0000 0000" required name="carte_numero">
        </div>

        <div class="form-group">
            <label>Date d'expiration</label>
            <input type="text" placeholder="MM/AA" required name="carte_expiration">
        </div>

        <div class="form-group">
            <label>CVV</label>
            <input type="text" placeholder="123" required name="carte_cvv">
        </div>

        <div class="form-group full">
            <label>Nom sur la carte</label>
            <input type="text" placeholder="Nom complet" required name="carte_nom">
        </div>

        <button type="submit" name="action" value="commander">Payer et Commander</button>

    </form>
</div>

<style>
    .checkout-container {
    max-width: 500px;
    margin: 40px auto;
    padding: 25px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    }

    .checkout-container h2 {
        margin-bottom: 20px;
    }

    .checkout-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: span 2;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    textarea {
        resize: none;
        height: 70px;
    }

    button {
        grid-column: span 2;
        padding: 12px;
        background: #3b6e9e;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.2s;
    }

    button:hover {
        background: #2f5a82;
    }
</style>


<?php

$action = $_POST['action'] ?? null;

if($action === 'commander') {
    // Récupérer les données du formulaire
    $adresse = $_POST['adresse'] ?? '';
    $carte_numero = $_POST['carte_numero'] ?? '';
    $carte_expiration = $_POST['carte_expiration'] ?? '';  
    $carte_cvv = $_POST['carte_cvv'] ?? '';
    $carte_nom = $_POST['carte_nom'] ?? '';

    //Récupérer les produits du panier de l'utilisateur
    $stmt = $pdo->prepare("SELECT nom_produit, quantite, prix FROM panier WHERE utilisateur_id = ?");
    $stmt->execute([$currentUser['id']]);
    $produits = $stmt->fetchAll();
    if (!$produits) {
            die("Votre panier est vide.");
        }

    // Calcul du total et préparation des noms de produits
        $total = 0;
        $noms_liste = [];
        foreach ($produits as $p) {
            $total += $p['prix'] * $p['quantite'];
            $noms_liste[] = $p['nom_produit'];
        }
        $tous_les_produits = implode(', ', $noms_liste); // Transforme le tableau en texte

    //Récupérer les informations du client
    $stmt = $pdo->prepare("SELECT nom, prenom, email FROM utilisateurs WHERE id = ?");
    $stmt->execute([$currentUser['id']]);
    $client = $stmt->fetch();

    // Valider les données du formulaire
    if (empty($adresse) || empty($carte_numero) || empty($carte_expiration) || empty($carte_cvv) || empty($carte_nom)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    //Insérer la commande dans la base de données
    $sql = "INSERT INTO commande (
                    id_utilisateur, 
                    adresse, 
                    statut, 
                    quantite, 
                    nom_utilisateur, 
                    prenom_utilisateur, 
                    email_utilisateur, 
                    nom_produit, 
                    prix_commande
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([
        $currentUser['id'], 
        $adresse, 
        'en attente', 
        count($produits), 
        $client['nom'], 
        $client['prenom'], 
        $client['email'], 
        $tous_les_produits, 
        $total
    ]);

    if ($success) {
            echo "Commande passée avec succès !";
            // Optionnel : vider le panier ici
        } else {
            echo "Erreur lors de l'enregistrement.";
        }
} else {
    echo "Action non reconnue.";
}
?>