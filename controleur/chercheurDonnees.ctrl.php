<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	require '../includes/connection_MYSQL.inc.php';
	require_once('../includes/head.chercheur.donnees.inc.php');
	require_once('../modele/chercheurDonnees.modele.php');
	require_once('../modele/activite.modele.php');
	require_once('../modele/lieux.modele.php');
	require_once('../modele/dispositif.modele.php');
	require_once('../modele/compagnie.modele.php');
	require_once('../vue/chercheurDonnees.vue.php');
	require_once('../includes/chercheurSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>