<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	require '../includes/connection_MYSQL.inc.php';
	require_once('../includes/head.inc.php');
	require_once('../modele/chercheurMonCompte.modele.php');
	require_once('../vue/chercheurMonCompte.vue.php');
	require_once('../includes/chercheurSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>