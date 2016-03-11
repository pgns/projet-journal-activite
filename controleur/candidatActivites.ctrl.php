<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	$SemaineCourante = date("W");
	if(isset($_POST['semaine']))
		$Semaine = $_POST['semaine'];
	else
	$Semaine=null;	
	
	function SemaineCourante ($SemaineCourante,$Semaine) {
		if ($Semaine == NULL)
			return $SemaineCourante ;
		else
			return $Semaine ;
	}

	$Week = SemaineCourante ((date("W")), $Semaine) ;
	
	
	function convertNumToDay($j){
		switch ($j) {
			case 0 : $text = "Lundi" ;		break;
			case 1 : $text = "Mardi" ;		break;
			case 2 : $text = "Mercredi" ;	break;
			case 3 : $text = "Jeudi" ;		break;
			case 4 : $text = "Vendredi" ;	break;
			case 5 : $text = "Samedi" ;		break;
			case 6 : $text = "Dimanche" ;	break;
			default: $text = "Lundi" ;		break;
		}
	return $text;
}	
	
	function print_current_date () {
		$j = date ("w") ;
		switch ($j) {
			case 1 : $text = "Lundi" ;		break;
			case 2 : $text = "Mardi" ;		break;
			case 3 : $text = "Mercredi" ;	break;
			case 4 : $text = "Jeudi" ;		break;
			case 5 : $text = "Vendredi" ;	break;
			case 6 : $text = "Samedi" ;		break;
			case 7 : $text = "Dimanche" ;	break;
			default: $text = "Lundi" ;		break;
		}
		$text = $text.' '.date("d") ;
		$m = date ("m") ;
		switch ($m) {
			case 1 : $text = $text.' Janvier' ;		break;
			case 2 : $text = $text.' Février' ;		break;
			case 3 : $text = $text.' Mars' ;		break;
			case 4 : $text = $text.' Avril' ;		break;
			case 5 : $text = $text.' Mai' ;			break;
			case 6 : $text = $text.' Juin' ;		break;
			case 7 : $text = $text.' Juillet' ;		break;
			case 8 : $text = $text.' Août' ;		break;
			case 9 : $text = $text.' Septembre' ;	break;
			case 10 : $text = $text.' Octobre' ;	break;
			case 11 : $text = $text.' Novembre' ;	break;
			case 12 : $text = $text.' Décembre' ;	break;
			default : $text = 'aaaaaarg';			break;
		}
		echo $text.' '.date ("Y") ;
	}
	
	function get_date_lundi_to_Sunday_from_week ($week,$year,$format="d/m/Y") {
		$firstDayInYear = date ("N",mktime(0,0,0,1,1,$year)) ;
		if ($firstDayInYear < 5)
			$shift =- ($firstDayInYear-1) * 86400 ;
		else
			$shift = (8-$firstDayInYear) * 86400 ;
		if ($week>1)
			$weekInSeconds = ($week-1) * 604800 ;
		else 
			$weekInSeconds=0 ;
		$timestamp_lundi = mktime (0,0,0,1,1,$year) + $weekInSeconds + $shift ;
		$timestamp_mardi = mktime (0,0,0,1,2,$year) + $weekInSeconds + $shift ;
		$timestamp_mercredi = mktime (0,0,0,1,3,$year) + $weekInSeconds + $shift ;
		$timestamp_jeudi = mktime (0,0,0,1,4,$year) + $weekInSeconds + $shift ;
		$timestamp_vendredi = mktime (0,0,0,1,5,$year) + $weekInSeconds + $shift ;
		$timestamp_samedi = mktime (0,0,0,1,6,$year) + $weekInSeconds + $shift ;
		$timestamp_dimanche = mktime (0,0,0,1,7,$year) + $weekInSeconds + $shift ;

		return array ("Lundi " . date($format,$timestamp_lundi),
					"Mardi " . date($format,$timestamp_mardi),
					"Mercredi " . date($format,$timestamp_mercredi),
					"Jeudi " . date($format,$timestamp_jeudi),
					"Vendredi " . date($format,$timestamp_vendredi),
					"Samedi " . date($format,$timestamp_samedi),
					"Dimanche ".date($format,$timestamp_dimanche)		
		) ;
	}
	
	function ConvertNumSemaineToDate($W,$Y)
	{
		$debut_fin_semaine = get_date_lundi_to_Sunday_from_week($W,$Y);
		return "Semaine du ".$debut_fin_semaine[0] . " au " . $debut_fin_semaine [6];
	}

	function genererChoixSemaine($W,$Y)
	{
		echo'<center><form action="candidatActivites.ctrl.php" method="POST">
		<fieldset>
		<SELECT name="semaine">';
		for($i=1;$i<=52;$i++)
		{
			if($i==$W)
			{
				echo'<OPTION value="'.$i.'" selected><center>'.ConvertNumSemaineToDate($i,$Y).'</center></OPTION>';
			}
			else
				echo'<OPTION value="'.$i.'" ><center>'.ConvertNumSemaineToDate($i,$Y).'</center></OPTION>';
		}
		echo'</SELECT>
		</fieldset>
		<input type="Submit" nom="Valider" value="Afficher">
		</form></center>';
	}

	
	
	function print_table($week){
		echo '<table style="width:100%">';
		echo '<tr>';
		foreach($week as $key => $value){
			echo '<td><center>'.$value.'</center></td>';
		}
		echo '</tr><tr>';
		foreach($week as $key => $value){
			echo'<td id='.convertNumToDay($key).'><input type="button" name="'.convertNumToDay($key).'" value="ajouter activitée" onclick=""></td>';
		}
		echo'</tr>';
		echo'</table>';
	}
	
	
	$currentWeek = get_date_lundi_to_Sunday_from_week($Week,date("Y"));

	require_once('../includes/head.candidat.php');
	require_once('../vue/candidatActivites.vue.php');			
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
