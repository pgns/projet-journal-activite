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
	
	/* Renvoie le tableau de la liste des lieu en html*/
	function tableauActivite($bdd){
		$requete = $bdd->query("SELECT * FROM activite");
		$resultat = "<table>\n<tr><th>Code du l'activité</th><th>Nom de l'activité</th><th>Descriptif de l'activité</th><td>Code de la catégorie</td></tr>\n";
		while ($data = $requete->fetch()){
				$cat = $data['CodeCategorie'];
				$requete2 = $bdd->query("SELECT * FROM categorieactivite WHERE CodeCategorieActivite = $cat");
				$data2 = $requete2->fetch();
				$requete = $bdd->query("SELECT * FROM activite");
				$resultat.="<tr><td>".$data['CodeActivite']."</td><td>".$data['NomActivite']."</td><td>".$data['DescriptifActivite']."</td><td>".$data['CodeCategorie']."(".$data2['NomCategorie'].")</td></tr>\n";
				$requete2->closeCursor();
		}
		$requete->closeCursor();
		$resultat.="</table>";
		return $resultat;
	
	}
		
	/* Renvoie un select avec la liste des lieux */
	function selectActivite($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			$requete = $bdd->query("SELECT * FROM activite");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeCategorie']."\">".$data['NomActivite']."</option>\n";
			}
			$requete->closeCursor();
			$resultat.="</select>";
			return $resultat;
	}
	
	
	
?>