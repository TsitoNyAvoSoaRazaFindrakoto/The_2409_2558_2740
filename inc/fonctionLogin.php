<?php

include_once 'connection.php';

function checkLogin($email, $password)
{
    $pdo = connectbd();

    try {
        $request = "SELECT id, pwd FROM the_Utilisateur WHERE pseudo = :email";
        $stmt = $pdo->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && password_verify($password, $userData['pwd'])) {
            return $userData['id'];
        } else {
            return -1; // Identifiants invalides
        }
    } catch (PDOException $e) {
        // Gérer les exceptions PDO
        error_log('PDOException - ' . $e->getMessage(), 0);
        return -1; // Erreur de connexion à la base de données
    }
}


function crypte($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}