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
	
	/* Renvoie le tableau de la liste des lieu en html*/
	function tableauLieu($bdd){
			$resultat = "<table>\n<tr><th>Code du Lieu</th><th>Nom du Lieu</th></tr>\n";
			$requete = $bdd->query("SELECT * FROM lieu");
				while ($data = $requete->fetch()){
				$resultat.="<tr><td>".$data['CodeLieux']."</td><td>".$data['NomLieux']."</td></tr>\n";
			}
			$resultat.="</table>";
			$requete->closeCursor();
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des lieux */
	function selectLieu($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			$requete = $bdd->query("SELECT * FROM lieu");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeLieux']."\">".$data['NomLieux']."</option>\n";
			}
			$resultat.="</select>";
			$requete->closeCursor();
			return $resultat;
	}
	
?>