<?php
// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=CVTHEQUEPHP;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les CVs depuis la table
    $stmt = $db->prepare("SELECT file_name, file_path, uploaded_at, informations, user_id FROM cv ORDER BY uploaded_at DESC");
    $stmt->execute();
    $cvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des CVs</title>
    <link rel="stylesheet" href="/style/show_cv.css">
</head>
<body>

    <div class="switch" style="position: absolute; top: 15px; right: 35px; z-index: 1000;">
        <input type="checkbox" id="btnD" style="width: 100px; height: 50px;">
        <span class="slider"></span>
    </div>

<button class="back-button" onclick="window.history.back()">Retour</button>

    <header>
        <h1>Liste de mes CV</h1>
    </header>
    <main>
        <section>
            <?php if (!empty($cvs)): ?>
                <ul>
                    <?php foreach ($cvs as $cv): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($cv['file_path']); ?>" target="_blank">
                                <?php echo htmlspecialchars($cv['file_name']); ?>
                            </a>
                            <p><strong>Date d'upload :</strong> <?php echo htmlspecialchars($cv['uploaded_at']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun CV n'a été trouvé.</p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Script pour le Dark Mode -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('btnD');

            if (!toggleButton) {
                console.error('Toggle button not found!');
                return;
            }

            const toggleSpan = document.querySelector('.switch .slider');
            toggleSpan.addEventListener('click', function() {
                toggleButton.checked = !toggleButton.checked; // Change l'état du bouton
                if (toggleButton.checked) {
                    document.body.classList.add('dark-mode');
                } else {
                    document.body.classList.remove('dark-mode');
                }
            });
        });
    </script>
    <footer>
        <p>&copy; 2024 Ma CV-THEQUE. Tous droits réservés.</p>
    </footer>
</body>
</html>
