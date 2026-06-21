<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consultation - SAE 23</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f7f6; }
        header { background-color: #2c3e50; color: white; padding: 1rem 0; text-align: center; }
        nav { background-color: #34495e; display: flex; justify-content: center; padding: 0.5rem; }
        nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .container { max-width: 1000px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .stat-container { display: flex; justify-content: space-around; margin-bottom: 20px; }
        .stat-box { padding: 10px; border-radius: 5px; color: white; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
        th { background-color: #3498db; color: white; }
    </style>
</head>
<body>
    <header><h1>Dernières Mesures</h1></header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="consultation.php">Consultation</a>
        <a href="historique.php">Gestion</a>
        <?php if(isset($_SESSION['connecte'])) { echo '<a href="logout.php">Déconnexion</a>'; } else { echo '<a href="login.php">Administration</a>'; } ?>
        <a href="projet.php">Gestion de projet</a>
    </nav>
    <div class="container">
        <?php
        $conn = mysqli_connect("localhost", "yanis", "rt", "sae23");
        $stat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MIN(valeur) as min, MAX(valeur) as max, AVG(valeur) as moy FROM Mesure"));
        echo "<div class='stat-container'>
                <div class='stat-box' style='background:#f1c40f;'>Min: ".number_format($stat['min'],1)."°C</div>
                <div class='stat-box' style='background:#e67e22;'>Moy: ".number_format($stat['moy'],1)."°C</div>
                <div class='stat-box' style='background:#e74c3c;'>Max: ".number_format($stat['max'],1)."°C</div>
              </div>";
        $res = mysqli_query($conn, "SELECT Mesure.data_mesure, Mesure.heure_mesure, Mesure.valeur, Capteur.nom_salle FROM Mesure INNER JOIN Capteur ON Mesure.nom_capteur = Capteur.nom_capteur ORDER BY Mesure.data_mesure DESC, Mesure.heure_mesure DESC LIMIT 20");
        echo "<table><tr><th>Date</th><th>Heure</th><th>Salle</th><th>Température</th></tr>";
        while($l = mysqli_fetch_assoc($res)) { echo "<tr><td>{$l['data_mesure']}</td><td>{$l['heure_mesure']}</td><td>{$l['nom_salle']}</td><td>{$l['valeur']} °C</td></tr>"; }
        echo "</table>";
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
