<?php
	require_once '../includes/connection_MYSQL.inc.php';
	
	foreach($_POST as $key=>$value){$$key=$value;}
	foreach($_GET as $key=>$value){$$key=$value;}

	if($categorie == "lieu"){
		require '../class/lieu.class.php';
		require '../modele/lieux.modele.php';

		$liste_Lieu = get_Lieux($bdd, $codeCategorie);

		
		foreach($liste_Lieu as $id => $object){
			echo '<option id="'.$object->CodeLieux.'">'.$object->NomLieux.'</option>';
		}
	}
	if($categorie == "activite"){
		require '../class/activite.class.php';
		require '../modele/activite.modele.php';
	
		$liste_Categorie = get_Activites($bdd, $codeCategorie);
		
		foreach($liste_Categorie as $id => $object){
			echo'<option id="'.$object->CodeActivite.'">'.$object->NomActivite.'</option>';
		}
	}
?>