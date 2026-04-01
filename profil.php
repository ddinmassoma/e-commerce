<?php 
require_once 'middewares/auth.php';
require_once 'config/database.php';
?>


<h1>
    Bonjour <?php echo htmlspecialchars($currentUser['Prenom']); ?> 👋
</h1>
