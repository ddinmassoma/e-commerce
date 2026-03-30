<form action="" method="post" class="contact">
    <label>Nom :</label>
    <input type="text" name="nom" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Sujet :</label>
    <input type="text" name="sujet" required>

    <label>Message :</label>
    <textarea name="message" required></textarea>

    <button type="submit">Envoyer</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['nom'];
    $surname = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['sujet'];

    if (empty($name) || empty($surname) || empty($email) || empty($message) || empty($subject)) {
        echo "Tous les champs sont requis.";
    } else {

    }
}
?>