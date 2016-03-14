<?php
	require '../includes/connection_MYSQL.inc.php';
	require '../class/activite.class.php';
	require '../modele/activite.modele.php';

	$liste_Activites = get_Activites($bdd);

	

	require_once('../vue/CandidatRenseigneActivites.vue.php');

?>