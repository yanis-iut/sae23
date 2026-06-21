<?php session_start(); if (!isset($_SESSION['connecte'])) { header("Location: login.php"); exit(); } ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion - SAE 23</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f7f6; }
        header { background-color: #2c3e50; color: white; padding: 1rem 0; text-align: center; }
        nav { background-color: #34495e; display: flex; justify-content: center; padding: 0.5rem; }
        nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .container { max-width: 900px; margin: 20px auto; padding: 25px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .filter-section { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 5px solid #3498db; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <header><h1>Gestion des mesures</h1></header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="consultation.php">Consultation</a>
        <a href="historique.php">Gestion</a>
        <a href="logout.php">Déconnexion</a>
        <a href="projet.php">Gestion de projet</a>
    </nav>
    <div class="container">
        <div class="filter-section">
            <form method="GET">
                <select name="salle">
                    <option value="ALL">Toutes les salles</option>
                    <?php
                    $conn = mysqli_connect("localhost", "yanis", "rt", "sae23");
                    $salles = mysqli_query($conn, "SELECT nom_salle FROM Salle");
                    while($s = mysqli_fetch_assoc($salles)) { echo "<option value='{$s['nom_salle']}'>{$s['nom_salle']}</option>"; }
                    ?>
                </select>
                <input type="submit" value="Filtrer">
            </form>
        </div>
        <?php
        $sql = "SELECT Mesure.*, Capteur.nom_salle FROM Mesure INNER JOIN Capteur ON Mesure.nom_capteur = Capteur.nom_capteur";
        if (isset($_GET['salle']) && $_GET['salle'] != 'ALL') { $sql .= " WHERE Capteur.nom_salle = '".mysqli_real_escape_string($conn, $_GET['salle'])."'"; }
        $res = mysqli_query($conn, $sql." ORDER BY data_mesure DESC");
        echo "<table><tr><th>Salle</th><th>Date</th><th>Heure</th><th>Valeur</th></tr>";
        while($l = mysqli_fetch_assoc($res)) { echo "<tr><td>{$l['nom_salle']}</td><td>{$l['data_mesure']}</td><td>{$l['heure_mesure']}</td><td>{$l['valeur']} °C</td></tr>"; }
        echo "</table>";
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
