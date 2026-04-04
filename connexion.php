<?php 
require_once 'config/database.php';
?>

<form action="" method="post" class="profil">
    <label>Email :</label>
    <input type="email" name="email" required>

    <label>Mot de passe :</label>
    <input type="password" name="mot_de_passe" required>

    <button type="submit">Se connecter</button>
    <p>Vous n'avez pas encore de compte ? <a href="index.php?page=creation_compte">Inscrivez-vous</a></p>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['mot_de_passe'];

    // ✅ Validation
    if (empty($email) || empty($password)) {
        echo "Tous les champs sont requis.";
    }

    // ✅ Vérification de l'utilisateur
    $check = $pdo->prepare("SELECT ID, `Mot-de-passe` FROM utilisateurs WHERE `E-mail` = ?");
    $check->execute([$email]);

    $user = $check->fetch();

    if ($user && password_verify($password, $user['Mot-de-passe'])) {

    // ✅ Generate secure token
    $token = bin2hex(random_bytes(32));

    // ✅ Save token in DB
    $update = $pdo->prepare("UPDATE utilisateurs SET token = ? WHERE ID = ?");
    $update->execute([$token, $user['ID']]);

    // ✅ Store token in cookie (recommended)
    setcookie("auth_token", $token, time() + (86400 * 7), "/", "", false, true); // 7 days

    echo "Connexion réussie !";

} else {
    echo "Email ou mot de passe incorrect.";
}
    }

    // ✅ Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
?>