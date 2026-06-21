<?php
// 1. Démarrer la session pour pouvoir y accéder
session_start();

// 2. Supprimer toutes les données de la session
$_SESSION = array();

// 3. Détruire la session sur le serveur
session_destroy();

// 4. Rediriger l'utilisateur vers la page d'accueil après déconnexion
header("Location: index.php");
exit();
?>
