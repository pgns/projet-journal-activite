<?php
		/* Renvoie un tableau d'objet php contenant la liste complete des CategorieActivités de la BDD*/
		function get_CategorieActivite($bdd){
			$requete = "SELECT * FROM categorieactivite ";
			$sth = $bdd->prepare($requete);
			$sth->execute();
			
			while ($reponse = $sth->fetch(PDO::FETCH_ASSOC))
			{
				$listeCategorieActivite[] = new categorieActivite($reponse);
			}
			return $listeCategorieActivite;
		}
	
		/* Renvoie le tableau de la liste des catégories d'activités en html*/
		function tableauCategorie($bdd){
			$requete = $bdd->query("SELECT * FROM categorieactivite");
			$resultat = "<table>\n<tr><th>Nom de la catégorie</th></tr>\n";
			while ($data = $requete->fetch()){
				$resultat.="<tr><td>".$data['NomCategorie']."</td></tr>\n";
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
		
		function selectCategorieVide($bdd,$id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			$resultat.= "<option value=\"-1\" selected></option>\n";
			$requete = $bdd->query("SELECT * FROM categorieactivite");
			while ($data = $requete->fetch()){
				$resultat.="\t<option value=\"".$data['CodeCategorieActivite']."\">".$data['NomCategorie']."</option>\n";
			}
			$resultat.="</select>";
			return $resultat;
		}
?>