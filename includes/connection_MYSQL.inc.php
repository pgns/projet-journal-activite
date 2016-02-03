<?php
	//connexion a la BDD
	try	{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'GNS', 'gns');
	}catch(Exception $e){
        die('Erreur : Impossible de se connecter.'.$e->getMessage());
	}
?>