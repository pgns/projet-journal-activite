<?php
	class Activite{
<<<<<<< HEAD
		public $listeActivite;
		
		public function __construct($bdd){
			if(!empty($bdd)){
				$requete = $bdd->query("SELECT * FROM activite");
				while ($data = $requete->fetch()){
					$activite['NomActivite'] = $data['NomActivite'];
					$activite['CodeActivite'] = $data['CodeActivite'];
					$activite['DescriptifActivite'] = $data['DescriptifActivite'];
					$cat = $data['CodeCategorie'];
					$activite['CodeCategorie'] = $cat;
					$requete2 = $bdd->query("SELECT * FROM categorieactivite WHERE CodeCategorieActivite = $cat");
					$data2 = $requete2->fetch();
					$activite['NomCategorie'] = $data2['NomCategorie'];
					$requete2->closeCursor();
					$this->listeActivite[$data['CodeActivite']] = $activite; 
				}
				$requete->closeCursor();
			}
		}
		
=======
		public function __construct(array $activite)
		{
			if(!empty($activite))
				$this->hydrate($activite);
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
		
		/* Renvoie le tableau de la liste des lieu en html*/
		public function tableauActivite(){
			$resultat = "<table>\n<tr><th>Code du l'activité</th><th>Nom de l'activité</th><th>Descriptif de l'activité</th><td>Code de la catégorie</td></tr>\n";
			foreach ($this->listeActivite as $key => $value) {
				$resultat.="<tr><td>$key</td><td>".$value['NomActivite']."</td><td>".$value['DescriptifActivite']."</td><td>".$value['CodeCategorie']."(".$value['NomCategorie'].")</td></tr>\n";
			}
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des lieux */
		public function selectActivite($id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			foreach ($this->listeActivite as $key => $value) {
				$resultat.="\t<option value=\"".$key."\">".$value['NomActivite']."</option>\n";
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