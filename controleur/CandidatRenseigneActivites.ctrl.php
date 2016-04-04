<?php
	session_start();
	foreach($_POST as $key=>$value){$$key=$value;}
	
	// DEF SQL
	 require '../includes/connection_MYSQL.inc.php';
	// Classes requise
	require '../class/activite.class.php';
	require '../class/lieu.class.php';
	require '../class/categorieActivite.class.php';
	require '../class/categorieLieu.class.php';
	// require '../class/compagnie.class.php';
	require '../class/dispositif.class.php';
	
	// Modele requis
	require '../modele/activite.modele.php';
	require '../modele/lieux.modele.php';
	require '../modele/categorieActivite.modele.php';
	require '../modele/categorieLieu.modele.php';
	// require '../modele/compagnie.modele.php';
	require '../modele/dispositif.modele.php';
		
	if(isset($HeureDebut)){
		require '../modele/occupation.modele.php';
		$occupation['HeureDebut']=$HeureDebut;
		$occupation['HeureFin']=$HeureFin;
		$occupation['CodeCandidat']=$_SESSION['id'];
		$occupation['CodeLieux']=$CodeLieux;
		$occupation['CodeActivite']=$CodeActivite;
		$occupation['CodeCompagnie']=$CodeCompagnie;
		$occupation['CodeDispositif']=$CodeDispositif;
		add_occupation($bdd,$occupation);
	}else{
		$liste_Activites = get_Activites($bdd);
		

		$liste_CategorieActivite = get_CategorieActivite($bdd);
		$liste_ActiviteDefault = get_Activites($bdd,1);
		$liste_CategorieLieu = get_CategorieLieu($bdd);
		$liste_LieuDefault = get_Lieux($bdd,1);		
		// $liste_compagnie = get_Compagnie($bdd);
		$liste_dispositif = get_dispositif($bdd);

		
		require_once('../vue/CandidatRenseigneActivites.vue.php');
	}
?>