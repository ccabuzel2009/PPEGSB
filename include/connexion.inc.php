<?php
/** 
 * Permet la connexion à la base de donnée
 * @Projet : PPE GSB
 * @Fichier : include/connexion.inc.php
 * @Auteur  : CABUZEL Clément
 * @Date    : 29/06/2016
 */

$dbHost = 'localhost'; 
$dbUser = 'root'; 
$dbPassword = ''; // A remplacer selon la configuration de wamp
$dbBase = 'gsb';

try {
	$chaine = "mysql:host=" . $dbHost . ";dbname=" . $dbBase;
	$db = new PDO($chaine, $dbUser,  $dbPassword);
	// dialogue en utf_8
	$db->exec("SET NAMES 'utf8'");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) { // à personnaliser 
	?>
	<!DOCTYPE html>
	<html lang="fr">
	<head>
	<title>Erreur de connexion</title>
	<meta charset="utf-8">
	<style > 
		#fenetre {width : 500px; background : #fcfcfc; border : 5px solid #cfcfcf;}
		#corps { margin : 5px; padding : 5px; font-size : 11px; text-align:left;}
	</style>
	</head>
	<body >
	<div id="fenetre">
		<div id="corps">
			<h1 > 
				Accès au site actuellement impossible 
			</h1>
			<h2>
				<?php echo $e->getMessage(); ?>
			</h2>
		</div>
	</div> 
	</body>
	</html>
<?php
	exit();
}
