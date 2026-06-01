<?php
session_start();
// Security check: must be a logged-in building manager
if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] !== "gestionnaire"){
    header("location: login.php");
    exit;
}
require_once 'config.php';

// Retrieve the building ID stored in session during login
$id_batiment_gestionnaire = $_SESSION["id_batiment"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion du Bâtiment</title>
</head>
<body>
    <h1>Espace Gestionnaire</h1>

    <h2>Métriques des Salles (Min, Max, Moyenne)</h2>
    <table border="1">
        <tr>
            <th>Salle</th>
            <th>Capteur</th>
            <th>Minimum</th>
            <th>Maximum</th>
            <th>Moyenne</th>
        </tr>
        <?php
        // SQL query matching exactly columns from Salle, Capteur, and Mesure in image_ef773e.png
        $query = "SELECT s.nom_salle, c.nom_capteur, 
                         MIN(m.valeur) as min_val, MAX(m.valeur) as max_val, AVG(m.valeur) as moy_val 
                  FROM Mesure m
                  JOIN Capteur c ON m.nom_capteur = c.nom_capteur
                  JOIN Salle s ON c.nom_salle = s.nom_salle
                  WHERE s.id_batiment = '$id_batiment_gestionnaire'
                  GROUP BY c.nom_capteur";
        
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nom_salle'] . "</td>";
            echo "<td>" . $row['nom_capteur'] . "</td>";
            echo "<td>" . $row['min_val'] . "</td>";
            echo "<td>" . $row['max_val'] . "</td>";
            echo "<td>" . round($row['moy_val'], 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Recherche Historique</h2>
    <form action="visualisation.php" method="get">
        <label>Choisir un capteur de votre bâtiment :</label>
        <select name="nom_capteur">
            <?php
            // Fetch only sensors belongs to this manager's building
            $sensor_query = "SELECT c.nom_capteur FROM Capteur c 
                             JOIN Salle s ON c.nom_salle = s.nom_salle 
                             WHERE s.id_batiment = '$id_batiment_gestionnaire'";
            $sensor_result = mysqli_query($conn, $sensor_query);
            while($sensor = mysqli_fetch_assoc($sensor_result)){
                echo "<option value='".$sensor['nom_capteur']."'>".$sensor['nom_capteur']."</option>";
            }
            ?>
        </select>
        
        <label>Date de début :</label>
        <input type="date" name="date_debut">
        
        <label>Date de fin :</label>
        <input type="date" name="date_fin">
        
        <input type="submit" value="Visualiser les données">
    </form>
</body>
</html>
