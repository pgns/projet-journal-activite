<?php 
	session_start();
	foreach($_POST as $key=>$value){$$key=$value;}
	foreach($_GET as $key=>$value){$$key=$value;}

	if(!isset($_SESSION['id']))
	{
		header('Location: connection.ctrl.php');
  		exit();
	}
	else{
		require_once('../includes/head.inc.php');
		require_once('../vue/accueil.vue.php');
		//require_once('../includes/menu.inc.php');
		require_once('../includes/footer.inc.php');
	}
?>