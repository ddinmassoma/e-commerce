<?php  
require_once 'config/database.php';
$cartCount = 0;
$currentUser = null;

    $page = $_GET['page'] ?? 'accueil'; 

    if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];

    $check = $pdo->prepare("SELECT id FROM utilisateurs WHERE token = ?");
    $check->execute([$token]);

    $user = $check->fetch();

    if ($user) {
        $currentUser = $user;

        // 🔢 compter les produits (somme des quantités)
        $stmt = $pdo->prepare("SELECT SUM(quantite) as total FROM panier WHERE utilisateur_id = ?");
        $stmt->execute([$user['id']]);

        $result = $stmt->fetch();
        $cartCount = $result['total'] ?? 0;
    }
}

if (isset($_COOKIE['auth_token'])) {
    $token = $_COOKIE['auth_token'];

    $check = $pdo->prepare("SELECT id, prenom FROM utilisateurs WHERE token = ?");
    $check->execute([$token]);
    $currentUser = $check->fetch();
}
?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>TechStore</title>
    </head>
    <body>
        <header>
            <h1>TechStore</h1>
            <nav>
                <a href="index.php?page=accueil">Accueil</a>
                <a href="index.php?page=catalogue">Catalogue</a>
                <a href="index.php?page=formulaire_contact">Contact</a>
                <a href="index.php?page=mention_legale">Mention légale</a>
                <a href="index.php?page=Condition">Conditions d'utilisation</a>
                <!-- <a href="index.php?page=profil">Profil</a> -->
                <?php if ($currentUser): ?>
                        <a href="index.php?page=profil">
                            👤 <?= htmlspecialchars($currentUser['prenom']) ?>
                        </a>
                        <a href="index.php?page=deconnexion" style="color:red;">
                            Déconnexion
                        </a>
                    <?php else: ?>
                        <a href="index.php?page=connexion">Connexion</a>
                    <?php endif; ?> 

                <a href="index.php?page=panier" class="cart-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="cart-count"><?= $cartCount ?></span>
                </a>
            </nav>
        </header>
        <section class="hero">
            <h2>Leader international en informatique</h2>
            <p>Nous sélectionnons les meilleurs équipements informatiques pour les développeurs et autres amateurs de technologie.</p>
        </section>
        <main>
            <?php 

            switch ($page) {
                case 'accueil':
                    include 'accueil.php';
                    break;
                case 'catalogue':
                    include 'catalogue.php';
                    break;
                case 'formulaire_contact':
                    include 'formulaire_contact.php';
                    break;        
                case 'mention_legale':
                    include 'mention_legale.php';
                    break;
                case 'profil':
                    include 'profil.php';
                    break;
                case 'Condition':
                    include 'Condition.php';
                    break;    
                case 'connexion':
                    include 'connexion.php';
                    break;      
                case 'creation_compte':
                    include 'creation_compte.php';
                    break;
                case 'panier':
                    include 'panier.php';
                    break;
                case 'deconnexion':
                    include 'deconnexion.php';
                    break;
                case 'formulaire_commandes':
                    include 'formulaire_commandes.php';
                    break;
                case 'commandes':
                    include 'commandes.php';
                    break;
                case 'produit':
                    include 'produit.php';
                    break;


                default:
                    include 'config/404.php';
                    break;
            }

        
          
            ?> 
        </main>
        <footer>
            <p>TechStore</p>
            <p>contact@techstore.fr</p>
            <p>01 23 45 67 89</p>
        </footer>
    </body>
</html>