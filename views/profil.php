<?php
session_start();

// Vérifiez que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: routes.php?page=login');
    exit();
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Nom d\'utilisateur non défini';
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Nom non défini';
$surname = isset($_SESSION['surname']) ? $_SESSION['surname'] : 'Prénom non défini';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Email non défini';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../style/profil.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="switch" style="position: absolute; top: 15px; right: 35px; z-index: 1000;">
    <input type="checkbox" id="btnD" style="width: 100px; height: 50px;">
    <span class="slider"></span>
</div>

<div class="title">Profil</div>
<button class="back-button" onclick="window.history.back()">Retour</button>
<div class="profile-wrapper">
    <div class="profile-container">
        <div class="profile-pic" id="profile-pic" style="position: relative;">
            <img id="profile-image" src="../img/photoProfil.jpg" alt="Photo de profil">
        </div>
    </div>

    <div class="info-section">
        <div class="info-item"><span id="username">Username :</span><p><?php echo $_SESSION['username']; ?></p></div>
        <div class="info-item"><span id="name">Name :</span><p><?php echo $_SESSION['name']; ?></p></div>
        <div class="info-item"><span id="surname">Surname :</span><p><?php echo $_SESSION['surname']; ?></p></div>
        <div class="info-item"><span id="email">Mail :</span><p><?php echo $_SESSION['email']; ?></p></div>

        <div class="links-section">
            <a href="#" id="google-link"><i class='bx bxl-google'></i></a>
            <a href="#" id="github-link"><i class='bx bxl-github'></i></a>
            <a href="#" id="facebook-link"><i class='bx bxl-meta'></i></a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('btnD');
        if (toggleButton) {
            const toggleSpan = document.querySelector('.switch .slider');
            toggleSpan.addEventListener('click', function() {
                toggleButton.checked = !toggleButton.checked;
                document.body.classList.toggle('dark-mode', toggleButton.checked);
            });
        }
    });
</script>

</body>
</html>
