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
$id_old = test_input($_POST['old_code']);
if (! empty($id) && ! empty($id_old)){
	$requete = $bdd->query("SELECT COUNT(*) AS num FROM lieu WHERE CodeLieux = $id");
	$data = $requete->fetch();
	if ($data['num'] != 0 && $id != $id_old)
		echo "<div class=\"msg_alert\">Cet id n'est pas disponible il est déjà affecté à un autre lieu</div>";
	$requete->closeCursor();
}
?>