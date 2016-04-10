<?php 
	session_start();
	foreach($_POST as $key=>$value){$$key=$value;}
	foreach($_GET as $key=>$value){$$key=$value;}

	// Classes requise
	require '../class/activite.class.php';
	require '../class/lieu.class.php';
	require '../class/categorieActivite.class.php';
	require '../class/categorieLieu.class.php';
	// require '../class/compagnie.class.php';
	// require '../class/dispositif.class.php';
	
	// Modele requis
	require '../modele/activite.modele.php';
	require '../modele/lieux.modele.php';
	require '../modele/categorieActivite.modele.php';
	require '../modele/categorieLieu.modele.php';
	// require '../modele/compagnie.modele.php';
	// require '../modele/dispositif.modele.php';
	
	$SemaineCourante = date("W");
	if(isset($_POST['semaine']))
		$Semaine = $_POST['semaine'];
	else
	$Semaine=null;	
	
	include('../includes/connection_MYSQL.inc.php');
	require_once('../includes/fonctions.date.php');
	require_once('../includes/fonctions.affichage.activite.php');
	
	$Week = SemaineCourante ((date("W")), $Semaine) ;
	$currentWeek = get_date_lundi_to_Sunday_from_week($Week,date("Y"),1);
	$queryWeek = get_date_lundi_to_Sunday_from_week_for_query($Week,date("Y"));
	
	$liste_Activites = get_Activites($bdd);

	$liste_CategorieActivite = get_CategorieActivite($bdd);
	$liste_ActiviteDefault = get_Activites($bdd,1);
	$liste_CategorieLieu = get_CategorieLieu($bdd);
	$liste_LieuDefault = get_Lieux($bdd,1);		
	// $liste_compagnie = get_Compagnie($bdd);
	// $liste_dispositif = get_dispositif($bdd);

	require_once('../includes/head.candidat.php');
	require_once('../vue/candidatActivites.vue.php');
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
