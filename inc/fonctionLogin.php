<?php

include_once "connection.php";
function checkLogin($email, $password)
{
    $pdo = connectbd();

    try {
        $request = "SELECT id_utilisateur , pwd FROM the_Utilisateur WHERE pseudo = :email";
        $stmt = $pdo->prepare($request);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData && sha1($password)=== $userData['pwd']) {
            return $userData['id_utilisateur'];
        } else {
            return -1; // Identifiants invalides
        }

    } catch (PDOException $e) {
        echo 'PDOException - ' . $e->getMessage();
        // Gérer les exceptions PDO
        error_log('PDOException - ' . $e->getMessage(), 0);
        return -1; // Erreur de connexion à la base de données
    }
}


function crypte($password){
    return password_hash($password,PASSWORD_DEFAULT);
}