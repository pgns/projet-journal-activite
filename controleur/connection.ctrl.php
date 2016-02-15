<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	
	require '../includes/connection_MYSQL.inc.php';
	require '../class/utilisateur.class.php';
	require '../modele/utilisateur.modele.php';
	
	$reponse="";
	if((isset($username))&&(isset($password))){
		$user = connection_user($bdd,$username,$password);

		if(!empty($user)){
			session_start();
			$_SESSION['id']=$user->ID;
			$_SESSION['pseudo']=$user->Login;
			if ($user->TypeUser == "chercheur") {
				header('Location: chercheurAccueil.ctrl.php');
				exit();
			}
			elseif ($user->TypeUser == "candidat") {
				header('Location: candidatAccueil.ctrl.php');
				exit();
			}
			else {
				$reponse="Erreur : type d'utilisateur inconnu, les types d'utilisateur reconus de la bdd sont \"chercheur\" et \"candidat\" l'admin n'est pas encore implémenté";
			}
		}
		else{
			$reponse="Erreur : login ou mots de passe invalide";
		}
	}
	require_once('../includes/head.inc.php');
	require_once('../vue/connection.vue.php');
	//require_once('../includes/menu.inc.php');
	require_once('../includes/footer.inc.php');
?>