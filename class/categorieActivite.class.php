<?php
<<<<<<< HEAD
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
		
=======
	class CategorieActivite{
		public function __construct(array $categorieActivite)
		{
			if(!empty($categorieActivite))
				$this->hydrate($categorieActivite);
		}
		public function hydrate(array $donnees)
		{
			foreach($donnees as $key => $value)
			{	
				$this->$key = $value;
			}
		}

>>>>>>> e62c54b159c51b1fb7fd0b11f2be86d1bb91f89c
		public function __get($name)
		{
			if (isset($this->$name))
				return $this->$name;
		}
<<<<<<< HEAD
		
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
=======

		public function __set($name, $value)
		{
			$this->$name = $value;
>>>>>>> e62c54b159c51b1fb7fd0b11f2be86d1bb91f89c
		}
	}
?>