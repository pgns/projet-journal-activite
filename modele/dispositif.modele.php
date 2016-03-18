<?php

		
		/* Renvoie le tableau de la liste des dispositifs en html*/
		function tableauDispositif($bdd){
			$resultat = "<table>\n<tr><th>Code du Dispositif</th><th>Nom du Dispositif</th></tr>\n";
			$requete = $bdd->query("SELECT * FROM dispositif");
			while ($data = $requete->fetch()){
				$resultat.="<tr><td>".$data['CodeDispositif']."</td><td>".$data['NomDispositif']."</td></tr>\n";
			}
			$requete->closeCursor();
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des dispositifs */
		function selectDispositif($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			$requete = $bdd->query("SELECT * FROM dispositif");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeDispositif']."\">".$data['NomDispositif']."</option>\n";
			}
			$requete->closeCursor();
			$resultat.="</select>";
			return $resultat;
		}
	
?>