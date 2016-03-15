<?php

		
		/* Renvoie le tableau de la liste des catégories d'activités en html*/
		function tableauCategorie($bdd){
			$requete = $bdd->query("SELECT * FROM categorieactivite");
			$resultat = "<table>\n<tr><th>Code de la catégorie</th><th>Nom de la catégorie</th></tr>\n";
			while ($data = $requete->fetch()){
				$resultat.="<tr><td>".$data['CodeCategorieActivite']."</td><td>".$data['NomCategorie']."</td></tr>\n";
			}
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des catégories d'activités */
		function selectCategorie($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			$requete = $bdd->query("SELECT * FROM categorieactivite");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeCategorieActivite']."\">".$data['NomCategorie']."</option>\n";
			}
			$resultat.="</select>";
			return $resultat;
		}
?>