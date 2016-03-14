<?php
	class Lieu{
		public $listeLieu;
		
		public function __construct($bdd){
			if(!empty($bdd)){
				$requete = $bdd->query("SELECT * FROM lieu");
				while ($data = $requete->fetch()){
					$this->listeLieu[$data['CodeLieux']] = $data['NomLieux']; 
				}
				$requete->closeCursor();
			}
		}
		
		public function __get($name)
		{
			if (isset($this->$name))
				return $this->$name;
		}
		
		/* Renvoie le tableau de la liste des lieu en html*/
		public function tableauLieu(){
			$resultat = "<table>\n<tr><th>Code du Lieu</th><th>Nom du Lieu</th></tr>\n";
			foreach ($this->listeLieu as $key => $value) {
				$resultat.="<tr><td>$key</td><td>$value</td></tr>\n";
			}
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des lieux */
		public function selectLieu($id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			foreach ($this->listeLieu as $key => $value) {
				$resultat.="\t<option value=\"".$key."\">".$value."</option>\n";
			}
			$resultat.="</select>";
			return $resultat;
		}
	}
?>