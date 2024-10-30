<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

$passWord = 'uhma nspg urzq qabx'; // Mot de passe de l'email

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider les données
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mail = new PHPMailer(true);

        try {
            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'louis.margras@gmail.com'; // Votre adresse email
            $mail->Password = $passWord; // Mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Paramètres de l'email
            $mail->setFrom('louis.margras@gmail.com', 'Contact Site Web');
            $mail->addAddress('louis.margras@gmail.com', 'Louis Margras');

            // Contenu de l’email
            $mail->isHTML(true);
            $mail->Subject = "Nouveau message de contact de $name";
            $mail->Body    = "<strong>Nom :</strong> $name<br><strong>Email :</strong> $email<br><br><strong>Message :</strong><br>$message";
            $mail->AltBody = "Nom : $name\nEmail : $email\n\nMessage :\n$message";

            // Envoi de l’email
            $mail->send();
            header('Location: routes.php?pages=accueil'); // Redirection vers la page d'accueil
            exit;
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
        }
    } else {
        echo "Veuillez remplir tous les champs correctement.";
    }
}
?>
