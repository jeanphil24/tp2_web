<?php
include('param.inc.php');
try
{
	// Connexion MySQL
	$bddcafe = new PDO("mysql:host=$dbHost;dbname=$dbNomBD",$dbUser, $dbMotPasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	// Pour lancer les exceptions lorsqu'il y des erreurs PDO.
	$bddcafe->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );

}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

?>
