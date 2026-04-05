<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

// Récupérer les items du panier pour cet utilisateur
$stmt = $pdo->prepare("SELECT * FROM panier WHERE utilisateur_id = ?");
$stmt->execute([$currentUser['ID']]);
$items = $stmt->fetchAll();
?>

<h2>Votre Panier</h2>
<div id="contenu-panier">
    <?php if (empty($items)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td>Produit ID : <?php echo $item['produit_id']; ?></td>
                    <td><?php echo $item['quantite']; ?></td>
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
<button><a href="index.php?page=commandes">Commander</a></button>
<style>
        a {
        text-decoration: none;
        color: inherit;
    }
</style>