<?php
	require_once '../includes/connection_MYSQL.inc.php';
	
	foreach($_POST as $key=>$value){$$key=$value;}
	foreach($_GET as $key=>$value){$$key=$value;}
	
	if($categorie == "lieu"){
		require '../class/lieu.class.php';
		require '../modele/lieux.modele.php';

		$liste_Categorie = get_CategorieLieu($bdd, $codeCategorie);
		
		foreach($liste_Categorie as $id => $object){
			echo'<option id="'.$object->CodeLieux.'">'.$object->NomCategorie.'</option>';
		}
	}
	if($categorie == "activite"){
		require '../modele/activite.modele.php';
		require '../class/categorieActivite.class.php';
		
		$liste_Categorie = get_CategorieActivite($bdd, $codeCategorie);
		
		foreach($liste_Categorie as $id => $object){
			echo'<option id="'.$object->CodeActivite.'">'.$object->NomCategorie.'</option>';
		}
	}
?>