<?php
	function get_Activites($bdd){
		$requete = "SELECT * FROM activite ";
		$sth = $bdd->prepare($requete);
		$sth->execute();
		
		while ($reponse = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$listeActivites[] = new activite($reponse);
		}
		return $listeActivites;
	}
?>