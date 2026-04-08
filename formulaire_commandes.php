<?php
require_once 'middewares/auth.php';
require_once 'config/database.php';

?>

<div class="checkout-container">
    <h2>Finaliser ma commande</h2>

    <form class="checkout-form" method="post" action="ajouter_commandes.php">
        
        <div class="form-group full">
            <label>Adresse de livraison</label>
            <textarea placeholder="Votre adresse complète..." required></textarea>
        </div>

        <div class="form-group full">
            <label>Numéro de carte</label>
            <input type="text" placeholder="0000 0000 0000 0000" required>
        </div>

        <div class="form-group">
            <label>Date d'expiration</label>
            <input type="text" placeholder="MM/AA" required>
        </div>

        <div class="form-group">
            <label>CVV</label>
            <input type="text" placeholder="123" required>
        </div>

        <div class="form-group full">
            <label>Nom sur la carte</label>
            <input type="text" placeholder="Nom complet" required>
        </div>

        <button type="submit">Payer et Commander</button>

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