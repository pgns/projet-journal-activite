<?php foreach($_POST as $key=>$value){$$key=$value;}?>
<?php foreach($_GET as $key=>$value){$$key=$value;}?>
<?php
	/** NEED CONNECTION BDD **/
	require 'class/utilisateur.class.php';
	require 'modele/utilisateur.modele.php';

	echo "test_co";

	require_once('vue/connection.php');
?>