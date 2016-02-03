<?php
	function connection_user($bdd, $username, $password)
	{
		$requete = $bdd->prepare("SELECT * FROM utilisateur WHERE Login = '".$username."' AND MotDePasse = '".$password."'");
		$requete->execute();

		$resultat = $requete->fetch();
		if($resultat != false){
			$resultat = new Utilisateur($resultat);
		}else{
			$resultat = "";
		}
		return $resultat;
	}
?>