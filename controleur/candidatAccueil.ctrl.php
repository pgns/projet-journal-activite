<?php 
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('Location: connection.ctrl.php');
  		exit();
	}
	else{
		foreach($_POST as $key=>$value){$$key=$value;}
		foreach($_GET as $key=>$value){$$key=$value;}


		require_once('../includes/head.inc.php');
		require_once('../vue/candidatAccueil.vue.php');
		require_once('../includes/CandidatSidebar.inc.php');
		require_once('../includes/footer.inc.php');
	}
?>
