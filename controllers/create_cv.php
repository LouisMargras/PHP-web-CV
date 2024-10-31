<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $cvContent = htmlspecialchars($_POST['CVcontent']);

    // Instancier Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $dompdf = new Dompdf($options);

    // Créer le contenu HTML du CV
    $html = "
    <h1>Mon CV</h1>
    <p><strong>Nom :</strong> $name</p>
    <p><strong>Prénom :</strong> $surname</p>
    <p><strong>Email :</strong> $email</p>
    <h2>Contenu de votre CV</h2>
    <p>$cvContent</p>
    ";

    // Charger le contenu HTML dans Dompdf
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Créer le nom de fichier
    $pdfFilename = "cv_{$name}_{$surname}.pdf";

    // Enregistrer le PDF sur le serveur
    $output = $dompdf->output();
    $pdfPath = "uploaded_cvs/$pdfFilename";
    file_put_contents($pdfPath, $output);

    // Envoyer le PDF au navigateur
    $dompdf->stream($pdfFilename, ["Attachment" => true]);

    // Enregistrer dans la base de données
    try {
        $db = new PDO('mysql:host=localhost;dbname=CVTHEQUEPHP;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer l'insertion
        $stmt = $db->prepare("INSERT INTO votre_table_cv (user_id, informations, style, file_name, file_path, uploaded_at) VALUES (:user_id, :informations, :style, :file_name, :file_path, NOW())");
        $stmt->execute([
            ':user_id' => 1, // ID de l'utilisateur connecté
            ':informations' => $cvContent,
            ':style' => 'default', 
            ':file_name' => $pdfFilename,
            ':file_path' => $pdfPath // Chemin où le PDF est stocké
        ]);

        echo '<script>
            Swal.fire({
                title: "Succès !",
                text: "Votre CV a été créé et enregistré !",
                icon: "success"
            });
        </script>';
        header('Location: routes.php?page=accueil'); // Redirection vers la page d\'accueil
        exit();
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
