<?php
	class Dispositif{
		public $listeDisp;
		
		public function __construct($bdd){
			if(!empty($bdd)){
				$requete = $bdd->query("SELECT * FROM dispositif");
				while ($data = $requete->fetch()){
					$this->listeDisp[$data['CodeDispositif']] = $data['NomDispositif']; 
				}
				$requete->closeCursor();
			}
		}
		
		public function __get($name)
		{
			if (isset($this->$name))
				return $this->$name;
		}
		
		/* Renvoie le tableau de la liste des dispositifs en html*/
		public function tableauDispositif(){
			$resultat = "<table>\n<tr><th>Code du Dispositif</th><th>Nom du Dispositif</th></tr>\n";
			foreach ($this->listeDisp as $key => $value) {
				$resultat.="<tr><td>$key</td><td>$value</td></tr>\n";
			}
			$resultat.="</table>";
			return $resultat;
		}
		
		/* Renvoie un select avec la liste des dispositifs */
		public function selectDispositif($id,$name){
			$resultat = "<select name=\"$name\" id=\"$id\">\n";
			foreach ($this->listeDisp as $key => $value) {
				$resultat.="\t<option value=\"".$key."\">".$value."</option>\n";
			}
			$resultat.="</select>";
			return $resultat;
		}
	}
?>