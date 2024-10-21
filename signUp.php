<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hachage du mot de passe avec password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    try {
        $db = new PDO('mysql:host=localhost;dbname=CVTHEQUEPHP;charset=utf8', 'rooteur', 'cavapaslatete');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertion dans la base de données avec le mot de passe hashé
        $stmt = $db->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->execute([':username' => $username, ':password' => $hashed_password]);

        echo "Utilisateur inscrit avec succès !";
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
