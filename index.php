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
            </nav>
        </header>
        <section class="hero">
            <h2>Leader international en informatique</h2>
            <p>Nous sélectionnons les meilleurs équipements informatiques pour les développeurs et autres amateurs de technologie.</p>
        </section>
        <main>
            <?php 
            if($page === 'accueil') {
                include 'accueil.php';
            } elseif($page === 'catalogue') {
                include 'catalogue.php';
            } elseif($page === 'formulaire_contact') {
                include 'formulaire_contact.php';
            } elseif($page === 'mention_legale') {
                include 'mention_legale.php';
            } elseif($page === 'profil') {
                include 'profil.php';
            } elseif($page === 'Condition') {
                include 'Condition.php';
            } elseif($page === 'connexion') {
                include 'connexion.php';
            }
            else {
                echo "<p>Page non trouvée</p>";
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