<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de Projet - SAE 23</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f7f6; }
        header { background-color: #2c3e50; color: white; padding: 1rem 0; text-align: center; }
        nav { background-color: #34495e; display: flex; justify-content: center; padding: 0.5rem; }
        nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .container { max-width: 900px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .box { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
    </style>
</head>
<body>
    <header><h1>Gestion de Projet</h1></header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="consultation.php">Consultation</a>
        <a href="historique.php">Gestion</a>
        <?php if(isset($_SESSION['connecte'])) { echo '<a href="logout.php">Déconnexion</a>'; } else { echo '<a href="login.php">Administration</a>'; } ?>
        <a href="projet.php">Gestion de projet</a>
    </nav>
    <div class="container">
        <div class="box">
            <h2>Planning (GANTT)</h2>
            <img src="gant.png" alt="Gantt final" style="width:100%; border:1px solid #ccc; border-radius:5px;">
        </div>
        
        <div class="box">
            <h2>Répartition des tâches</h2>
            <p><strong>Yanis :</strong> Conception et développement de l'architecture Web (PHP/MySQL), sécurisation des sessions, gestion des accès et création de l'interface dynamique de consultation et de gestion des données.</p>
            <p><strong>Mayeul & Baptiste :</strong> Mise en œuvre de la chaîne de traitement IoT. Ils ont d'abord réalisé le déploiement des conteneurs Docker en local, puis la connexion au broker MQTT de l'IUT. Ils ont ensuite configuré Node-RED pour le formatage des données des capteurs et la mise en place de la visualisation sous Grafana.</p>
        </div>

        <div class="box">
            <h2>Problèmes & Solutions</h2>
            <ul>
                <li><strong>Connexion BDD :</strong> Erreur d'authentification résolue via la configuration du compte root et la sécurisation des accès PHP.</li>
                <li><strong>Intégration IoT :</strong> Complexité du formatage des données dans Node-RED résolue par une configuration précise des nœuds de parsing JSON.</li>
                <li><strong>Navigation :</strong> Mise en place d'une structure uniforme pour répondre aux contraintes du cahier des charges.</li>
            </ul>
        </div>
    </div>
</body>
</html>
