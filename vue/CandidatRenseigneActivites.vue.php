Activité / Lieux / Avec qui / Autre

<br />
<br />Categorie Activité <select>
	<?php
		foreach($liste_categorie_Activites as $id => $object){
			echo'<option id="'.$object->xxxx.'">'.$object->xxxx.'</option>';
		}
	?>
	</select>
<br />Activité : <select>
	<?php
		foreach($liste_Activites as $id => $object){
			echo'<option id="'.$object->CodeActivite.'">'.$object->NomActivite.'</option>';
		}
	?>
</select>
<br />
<br />
<br />Categorie Lieux<select>
	<?php
		foreach($liste_Categorie_Lieux as $id => $object){
			echo'<option id="'.$object->xxx.'">'.$object->xxx.'</option>';
		}
	?>
</select>
<br />Lieux<select>
	<?php
		foreach($liste_Lieux as $id => $object){
			echo'<option id="'.$object->CodeLieux.'">'.$object->NomLieux.'</option>';
		}
	?>
</select>
<br />
<br />
<br />
<br />
<br />
<br />
<button>Submit</button>