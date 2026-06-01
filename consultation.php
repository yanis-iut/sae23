<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dernières Mesures</title>
</head>
<body>
    <h1>Dernières mesures des capteurs par salle</h1>

    <table border="1">
        <tr>
            <th>Salle</th>
            <th>Capteur</th>
            <th>Type</th>
            <th>Dernière Valeur</th>
            <th>Unité</th>
            <th>Date & Heure</th>
        </tr>
        <?php
        // Updated query matching your exact image_ef773e.png columns
        $query = "SELECT m.nom_capteur, m.valeur, m.data_mesure, m.heure_mesure, 
                         c.type_capteur, c.unite, c.nom_salle 
                  FROM Mesure m
                  JOIN Capteur c ON m.nom_capteur = c.nom_capteur
                  WHERE m.id_mesure = (SELECT MAX(id_mesure) FROM Mesure WHERE nom_capteur = c.nom_capteur)";
        
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nom_salle'] . "</td>";
            echo "<td>" . $row['nom_capteur'] . "</td>";
            echo "<td>" . $row['type_capteur'] . "</td>";
            echo "<td>" . $row['valeur'] . "</td>";
            echo "<td>" . $row['unite'] . "</td>";
            echo "<td>" . $row['data_mesure'] . " à " . $row['heure_mesure'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
