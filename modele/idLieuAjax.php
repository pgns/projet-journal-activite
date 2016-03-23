<?php
/* Ajax pour vérifier si l'id du lieu est déjà pri*/
require '../includes/connection_MYSQL.inc.php';

function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id = test_input($_POST['code']);
if (! empty($id)){
	$requete = $bdd->query("SELECT COUNT(*) AS num FROM lieu WHERE CodeLieux = $id");
	$data = $requete->fetch();
	if ($data['num'] != 0)
		echo "<div class=\"msg_alert\">Cet id n'est pas disponible il est déjà affecté à un lieu</div>";
	$requete->closeCursor();
}
?>