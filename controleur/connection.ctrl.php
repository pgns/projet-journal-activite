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
	
	
	
	
//fonction pour vérifier le captcha	
function isRecaptchaValid($code, $ip = null){
	if (empty($code)) {
		return false; // Si aucun code n'est entré, on ne cherche pas plus loin
	}
	$params = [
		'secret'    => '6LdZQBwTAAAAAHjzumX5_kPaLF3_bspnqD6lJjDv',
		'response'  => $code
	];
	if( $ip ){
		$params['remoteip'] = $ip;
	}
	$url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
	if (function_exists('curl_version')) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Evite les problèmes, si le ser
		$response = curl_exec($curl);
	} else {
		// Si curl n'est pas dispo, un bon vieux file_get_contents
		$response = file_get_contents($url);
	}
	if (empty($response) || is_null($response)) {
		return false;
	}
	$json = json_decode($response);
	return $json->success;
}
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}	

	
	
	include("../modele/inscriptionCandidat.modele.php");	/*Inscription du candidat*/
	require_once('../includes/head.inc.php');
	require_once('../vue/connection.vue.php');
	//require_once('../includes/menu.inc.php');
	require_once('../includes/footer.inc.php');
?>