<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

?>



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

        $mail = new PHPMailer(true);

        try {
            
        // SMTP config
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ddinmassoma@gmail.com';
        $mail->Password   = 'slpz zqni agkf huhp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;


         // Sender & receiver
        $mail->setFrom('ddinmassoma@gmail.com', 'Contact Website E-Commerce');
        $mail->addAddress('ddinmassoma@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;

        
        /* @TODO : Add HTML Template & CSS */
         $mail->Body = "
            <h3>Nouveau message</h3>
            <p><strong>Nom:</strong> $name</p>
            <p><strong>Prénom:</strong> $surname</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";


        $mail->AltBody = "Nom: $name\nPrenom: $surname\nEmail: $email\nMessage: $message";

        $mail->send();

        echo "Message envoyé avec succès ✅";



        } catch (Exception $e) {
             echo "Erreur: {$mail->ErrorInfo}";
        }

    }
}
?>