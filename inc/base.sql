-- CREATE DATABASE IF NOT EXISTS the;

-- USE the;




-- Table user
CREATE TABLE the_Utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    pseudo VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    genre ENUM('Homme', 'Femme','other') NOT NULL,
    date_naissance DATE NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    admin BOOLEAN
);


-- Table Varietes_de_the
CREATE TABLE the_Varietes_de_the (
    id_variete INT AUTO_INCREMENT PRIMARY KEY,
    nom_variete VARCHAR(255) NOT NULL,
    occupation DECIMAL(10,2) NOT NULL,
    rendement_par_pied DECIMAL(10,2) NOT NULL,
    prix_vente DECIMAL(10,2) NOT NULL
);

            CREATE TABLE the_saison(
                id_saison INT AUTO_INCREMENT PRIMARY KEY,
                id_variete INT,
                mois INT NOT NULL,
                FOREIGN KEY (id_variete) REFERENCES the_Varietes_de_the(id_variete)
            );

-- Table Parcelles
CREATE TABLE the_Parcelles (
    id_parcelle INT AUTO_INCREMENT PRIMARY KEY,
    numero_parcelle VARCHAR(50) NOT NULL,
    surface_hectare DECIMAL(10,2) NOT NULL,
    id_variete INT,
    FOREIGN KEY (id_variete) REFERENCES the_Varietes_de_the(id_variete)
);

CREATE TABLE the_Plantations(


    id_plantation INT AUTO_INCREMENT PRIMARY KEY,
    id_parcelle INT NOT NULL,
    date_plantation Date,
    FOREIGN KEY (id_parcelle) REFERENCES the_Parcelles(id_parcelle)
);

-- Table Cueilleurs
CREATE TABLE the_Cueilleurs (
    id_cueilleur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    genre ENUM('Homme', 'Femme','other') NOT NULL,
    date_naissance DATE NOT NULL
);

-- Table Categories_depenses
CREATE TABLE the_Categories_depenses (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100) NOT NULL
);

-- Table Configurations_salaires
CREATE TABLE the_Cueilleurs_salaires (
    id_configuration INT AUTO_INCREMENT PRIMARY KEY,
    id_cueilleur INT NOT NULL,
    montant_salaire_kg DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_cueilleur) REFERENCES the_Cueilleurs(id_cueilleur)
);



-- Table Cueillettes
CREATE TABLE the_Cueillettes (
    id_cueillette INT AUTO_INCREMENT PRIMARY KEY,
    date_cueillette DATE NOT NULL,
    id_cueilleur INT,
    id_parcelle INT,
    poids_cueilli DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_cueilleur) REFERENCES the_Cueilleurs(id_cueilleur),
    FOREIGN KEY (id_parcelle) REFERENCES the_Parcelles(id_parcelle)
);

CREATE TABLE the_Contrainte_Cueillette(
    id_contrainte INT AUTO_INCREMENT PRIMARY KEY,
    id_cueilleur INT,
    poids_min DECIMAL(10,2) NOT NULL,
    bonus DECIMAL(10,2) NOT NULL,
    malus DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_cueilleur) REFERENCES the_Cueilleurs(id_cueilleur)

);

-- Table Depenses
CREATE TABLE the_Depenses (
    id_depense INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    id_categorie INT,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES the_Categories_depenses(id_categorie)
);




-- Insertion des utilisateurs
INSERT INTO the_Utilisateur (email, pseudo, nom, prenom, genre, date_naissance, pwd, admin) 
VALUES 
('admin.doe@example.com', 'admin', 'admin', 'admin', 'Homme', '1985-05-20', sha1('admin'), 1),
('jane.smith@example.com', 'jane.smith', 'Smith', 'Jane', 'Femme', '1990-09-15', sha1('jane_password'), 0),
('alice.white@example.com', 'alice.white', 'White', 'Alice', 'Femme', '1988-12-10', sha1('alice_password'), 0);

-- Insertion des variétés de thé
INSERT INTO the_Varietes_de_the (nom_variete, occupation, rendement_par_pied, prix_vente) VALUES
('Assam', 1.5, 2.3, 10.50),
('Darjeeling', 1.2, 1.8, 12.75),
('Earl Grey', 1.8, 2.5, 15.00),
('Sencha', 1.6, 2.0, 8.90);


-- Insertion des parcelles
INSERT INTO the_Parcelles (numero_parcelle, surface_hectare, id_variete) 
VALUES 
('Parcelle 1', 15.7, 1),
('Parcelle 2', 12.3, 2),
('Parcelle 3', 18.5, 3);

-- Insertion des cueilleurs
INSERT INTO the_Cueilleurs (nom, genre, date_naissance) 
VALUES 
('Pierre Dupont', 'Homme', '1992-03-10'),
('Marie Durand', 'Femme', '1990-07-25'),
('Jeanne Martin', 'Femme', '1988-11-05');

-- Insertion des catégories de dépenses
INSERT INTO the_Categories_depenses (nom_categorie) 
VALUES 
('Engrais'),
('Carburant'),
('Outils de cueillette');

-- Insertion des configurations de salaires pour les cueilleurs
INSERT INTO the_Cueilleurs_salaires (id_cueilleur, montant_salaire_kg) 
VALUES 
(1, 3.50),
(2, 4.20),
(3, 3.80);

-- Insertion des cueillettes
INSERT INTO the_Cueillettes (date_cueillette, id_cueilleur, id_parcelle, poids_cueilli) 
VALUES 
('2023-07-10', 1, 1, 35.5),
('2023-07-12', 2, 2, 42.8),
('2023-07-15', 3, 3, 55.1);

-- Insertion des dépenses
INSERT INTO the_Depenses (date, id_categorie, montant) 
VALUES 
('2023-07-15', 1, 120.00),
('2023-07-20', 2, 90.00),
('2023-07-25', 3, 150.00);



INSERT INTO the_saison (id_variete, mois) VALUES
(1, 3), -- Exemple: Assam se régénère en mars
(2, 6), -- Exemple: Darjeeling se régénère en juin
(3, 5), -- Exemple: Earl Grey se régénère en mai
(4, 8); -- Exemple: Sencha se régénère en août


INSERT INTO the_Contrainte_Cueillette (id_cueilleur, poids_min, bonus, malus) VALUES
(1, 30.0, 1.5, 0.5), -- Exemple: Pierre Dupont
(2, 40.0, 2.0, 0.8), -- Exemple: Marie Durand
(3, 25.0, 1.2, 0.3); -- Exemple: Jeanne Martin



CREATE OR REPLACE VIEW the_view_depense AS 
SELECT SUM(montant) AS total_depenses
FROM the_Depenses;
