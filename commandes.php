<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

// Récupérer les items du panier pour cet utilisateur
$stmt = $pdo->prepare("SELECT * FROM panier WHERE utilisateur_id = ?");
$stmt->execute([$currentUser['id']]);
$items = $stmt->fetchAll();
?>

<h2>Vos Commandes</h2>
<div>
    <?php if (empty($items)): ?>
        <p>Vous n'avez aucune commandes</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['nom_produit']; ?></td>
                    <td><?php echo $item['quantite']; ?></td>
                    <td><?php echo $item['prix'] * $item['quantite']; ?> €</td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<button><a href="index.php?page=profil">Retour au profil</a></button>
<style>
        a {
        text-decoration: none;
        color: inherit;
    }
</style>