<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

// Récupérer les items du panier pour cet utilisateur
$stmt = $pdo->prepare("SELECT * FROM panier WHERE utilisateur_id = ?");
$stmt->execute([$currentUser['id']]);
$items = $stmt->fetchAll();
?>

<h2>Votre Panier</h2>
<div class="panier-container">
    <?php if (empty($items)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Action</th>
            </tr>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['nom_produit']; ?></td>
                    <td><?php echo $item['quantite']; ?></td>
                    <td><?php echo $item['prix']; ?> €</td>
                    <td>
                        <a href="supprimer_item.php?id=<?php echo $item['id']; ?>" 
                           style="color:red;">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<button><a href="index.php?page=profil">Retour au profil</a></button>
<button><a href="index.php?page=formulaire_commandes">Commander</a></button>
<style>
    .panier-container { margin-top: 20px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
    th { background-color: #f4f4f4; }
    a { text-decoration: none; color: inherit; }
    button { padding: 10px 15px; cursor: pointer; background: #3b6e9e; color: white; border: none; border-radius: 4px; }
    button:hover { background: #2f5a82; }
</style>