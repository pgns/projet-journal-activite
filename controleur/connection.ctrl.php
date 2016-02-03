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
			$_SESSION['id']=$user->id;
			$_SESSION['pseudo']=$user->pseudo;
			echo "Connection réussit";
		}
		else{
			$reponse="Erreur : login ou mots de passe invalide";
		}
	}

	require_once('../includes/head.inc.php');
	require_once('../vue/connection.vue.php');
	require_once('../includes/footer.inc.php');
?>
