<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}
	  
	require '../includes/connection_MYSQL.inc.php';
	require '../modele/lieux.modele.php';
	require '../modele/activite.modele.php';
	require '../modele/categorieActivite.modele.php';
	require '../modele/dispositif.modele.php';

	require_once('../includes/head.inc.php');
?>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../js/chercheurTables.js"></script>
<?php
	require_once('../vue/chercheurTables.vue.php');
	require_once('../includes/chercheurSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>