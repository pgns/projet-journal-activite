<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	$SemaineCourante = date("W");
	if(isset($_POST['semaine']))
		$Semaine = $_POST['semaine'];
	else
	$Semaine=null;	
	require_once('../includes/fonctions.date.php');
	
	$Week = SemaineCourante ((date("W")), $Semaine) ;
	$currentWeek = get_date_lundi_to_Sunday_from_week($Week,date("Y"));

	function renvoyerCodeCandidatfromCodetilisateur($id,$bdd){
		$sql = 'SELECT CodeCandidat FROM candidat WHERE ID="'.$id.'"';
		$res = $bdd->query($sql);
		$data = $res->fetch();
		return $data['CodeCandidat'];	
	}
	
	function renvoyerToutesOccupationDunCandidatALaDate($codeCandidat,$date,$bdd){
		$sql = 'SELECT * FROM occupation WHERE CodeCandidat="'.$codeCandidat.'" AND HeureDebut LIKE "'.$date.'%"';
		$res = $bdd->query($sql);
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
	
	function afficherOccupations($table,$bdd){
		echo'<table>';
		foreach($table as $occupation){
			echo'<tr><td>';
			echo convertDateTimeToHours($occupation['HeureDebut']).'-';	
			echo convertDateTimeToHours($occupation['HeureFin']).'<br>';	
			echo convertCodeToNomActivite($occupation['CodeActivite'],$bdd);	
			echo'</tr></td>';	
		}
		echo'</table>';
	}

	require_once('../includes/head.candidat.php');
	require_once('../vue/candidatActivites.vue.php');			
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
