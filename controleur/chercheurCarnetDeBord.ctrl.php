<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}


	require_once('../includes/head.inc.php');
	require_once('../vue/chercheurCarnetDeBord.vue.php');
	require_once('../includes/chercheurSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>