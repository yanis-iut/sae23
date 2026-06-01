<?php
session_start();
// Security check: matching the Administration table criteria from image_ef773e.png
if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "admin"){
    header("location: login.php");
    exit;
}
require_once 'config.php';

// Form processing for adding a building with its manager credentials
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_building'])){
    $id_bat = mysqli_real_escape_string($conn, $_POST['id_batiment']);
    $nom_bat = mysqli_real_escape_string($conn, $_POST['nom_batiment']);
    $login_gest = mysqli_real_escape_string($conn, $_POST['login_gest']);
    $mdp_gest = mysqli_real_escape_string($conn, $_POST['mdp_gest']);
    
    // Query aligned with Bâtiment attributes from image_ef773e.png
    $query = "INSERT INTO Bâtiment (id_batiment, nom_batiment, login, mot_de_pass) 
              VALUES ('$id_bat', '$nom_bat', '$login_gest', '$mdp_gest')";
              
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>
<body>
    <h1>Espace Administration (Table Administration)</h1>

    <h2>Ajouter un Bâtiment et son Gestionnaire</h2>
    <form action="administration.php" method="post">
        <label>ID Bâtiment (int) :</label><br>
        <input type="number" name="id_batiment" required><br><br>
        
        <label>Nom du bâtiment :</label><br>
        <input type="text" name="nom_batiment" required><br><br>
        
        <label>Identifiant Gestionnaire (login) :</label><br>
        <input type="text" name="login_gest" required><br><br>
        
        <label>Mot de passe Gestionnaire :</label><br>
        <input type="password" name="mdp_gest" required><br><br>
        
        <input type="submit" name="add_building" value="Créer le bâtiment">
    </form>
</body>
</html>
