<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

?>



<div class="contact-container">

    <!-- FORM -->
    <div class="contact-form">
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
    </div>

    <!-- MAP + CONTACT -->
    <div class="contact-info">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5250.23891816132!2d2.2932440986965794!3d48.855932394428145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701fecd7f1bb%3A0xda0b3d0ab838114d!2sTour%20Eiffel%20-%20Parc%20du%20Champ-de-Mars%2C%2075007%20Paris%2C%20France!5e0!3m2!1sen!2sdz!4v1775673855226!5m2!1sen!2sdz"
             width="100%" 
             height="400" 
             style="border:0;" 
             allowfullscreen="" 
             loading="lazy" 
             referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        <div class="info-box">
            <h3>Contact</h3>
            <p>Tour Eiffel, Paris</p>
            <p>+33 23 45 67 89</p>
            <p>contact@techstore.fr</p>
        </div>

    </div>

</div>

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