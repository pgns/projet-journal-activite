<?php
	class Categorie{
		public $listeLieu;
		
		public function __construct($bdd){
			if(!empty($bdd)){
				$requete = $bdd->query("SELECT * FROM categorieactivite");
				while ($data = $requete->fetch()){
					$this->listeLieu[$data['CodeCategorieActivite']] = $data['NomCategorie']; 
				}
				$requete->closeCursor();
			}
		}
		
		public function __get($name)
		{
			if (isset($this->$name))
				return $this->$name;
		}
		
		/* Renvoie le tableau de la liste des catégories d'activités en html*/
		public function tableauCategorie(){
			$resultat = "<table>\n<tr><th>Code de la catégorie</th><th>Nom de la catégorie</th></tr>\n";
			foreach ($this->listeLieu as $key => $value) {
				$resultat.="<tr><td>$key</td><td>$value</td></tr>\n";
			}
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des catégories d'activités */
		public function selectCategorie($id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			foreach ($this->listeLieu as $key => $value) {
				$resultat.="\t<option value=\"".$key."\">".$value."</option>\n";
			}
			$resultat.="</select>";
			return $resultat;
		}
	}
?>