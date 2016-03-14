<?php
	// retourne tout les leiux dans un tableau d'objet
	function get_Lieux($bdd){
		$requete = "SELECT * FROM lieu ";
		$sth = $bdd->prepare($requete);
		$sth->execute();
		
		while ($reponse = $sth->fetch(PDO::FETCH_ASSOC))
		{
			$listeLieux[] = new lieu($reponse);
		}
		return $listeLieux;
	}
?>