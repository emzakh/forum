<?php 

try{
	$bdd = new PDO('mysql:host=localhost;dbname=recap;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e) // permet de skip les erreurs
{
	die('Erreur: '.$e->getMessage());
}


?>