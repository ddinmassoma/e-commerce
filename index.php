<?php  
    $page = $_GET['page'] ?? 'accueil'; 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="index.php?page=profil">Profil</a>
                <a href="index.php?page=creation_compte">Connexion</a> 
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