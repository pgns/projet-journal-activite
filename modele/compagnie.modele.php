<?php	
		/* Renvoie le tableau de la liste des compagnies en html*/
		function tableauCompagnie($bdd){
			$resultat = "<table>\n<tr><th>Code de la compagnie</th><th>Nom de la compagnie</th></tr>\n";
			$requete = $bdd->query("SELECT * FROM compagnie");
			while ($data = $requete->fetch()){
				$resultat.="<tr><td>".$data['CodeCompagnie']."</td><td>".$data['NomCompagnie']."</td></tr>\n";
			}
			$requete->closeCursor();
			$resultat.="</table>";
			return $resultat;
		}
		
		
		/* Renvoie la liste des compagnies*/
		function listeCompagnie($bdd){
			$resultat = "Code de la compagnie: Nom de la compagnie:\n";
			$requete = $bdd->query("SELECT * FROM compagnie");
			while ($data = $requete->fetch()){
				$resultat.=$data['CodeCompagnie']." ".$data['NomCompagnie']."\n";
			}
			$requete->closeCursor();
			return $resultat;
		}
?>