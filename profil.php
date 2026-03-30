<form action="" method="post" class="profil">
    <label>Nom :</label>
    <input type="text" name="nom" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Mot de passe :</label>
    <input type="password" name="mot_de_passe" required>

    <button type="submit">Connexion</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['nom'];
    $surname = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    if (empty($name) || empty($surname) || empty($email) || empty($password)) {
        echo "Tous les champs sont requis.";
    } else {

    }
}
?>