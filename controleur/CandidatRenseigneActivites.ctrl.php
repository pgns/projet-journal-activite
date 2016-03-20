<?php
	// DEF SQL
	require '../includes/connection_MYSQL.inc.php';
	// Class requise
	require '../class/activite.class.php';
	require '../class/lieu.class.php';
	require '../class/categorieActivite.class.php';
	require '../class/categorieLieu.class.php';
	
	// Modele requis
	require '../modele/activite.modele.php';
	require '../modele/lieux.modele.php';
	require '../modele/categorieActivite.modele.php';
	require '../modele/categorieLieu.modele.php';

	$liste_Activites = get_Activites($bdd);

	$liste_CategorieActivite = get_CategorieActivite($bdd);
	$liste_CategorieLieu = get_CategorieLieu($bdd);

	require_once('../vue/CandidatRenseigneActivites.vue.php');
?>