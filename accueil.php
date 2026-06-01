
<?php

session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title> SAE 23 -Accueil</title>
</head>
<body>
	<h1> Bienvenue sur le site de supervision IoT (SAE23)</h1>
	<p> Ce site permet de visualiser et d analyser les données des capteurs installés dans les batiments de lIUT.</p>
	
	<h2> Batiments gérés et salles équipées</h2>
	<?php
	$query = "SELECT id_batiment,nom_salle, type_salle FROM Salle";
	$result = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($result) > 0) {
		echo "<ul>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<li>Batiment ID: " .$row['id_batiment'] ." | Salle : " .$row['nom_salle'] ."(".$row['type_salle'] . ")</li>";
			}
		echo "</ul>";
		} else {
			echo "<p>Aucune salle enregistrée pour le moment.</p>";
		}
	?>
	
	<footer>
		<p>Mentions légales : 2026 - IUT de Blagnac - Département R&T</p>
	</footer>
</body>
</html>
