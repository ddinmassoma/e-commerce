<?php 
require_once 'config/database.php';
?>

<form action="" method="post" class="profil">
    <label>Nom :</label>
    <input type="text" name="nom" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" required>

    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Mot de passe :</label>
    <input type="password" name="mot_de_passe" required>

    <button type="submit">Créer un compte</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['nom']);
    $surname = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $password = $_POST['mot_de_passe'];

    // ✅ Validation
    if (empty($name) || empty($surname) || empty($email) || empty($password)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // ✅ Check if email already exists
    $check = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
    $check->execute([$email]);

    if ($check->fetch()) {
        echo "Email déjà utilisé.";
        exit;
    }

    // ✅ Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Insert user
    $stmt = $pdo->prepare("
        INSERT INTO utilisateurs (Nom, Prenom, Email, Mdp)
        VALUES (?, ?, ?, ?)
    ");

    if ($stmt->execute([$name, $surname, $email, $hashedPassword])) {
        echo "Utilisateur créé avec succès ✅";
    } else {
        echo "Erreur lors de la création.";
    }
}
?>