<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - SAE 23</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f7f6; display: flex; flex-direction: column; min-height: 100vh; }
        header { background-color: #2c3e50; color: white; padding: 1rem 0; text-align: center; }
        nav { background-color: #34495e; display: flex; justify-content: center; padding: 0.5rem; }
        nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); flex: 1; }
        footer { background-color: #2c3e50; color: white; text-align: center; padding: 1rem; font-size: 0.9rem; }
        h2 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 5px; }
    </style>
</head>
<body>
    <header><h1>Bienvenue sur le site SAE 23</h1></header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="consultation.php">Consultation</a>
        <a href="historique.php">Gestion</a>
        <?php if(isset($_SESSION['connecte'])) { echo '<a href="logout.php">Déconnexion</a>'; } else { echo '<a href="login.php">Administration</a>'; } ?>
        <a href="projet.php">Gestion de projet</a>
    </nav>
    
    <div class="container">
        <h2>Objectif du site</h2>
        <p>Ce portail web est dédié à la surveillance et à l'analyse thermique des infrastructures de l'IUT. Il permet d'assurer un suivi précis des conditions environnementales pour optimiser le confort et la consommation énergétique.</p>

        <h2>Bâtiments et Salles équipés</h2>
        <p>Notre système centralise les données provenant des bâtiments suivants :</p>
        <ul>
            <li><strong>Bâtiment A :</strong> Salles E001, E002, E003.</li>
            <li><strong>Bâtiment B :</strong> Salles E208, E209, E210.</li>
        </ul>
        <p>Chaque salle est équipée de capteurs connectés IoT remontant les données en temps réel.</p>
    </div>

    <footer>
        <p>Mentions légales | Projet SAE 23 - Département Réseaux & Télécommunications | IUT de Blagnac</p>
    </footer>
</body>
</html>
