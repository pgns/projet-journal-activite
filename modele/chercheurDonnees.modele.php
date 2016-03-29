<?php
/*Renvoie le nombre de candidats inscrits à l'étude*/
function nombreCandidat($bdd){
	$requete = $bdd->query("SELECT count(*) as  nb FROM candidat");
	$data = $requete->fetch();
	$resultat = $data['nb'];
	$requete->closeCursor();
	return $resultat;
}	

/*Renvoie le nombre d'ocupations*/
function nombreOccupation($bdd){
	$requete = $bdd->query("SELECT count(*) as  nb FROM occupation");
	$data = $requete->fetch();
	$resultat = $data['nb'];
	$requete->closeCursor();
	return $resultat;
}

/*Renvoie le premiier occupation*/
function premierOccupation($bdd){
	$requete = $bdd->query("SELECT min(Heuredebut) as  nb FROM occupation");
	$data = $requete->fetch();
	$resultat = $data['nb'];
	$res = explode(" ", $resultat);
	$requete->closeCursor();
	return $res[0];
}

/*renvoie la dernière occupation*/
function dernierOccupation($bdd){
	$requete = $bdd->query("SELECT max(Heuredebut) as  nb FROM occupation");
	$data = $requete->fetch();
	$resultat = $data['nb'];
	$res = explode(" ", $resultat);
	$requete->closeCursor();
	return $res[0];
}

/*affiche le tableau des occupations*/
function tableDonnees($bdd){
	$res = "<table cellpadding=\"0\" cellspacing=\"0\" class=\"display\" id=\"table\"  width=\"100%\">";
	$res.= "<thead><tr><th>Heure début</th><th>Heure Fin</th><th>Code Activité</th><th>Code Lieu</th><th>Code Compagnie</th><th>Code Dispositif</th><th>Code Candidat</th></tr></thead><tbody>";
	$requete = $bdd->query("SELECT * FROM occupation");
	while ($data = $requete->fetch()){
		$res.= "<tr><td>".$data['HeureDebut']."</td><td>".$data['HeureFin']."</td><td>".$data['CodeActivite']."</td><td>".$data['CodeLieux']."</td><td>".$data['CodeCompagnie']."</td><td>".$data['CodeDispositif']."</td><td>".$data['CodeCandidat']."</td></tr>\n";
	}
	$requete->closeCursor();
	$res.="</tbody></table>";
	return $res;
}

/*générer un fichier txt avec le les codes correspondant aux codes*/
//créer un fichier
// 1 : on ouvre le fichier
require 'activite.modele.php';
require 'lieux.modele.php';
require 'compagnie.modele.php';
require 'dispositif.modele.php';

$fichierLegende = fopen('../file/legende.txt', 'a');
ftruncate($fichierLegende,0);
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
$date = date("Y-m-d H:i");
fputs($fichierLegende,"\nLes codes correspondant aux noms dans la base de données au $date\n");
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
fputs($fichierLegende,"Les codes des activités :\n");
fputs($fichierLegende,listeActivite($bdd));
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
fputs($fichierLegende,"Les codes des lieux :\n");
fputs($fichierLegende,listeLieu($bdd));
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
fputs($fichierLegende,"Les codes des compagnies :\n");
fputs($fichierLegende,listeCompagnie($bdd));
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
fputs($fichierLegende,"Les codes des dispositifs :\n");
fputs($fichierLegende,listeDispositif($bdd));
fputs($fichierLegende,"\n-----------------------------------------------------------------------------\n");
fputs($fichierLegende,"Les codes candidats : ce sont les codes des candidats, leur noms n'est pas communiqué aux chercheurs à cause de la confidentialité, si vous vous rendez compte qu'un candidat rentre des mauvaises données signalez le à l'administrateur qui se chargera de supprimer le candidat.\n");

// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($fichierLegende);



?>