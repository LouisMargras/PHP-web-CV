<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hachage du mot de passe avec password_hash()
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données
    try {
        $db = new PDO('mysql:host=localhost;dbname=CVTHEQUEPHP;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertion dans la base de données avec le mot de passe hashé
        $stmt = $db->prepare("INSERT INTO user (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)");
        $stmt->execute([
            ':name' => $name,
            ':surname' => $surname,
            ':username' => $username,
            ':email' => $email,
            ':password' => $password
        ]);

        echo '<script>
            Swal.fire({
                title: "Good job!",
                text: "User is register !",
                icon: "success"
            });
        </script>';
        header('Location: /routes/routes.php?page=accueil'); // Redirection vers la page d'accueil
        exit();
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
