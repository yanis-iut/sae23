<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - SAE 23</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background-color: #f4f7f6; }
        header { background-color: #2c3e50; color: white; padding: 1rem 0; text-align: center; }
        nav { background-color: #34495e; display: flex; justify-content: center; padding: 0.5rem; }
        nav a { color: white; text-decoration: none; margin: 0 15px; font-weight: bold; }
        .container { max-width: 400px; margin: 50px auto; padding: 30px; background: white; border-radius: 8px; }
    </style>
</head>
<body>
    <header><h1>Administration</h1></header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="consultation.php">Consultation</a>
        <a href="historique.php">Gestion</a>
        <a href="login.php">Administration</a>
        <a href="projet.php">Gestion de projet</a>
    </nav>
    <div class="container">
        <form method="POST">
            <input type="text" name="user" placeholder="Utilisateur" required><br>
            <input type="password" name="pass" placeholder="Mot de passe" required><br>
            <button type="submit">Se connecter</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "yanis", "rt", "sae23");
            $res = mysqli_query($conn, "SELECT * FROM Administration WHERE login='".mysqli_real_escape_string($conn, $_POST['user'])."' AND mdp='".$_POST['pass']."'");
            if (mysqli_num_rows($res) == 1) { $_SESSION['connecte'] = true; header("Location: historique.php"); exit(); }
            else { echo "<p style='color:red;'>Erreur.</p>"; }
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
