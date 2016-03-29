<?php
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}


/*Renvoie le nom du chercheur*/
function nomChercheur($bdd){
	$id = test_input($_SESSION['id']); 
	$requete = $bdd->query("SELECT * FROM chercheur WHERE ID = $id");
	$data = $requete->fetch();
	$resultat = $data['PrenomChercheur']." ".$data['NomChercheur'];
	$requete->closeCursor();
	return $resultat;
}

function mailChercheur($bdd){
	$id = test_input($_SESSION['id']); 
	$requete = $bdd->query("SELECT * FROM utilisateur WHERE ID = $id");
	$data = $requete->fetch();
	$resultat = $data['MailCandidat'];
	$requete->closeCursor();
	return $resultat;
}

function loginChercheur($bdd){
	$id = test_input($_SESSION['id']); 
	$requete = $bdd->query("SELECT * FROM utilisateur WHERE ID = $id");
	$data = $requete->fetch();
	$resultat = $data['Login'];
	$requete->closeCursor();
	return $resultat;
}

?>