<?php 
// Start session to maintain user state (navbar link adaptation if needed)
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SAÉ23 - Gestion de Projet</title>
</head>
<body>
    <header>
        <h1>Rapport de Gestion de Projet — SAÉ23</h1>
        <p>Groupe de projet : IoT Supervision</p>
    </header>

    <main>
        <section>
            <h2>1. Planning GANTT Final</h2>
            <p>Ci-dessous le diagramme de GANTT final représentant la planification réelle des tâches (développement PHP, configuration de la VM, base de données, intégration des capteurs) et le suivi des jalons de la Semaine 21 à la Semaine 25.</p>
            
            <p><em>[Insérer ici le diagramme de GANTT exporté de vos outils de planification]</em></p>
        </section>

        <section>
            <h2>2. Outils Collaboratifs et Suivi</h2>
            <p>Pour mener à bien ce projet en équipe, nous avons centralisé notre code et nos tâches à l'aide de plusieurs outils :</p>
            <ul>
                <li><strong>GitHub :</strong> Utilisation d'un dépôt distant commun pour la gestion de version du code source PHP et SQL (historique des commits régulier).</li>
                <li><strong>Outils de communication :</strong> Usage de plateformes collaboratives pour la répartition des tâches et le suivi quotidien.</li>
            </ul>
            <p><em>[Vous pouvez ajouter ici des captures d écran de votre historique de commits GitHub ou de votre tableau de tâches]</em></p>
        </section>

        <section>
            <h2>3. Synthèses Personnelles</h2>
            
            <h3>👤 Membre 1 : Yanis</h3>
            <ul>
                <li><strong>Travail réalisé :</strong> Initialisation et configuration du dépôt Git/GitHub, résolution des conflits d authentification (Tokens PAT), création de l architecture globale des pages PHP et mise en conformité des requêtes SQL avec la structure PhpMyAdmin.</li>
                <li><strong>Problèmes rencontrés :</strong> Erreurs d authentification terminal lors du <code>git push</code> (rejet de mot de passe par GitHub) et blocages de fusion lors du premier <code>git pull</code> de synchronisation.</li>
                <li><strong>Solutions apportées :</strong> Génération d un Personal Access Token (classic) sur l interface GitHub et utilisation de l option <code>--force</code> pour l alignement initial des historiques de branches.</li>
            </ul>

            <h3>👤 Membre 2 : [Nom du coéquipier]</h3>
            <ul>
                <li><strong>Travail réalisé :</strong> [Exemple : Conception de la base de données sous PhpMyAdmin, scripts d insertion des mesures de test...]</li>
                <li><strong>Problèmes rencontrés :</strong> [Détailler les difficultés techniques rencontrées]</li>
                <li><strong>Solutions apportées :</strong> [Détailler comment le problème a été résolu]</li>
            </ul>

            <h3>👤 Membre 3 : [Nom du coéquipier]</h3>
            <ul>
                <li><strong>Travail réalisé :</strong> [Exemple : Configuration de la machine virtuelle Lubuntu, installation et démarrage des services Apache/MySQL via LAMPP...]</li>
                <li><strong>Problèmes rencontrés :</strong> [...]</li>
                <li><strong>Solutions apportées :</strong> [...]</li>
            </ul>
        </section>

        <section>
            <h2>4. Conclusion</h2>
            <p>En conclusion, cette SAÉ23 nous a permis de mettre en place une solution informatique complète et supervisée. L application web répond aux exigences du cahier des charges : les utilisateurs anonymes accèdent aux données courantes, les gestionnaires disposent d outils statistiques sur leurs bâtiments respectifs, et l administrateur possède un contrôle total sur l infrastructure des bâtiments.</p>
        </section>
    </main>

    <footer>
        <hr>
        <p>Ressource R210 / R209 — IUT de Blagnac</p>
    </footer>
</body>
</html>
