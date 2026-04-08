<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

$stmt = $pdo->prepare("SELECT * FROM commande WHERE id_utilisateur = ? ORDER BY id_commande DESC");
$stmt->execute([$currentUser['id']]);
$commandes = $stmt->fetchAll();
?>

<h2>Vos Commandes</h2>
<div class="commandes-container">
    <?php if (empty($commandes)): ?>
        <p>Vous n'avez passé aucune commande pour le moment.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Produit(s)</th>
                    <th>Quantité (Nb articles)</th>
                    <th>Prix Total</th>
                    <th>Statut</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($commande['nom_produit']); ?></td>
                        <td><?php echo htmlspecialchars($commande['quantite']); ?></td>
                        <td><?php echo htmlspecialchars($commande['prix_commande']); ?> €</td>
                        <td><strong><?php echo htmlspecialchars($commande['statut']); ?></strong></td>
                        <td><?php echo htmlspecialchars($commande['adresse']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<br>
<button><a href="index.php?page=profil">Retour au profil</a></button>

<style>
    .commandes-container { margin-top: 20px; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
    th { background-color: #f4f4f4; }
    a { text-decoration: none; color: inherit; }
    button { padding: 10px 15px; cursor: pointer; background: #3b6e9e; color: white; border: none; border-radius: 4px; }
    button:hover { background: #2f5a82; }
</style>