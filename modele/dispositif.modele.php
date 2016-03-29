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
		
		/* Renvoie la liste des dispositifs*/
		function listeDispositif($bdd){
			$resultat = "Code du Dispositif: Nom du Dispositif:\n";
			$requete = $bdd->query("SELECT * FROM dispositif");
			while ($data = $requete->fetch()){
				$resultat.=$data['CodeDispositif']."  ".$data['NomDispositif']."\n";
			}
			$requete->closeCursor();
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des dispositifs */
		function selectDispositif($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n\t<option selected value=\"-1\">Sélectionnez un dispositif</option>\n";
			$requete = $bdd->query("SELECT * FROM dispositif");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeDispositif']."\">".$data['NomDispositif']."</option>\n";
			}
			$requete->closeCursor();
			$resultat.="</select>";
			return $resultat;
		}
	
?>