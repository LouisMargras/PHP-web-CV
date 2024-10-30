-- Crée la base de données en premier
CREATE DATABASE IF NOT EXISTS CVTHEQUEPHP;
USE CVTHEQUEPHP;

-- Table user
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Table commentaire (avec clés étrangères)
CREATE TABLE IF NOT EXISTS commentaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    texte TEXT NOT NULL,
    CONSTRAINT fk_user_comment FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    CONSTRAINT fk_project_comment FOREIGN KEY (project_id) REFERENCES projet(id) ON DELETE CASCADE
);

-- Table CV (avec clé étrangère)
CREATE TABLE IF NOT EXISTS cv (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    informations TEXT NOT NULL,
    style VARCHAR(255) NOT NULL,
    CONSTRAINT fk_user_cv FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_user_cv FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Table projet (avec clé étrangère)
CREATE TABLE IF NOT EXISTS projet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    fav BOOLEAN DEFAULT FALSE,
    valide BOOLEAN DEFAULT FALSE,
    CONSTRAINT fk_user_projet FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- User ROOT
CREATE USER 'rooteur'@'localhost' IDENTIFIED BY 'cavapaslatete';
GRANT ALL PRIVILEGES ON CVTHEQUEPHP.* TO 'rooteur'@'localhost';
FLUSH PRIVILEGES;
