<?php foreach($_POST as $key=>$value){$$key=$value;}
	  foreach($_GET as $key=>$value){$$key=$value;}

	
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

	require_once('../includes/head.inc.php');
	require_once('../vue/candidatActivites.vue.php');			
	require_once('../includes/CandidatSidebar.inc.php');
	require_once('../includes/footer.inc.php');
?>
