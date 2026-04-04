<?php 
require_once 'middewares/auth.php';
require_once 'config/database.php';
?>

<style>
    a {
        text-decoration: none;
        color: inherit;
    }
</style>

<h1>
    Bonjour <?php echo htmlspecialchars($currentUser['Prenom']); ?> 👋
</h1>

<button><a href="index.php?page=panier">Voir mon panier</a></button>
<button><a href="index.php?page=deconnexion">Se déconnecter</a></button>

