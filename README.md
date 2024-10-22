# 🌐 PHP Web CV/Portfolio

## 📋 Description

Ce projet est réalisé dans le cadre du cours de PHP et a pour objectif de créer un site web dynamique permettant de gérer des CV et des portfolios en ligne. L'application offre des fonctionnalités comme la gestion des utilisateurs, la personnalisation des CV/portfolios, et l'interaction avec une base de données MySQL pour la persistance des données.

## ✨ Fonctionnalités

- **🌍 Pages principales** : 
  - 🏠 Page d'accueil présentant les CV et les portfolios.
  - 📧 Page de contact avec un formulaire pour envoyer des messages.
  - ✏️ Page CV modifiable permettant d’ajouter et d’éditer un CV.
  - 🖼️ Page des projets personnels (portfolios) avec une option de recherche et de gestion.
  - 👤 Page profil modifiable permettant de voir et d'éditer son profil.
  
- **🔐 Authentification des utilisateurs** :
  - ✅ Système d’inscription et de connexion sécurisé.
  - 🛠️ Gestion des profils utilisateurs avec la possibilité de personnaliser leurs CV et projets.

- **📄 Gestion de CV et Portfolio** :
  - 📂 Les utilisateurs peuvent télécharger et gérer leur CV au format PDF.
  - 🛠️ Possibilité de créer, modifier et valider des projets.
  - 💬 Commentaires sur les projets soumis par les autres utilisateurs.

- **👨‍💼 Administration** :
  - 🔍 Validation des projets soumis par les utilisateurs par un administrateur.
  - 👥 Gestion des utilisateurs et modération des commentaires.

## 🛠️ Technologies utilisées

- **💻 Serveur** : WAMP Server (Windows, Apache, MySQL, PHP)
- **👨‍💻 Langage de programmation** : PHP pour le back-end. JS pour les fonctions web.
- **🗄️ Base de données** : MySQL pour la gestion des données utilisateurs, CV et projets.
- **📝 IDE** : Visual Studio Code pour le développement.
- **🎨 HTML/CSS/JS** : Utilisés pour le front-end (mise en page des formulaires, pages utilisateurs, etc.).
- **🔀 Gestion des routes** : Utilisation d’un fichier `.htaccess` pour gérer les routes proprement.
  
## 🗂️ Structure de la base de données

Le site utilise plusieurs tables pour organiser les données :
- **👤 user** : Contient les informations des utilisateurs (nom, prénom, username, email, mot de passe, etc.).
- **📑 cv** : Stocke les informations des CV, avec la possibilité de télécharger le fichier PDF correspondant.
- **💼 projet** : Gère les projets ajoutés par les utilisateurs.
- **💬 commentaire** : Permet de gérer les commentaires sur les projets.

## ⚙️ Installation

1. **📋 Prérequis** :
   - 🖥️ WAMP Server installé pour exécuter un serveur local.
   - 💻 Visual Studio Code pour le développement.
   - 🗄️ MySQL pour la base de données.

2. **🚀 Étapes d'installation** :
   - Clonez ce dépôt Git : https://github.com/LouisMargras/PHP-web-CV.git
   - Lancez WAMP et démarrez les services Apache et MySQL.
   - 📂 Créez une base de données dans MySQL et importez le fichier SQL fourni dans le dépôt.
   - ⚙️ Configurez les fichiers PHP avec les identifiants de connexion à la base de données.
   - 🌐 Accédez au site via l'URL locale (par exemple : `http://127.0.1.2/`).

## ✅ Bonnes pratiques

- 🚧 Séparation du front-end (HTML/CSS) et back-end (PHP).
- 🔐 Utilisation de paramètres préparés pour les requêtes SQL afin de prévenir les injections SQL.
- ⚠️ Gestion des erreurs et validation des formulaires côté serveur.
- 🔒 Utilisation de sessions PHP pour la gestion des utilisateurs connectés.

## ✍️ Auteurs

Projet réalisé par **[MARGRAS LOUIS]** dans le cadre du cours de PHP.

## 📄 Licence

Ce projet est sous licence **MIT**.
