<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    // Vérification du fichier PDF
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['cv']['tmp_name'];
        $fileName = $_FILES['cv']['name'];
        $fileSize = $_FILES['cv']['size'];
        $fileType = $_FILES['cv']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Vérifiez si le fichier est un PDF
        if ($fileExtension === 'pdf') {
            // Déplacer le fichier vers le dossier souhaité
            $uploadFileDir = './uploaded_cvs/';
            $dest_path = $uploadFileDir . $fileName;

            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                echo "Le fichier a été téléchargé avec succès.";
            } else {
                echo "Il y a eu une erreur lors du téléchargement du fichier.";
            }
        } else {
            echo "Veuillez télécharger un fichier au format PDF.";
        }
    } else {
        echo "Il y a eu une erreur avec le fichier.";
    }
}
?>
