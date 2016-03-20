<html>
<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/modale.css" />
		<link rel="stylesheet" href="../assets/css/occupation.css" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/candidat_Renseignement.activite.js" type="text/javascript"></script>
</head>
<body>
<br />
<br />Categorie Activité <select class="target" id="activite">
	<?php
		foreach($liste_CategorieActivite as $id => $object){
			echo'<option id="'.$object->CodeCategorieActivite.'">'.$object->NomCategorie.'</option>';
		}
	?>
	</select>
<br />Activité : <select class="activite">
	<option> - - - - - </option>
</select>
<br />
<br />
<br />Categorie Lieux<select class="target" id="lieu">
	<?php
		foreach($liste_CategorieLieu as $id => $object){
			echo'<option id="'.$object->CodeCategorieLieux.'">'.$object->NomCategorie.'</option>';
		}
	?>
</select>
<br />Lieux<select class="lieu">
	<option> - - - - - </option>
</select>
<br />
<br />
<br />
<br />
<br />
<br />
<button>Submit</button>
</body>
</html>