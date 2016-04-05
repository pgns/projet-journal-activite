<?php 
	session_start();
	foreach($_POST as $key=>$value){$$key=$value;}
	foreach($_GET as $key=>$value){$$key=$value;}

	$SemaineCourante = date("W");
	if(isset($_POST['semaine']))
		$Semaine = $_POST['semaine'];
	else
	$Semaine=null;	
	
	include('../includes/connection_MYSQL.inc.php');
	require_once('../includes/fonctions.date.php');
	require_once('../includes/fonctions.affichage.activite.php');
	
	$Week = SemaineCourante ((date("W")), $Semaine) ;
	$currentWeek = get_date_lundi_to_Sunday_from_week($Week,date("Y"));
	$queryWeek = get_date_lundi_to_Sunday_from_week_for_query($Week,date("Y"));
	

	require_once('../includes/head.candidat.php');
	require_once('../vue/candidatActivites.vue.php');
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
