<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}


	require_once('../includes/head.inc.php');
	require '../includes/connection_MYSQL.inc.php';
?>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="../js/highcharts.js"></script>
	
<?php
	require_once('../modele/candidatMonHistorique.modele.php');	
	require_once('../vue/candidatMonHistorique.vue.php');
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
