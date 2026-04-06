<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

?>

<div class="contact">
    <h2>Finaliser ma commande</h2>
    
    <form action="valider_commande.php" method="POST">
        <label>Adresse de livraison :</label>
        <textarea name="adresse" required placeholder="Votre adresse complète..."></textarea>

        <label>Numéro de Carte :</label>
        <input type="text" name="cb" placeholder="0000 0000 0000 0000" required>

        <label>Date d'expiration :</label>
        <input type="text" name="expiration" placeholder="MM/AA" required>
        
        <button type="submit">Payer et Commander</button>
    </form>
</div>