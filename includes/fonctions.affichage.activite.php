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
			$s=$s.'<tr><td>';
			$s=$s. convertDateTimeToHours($occupation['HeureDebut']).'-';	
			$s=$s. convertDateTimeToHours($occupation['HeureFin']).'<br>';	
			$s=$s. convertCodeToNomActivite($occupation['CodeActivite'],$bdd);	
			$s=$s.'</tr></td>';	
		}
		$s=$s.'</table>';
		return $s;
	}
	
	
	function afficheColone($codeCandidat,$date,$day,$bdd){
		$table = renvoyerToutesOccupationDunCandidatALaDate($codeCandidat,$date,$bdd);
		if(isset($table)){
			return RetournerOccupations($table,$bdd).'<center>
			<input type="button" name="'.convertNumToDay($day).'" value="+" onclick="">
			</center>';
		}
		else
			return '<center>
			<input type="button" name="'.convertNumToDay($day).'" value="+" onclick="">
			</center>';
	}
	
		
	function print_table($weekaffichage,$weekquery,$id,$bdd){
		$codeCandidat = renvoyerCodeCandidatfromCodetilisateur($id,$bdd);
		echo '<table>';
		echo '<tr>';
		foreach($weekaffichage as $key => $value){
			echo '<td><center>'.$value.'</center></td>';
		}
		echo '</tr><tr>';
		foreach($weekquery as $key => $value){
			echo'<td id='.convertNumToDay($key).'>'.afficheColone($codeCandidat,$value,$key,$bdd).'</td>';
			
		}
		echo'</tr>';
		echo'</table>';
	}
	
	?>
