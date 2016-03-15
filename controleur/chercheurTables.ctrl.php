<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	require '../includes/connection_MYSQL.inc.php';
	require '../class/lieu.class.php';
	require '../modele/activite.modele.php';
	require '../modele/categorieActivite.modele.php';
	require '../class/dispositif.class.php';
	
	$listeLieu = new Lieu($bdd);
//	$listeCategorie = new Categorie($bdd);
	$listeDispositif = new Dispositif($bdd);
	//$listeLieu->tableauLieu();
	require_once('../includes/head.inc.php');
	require_once('../vue/chercheurTables.vue.php');
	require_once('../includes/chercheurSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>