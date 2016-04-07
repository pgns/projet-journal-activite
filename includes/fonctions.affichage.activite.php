<?php

	function renvoyerCodeCandidatfromCodetilisateur($id,$bdd){
		$sql = 'SELECT CodeCandidat FROM candidat WHERE ID="'.$id.'"';
		$res = $bdd->query($sql);
		$data = $res->fetch();
		return $data['CodeCandidat'];	
	}
	
	function renvoyerToutesOccupationDunCandidatALaDate($codeCandidat,$date,$bdd){
		$sql = 'SELECT * FROM occupation WHERE CodeCandidat="'.$codeCandidat.'" AND HeureDebut LIKE "'.$date.'%"';
		$res = $bdd->query($sql);
		$table = null;
		while($data = $res->fetch())
			$table[] = $data;
		return $table;
	}
	
	function convertCodeToNomActivite($codeActivite,$bdd){
		$sql = 'SELECT NomActivite FROM activite WHERE CodeActivite="'.$codeActivite.'"';
		$res = $bdd->query($sql);
		$data = $res->fetch();
		return $data['NomActivite'];
	}
	
	function RetournerOccupations($table,$bdd){
		$s = '<table>';
		foreach($table as $occupation){
			$s=$s.'<tr><td><center><div class="celluleOccup">';
			$s=$s. convertDateTimeToHours($occupation['HeureDebut']).'-';	
			$s=$s. convertDateTimeToHours($occupation['HeureFin']).'<br>';	
			$s=$s. convertCodeToNomActivite($occupation['CodeActivite'],$bdd);	
			$s=$s.'</div></tr></td></center>';	
		}
		$s=$s.'</table>';
		return $s;
	}
	
	function convertHoursToSecond($hours){
		$data = explode(':',$hours);
		//var_dump($data);
		return ($data[0]*60*60) + ($data[1]*60);
	}
	
	function convertSecondToTop($debutSeconde){
		return (($debutSeconde*100)/86340)*3+60;
	}
	
	function calculheight($debutSeconde,$finSeconde){
		return ((($finSeconde-$debutSeconde)*100)/86340)*3;
	}
	
	function afficheOccupations($table,$bdd,$decale){
		$s = ' ';
		foreach($table as $occupation){
			
			$debut = convertDateTimeToHours($occupation['HeureDebut']);
			$debutSeconde = convertHoursToSecond($debut);
			
			$fin = convertDateTimeToHours($occupation['HeureFin']);
			$finSeconde = convertHoursToSecond($fin);
			
			$top = convertSecondToTop($debutSeconde);
			$height = calculheight($debutSeconde,$finSeconde);
			//var_dump($height);
			
			$activite = convertCodeToNomActivite($occupation['CodeActivite'],$bdd);
			if($height >= 5){
				$s=$s.'<div class="celluleOccup" style="margin-left:'.$decale.'%;top:'.$top.'%;height:'.$height.'%;">';
				$s=$s.$debut.'-';	
				$s=$s.$fin.'<br>';	
				//~ $s=$s.$height.'<br>';	
				$s=$s.$activite ;	
				$s=$s.'</div>';
			}
			else{
				$s=$s.'<div class="celluleOccup" style="margin-left:'.$decale.'%;top:'.$top.'%;height:'.$height.'%;">';
				//~ $s=$s.$height.'<br>';	
				$s=$s.$activite ;	
				$s=$s.'</div>';
			}
				
		}
		return $s;
	}
	
	
	//~ function afficheColone($codeCandidat,$date,$day,$bdd){
		//~ $table = renvoyerToutesOccupationDunCandidatALaDate($codeCandidat,$date,$bdd);
		//~ if(isset($table)){
			//~ return '<center><div>'.RetournerOccupations($table,$bdd).'</div><button class="fancybox-a">+</button></center>';
		//~ }
		//~ else
		//~ return '<center><a href="javascript:;" class="fancybox-a"><button>+</button></a></center>';
	//~ }
	
	function afficheColone($codeCandidat,$date,$day,$bdd,$decale){
		$table = renvoyerToutesOccupationDunCandidatALaDate($codeCandidat,$date,$bdd);
		if(isset($table)){
			return afficheOccupations($table,$bdd,$decale);
		}
		else
		return '<center><a href="javascript:;" class="fancybox-a"><button>+</button></a></center>';
	}
	
		
	function print_table($weekaffichage,$weekquery,$id,$bdd){
		$codeCandidat = renvoyerCodeCandidatfromCodetilisateur($id,$bdd);
		echo '<div class="days">';
		foreach($weekaffichage as $key => $value){ //Affiche entete
			echo '<div class="coloneOccupTitle"><center>'.$value.'</center></div>';
		}
		echo '</div class="occupationContent">';
		$cpt = 0;
		foreach($weekquery as $key => $value){
			$decale = $cpt * 14.28;
			echo afficheColone($codeCandidat,$value,$key,$bdd,$decale);
			$cpt++;
		}
		echo'</div>';
	}
	
	?>
