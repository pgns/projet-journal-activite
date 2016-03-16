<!-- Content -->
<div id="content">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	 $("#categorieModifierActivite").change(function(){
		$("#modif_cat").html("<input type=\"hidden\" name=\"id\" value=\""+$(this).val()+"\"><label>Nom de la catégorie:</label><input type=\"text\" value=\""+$("#categorieModifierActivite option:selected").text()+"\" name=\"nom_categorie\" required>");
     });
	
	
	
    $("#modLieu").click(function(event){
		event.preventDefault();
        $("#modifLieu").slideToggle();
		$("#modifDisp").hide();
		$("#modifAct").hide();
		$("#modifCat").hide();
    });
	
	$("#modDisp").click(function(event){
		event.preventDefault();
        $("#modifLieu").hide();
		$("#modifDisp").slideToggle();
		$("#modifAct").hide();
		$("#modifCat").hide();
    });
	
	$("#modAct").click(function(event){
		event.preventDefault();
        $("#modifLieu").hide();
		$("#modifDisp").hide();
		$("#modifAct").slideToggle();
		$("#modifCat").hide();
    });

	$("#modCat").click(function(event){
		event.preventDefault();
        $("#modifLieu").hide();
		$("#modifDisp").hide();
		$("#modifAct").hide();
		$("#modifCat").slideToggle();
    });
	
	$("#afficherCat").click(function(event){
		event.preventDefault();
		$("#afficheCat").slideToggle();
    });
	
	$("#afficherAct").click(function(event){
		event.preventDefault();
		$("#afficheAct").slideToggle();
    });
	
	$("#afficherLieu").click(function(event){
		event.preventDefault();
		$("#afficheLieu").slideToggle();
    });
	
	$("#afficherDisp").click(function(event){
		event.preventDefault();
		$("#afficheDisp").slideToggle();
    })
	
	$("#modiferLieu").change(function(){
		var str = "<label>Renomez le lieu: </label><input type=\"text\" value=\"";
		$("#modiferLieu option:selected").each(function() {
			str += $(this).text() + "\"required ><br/><label>Modifiez le code du lieu: </label><input id=\"modifierCodeLieu\" type=\"number\" min=\"0\" value=\""+$(this).val()+"\">";
			var idModifLieu = $(this).val();
		});
		$("#modifierLeLieu").html(str);
	});
	

	$(".allAfficheListe").hide();
	$(".allModdifListe").hide();
	
	$("#modifierCodeLieu").bind('keyup click',function(){
		console.log(idModifLieu);
		console.log("sss");
		$.ajax({
		   url : 'more_com.php',
		   type : 'POST',
		   data : 'code=' + email,
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
		   }
		});
	});
	
	
	$("#ajoutCodeLieu").bind('keyup click',function(){
		//console.log(idModifLieu);
		console.log("sss");
		$.ajax({
		   url : 'more_com.php',
		   type : 'POST',
		   data : 'code=' + email,
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
		   }
		});
	});
	
	
});

</script>
	<div class="inner">
	<?php
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$msg ="";
		if (! empty($_POST)){
			var_dump($_POST);
			if (isset($_POST['add_categorie'])){
				if (empty($_POST['nom_categorie'])){
					$msg = "<div class=\"msg_alert\">Le nom de la catégorie doit etre rempli!</div>";
				}
				else{
					$nom_categorie = test_input($_POST['nom_categorie']);
					/*--- On insère la catégorie dans la bdd*/
					$req = $bdd->prepare("INSERT INTO categorieactivite (NomCategorie) VALUES (:NomCategorie)");
					$req->execute(array(
						'NomCategorie' => $nom_categorie
					));
					$msg = "<div class=\"msg_confirm\">La catégorie '$nom_categorie' a bien été rajouté!</div>";
					
				}
			}
			elseif(isset($_POST['sup_categorie'])){
				if (empty($_POST['code_categorie'])){
					$msg = "<div class=\"msg_alert\">Il faut sélectionner une catégorie!</div>";
				}
				else{	
					$num_categorie = test_input($_POST['code_categorie']);
					/*--- On véréfie si il y a des activités affecté à cette catégorie---*/
					$requete = $bdd->query("SELECT COUNT(*) AS num FROM activite WHERE CodeCategorie = $num_categorie");
					$data = $requete->fetch();
					if($data['num']!= 0){
						$requete = $bdd->query("SELECT * FROM activite WHERE CodeCategorie = $num_categorie");
						if($data['num']== 1)
							$msg ="<div class=\"msg_alert\">Impossible de supprimer la catégorie l'activités suivante est affectée à la catégorie: ";
						else
							$msg ="<div class=\"msg_alert\">Impossible de supprimer la catégorie les activités suivantes sont affectées à la catégorie: ";
						while ($data = $requete->fetch()){
							$msg.="<br/>".$data['CodeActivite']."  ".$data['NomActivite'];
						}
						$msg.="<br/>Veuillez affecter les activités à une autre catégorie.</div>";
					}
					else {
						$req = $bdd->prepare("DELETE FROM categorieactivite WHERE CodeCategorieActivite = :CodeCategorieActivite");
						$req->execute(array(
							'CodeCategorieActivite' => $num_categorie,
						));
						$msg = "<div class=\"msg_confirm\">La catégorie a bien été supprimé</div>";
					}
				}
			}
			elseif(isset($_POST['mod_categorie'])){
				if (empty($_POST['nom_categorie'])){
					$msg = "<div class=\"msg_alert\">Il faut donner un nom à la catégorie!</div>";
				}
				elseif($_POST['id'] == -1){
					$msg = "<div class=\"msg_alert\">Il faut sélectionner une catégorie!</div>";
				}
				else{
					$nom_categorie = test_input($_POST['nom_categorie']);
					$id = test_input($_POST['id']);
					$req = $bdd->prepare('UPDATE categorieactivite SET NomCategorie = :NomCategorie WHERE CodeCategorieActivite = :CodeCategorieActivite');
					$req->execute(array(
						'NomCategorie' => $nom_categorie,
						'CodeCategorieActivite' => $id
					));
					$msg = "<div class=\"msg_confirm\">La catégorie a bien été modifiée!</div>";
				}
			}
		}
		echo $msg;
	}
	?>
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Modifier les tables</h1></a>
		</center>
		<h2>La liste des catégories d'activités</h2>
		<a href="#" id="afficherCat">Afficher la liste des catégories d'activités</a><br/>
		<section class="allAfficheListe" id ="afficheCat">
			<?php echo tableauCategorie($bdd);?>
		</section>
		<a href="#" id="modCat">Modifier la liste des catégories d'activités</a><br/>
		<section id="modifCat" class="allModdifListe">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Ajouter une catégorie d'activité:</legend>
						<label>Nom de la catégorie: </label>
						<input type="text" name="nom_categorie" required/>
						<input type="submit" name="add_categorie" value="Ajouter">
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Modifier une catégorie d'activité:</legend>
						<label>Sélectionez une catégorie d'activité: </label>
						<?php echo selectCategorieVide($bdd,"categorieModifierActivite","id_ancien");?>
						<div id="modif_cat">
						</div>
						<input type="submit" name="mod_categorie" value="Modifier"><br/>
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Supprimer une catégorie d'activité:</legend>
						<label>Sélectionez une catégorie d'activité:  </label>
						<?php echo selectCategorie($bdd,"categorieActivite","code_categorie");?>
						<input type="submit" name="sup_categorie" value="Supprimer">
				</fieldset>		
			</form>
		</section>
		<h2>La liste des activités</h2>
		<a href="#" id="afficherAct">Afficher la liste des activités</a><br/>
		<section class="allAfficheListe" id ="afficheAct">
			<?php echo tableauActivite($bdd); ?>
		</section>
		<a href="#" id="modAct">Modifier la liste des activités</a><br/>
		<section id="modifAct" class="allModdifListe">
			<form>
				<fieldset>
					<legend>Ajouter une activité:</legend>
						<label>Nom d l'activité: </label>
						<input type="text"/>
						<label>ID de l'activité:</label>
						<input type="number"/><br/>
						<label>Sélectionez une catégorie pour l'activité: </label>
						<?php echo selectCategorie($bdd,"categorieActivite","name");?>
						<input type="submit" value="Ajouter">
				</fieldset>
				<fieldset>
					<legend>Modifier une activité:</legend>
						<label>Sélectionez une activité: </label>
						<?php echo selectActivite($bdd,"idmodi","name");?>
						<input type="submit" value="Modifier"><br/>
				</fieldset>
				<fieldset>
					<legend>Supprimer une activité:</legend>
						<label>Sélectionez une activité:  </label>
						<?php echo selectActivite($bdd,"idmod","name");?>
						<input type="submit" value="Supprimer">
				</fieldset>		
			</form>
		</section>
		
		<h2>La liste des dispositifs</h2>
		<a href="#" id="afficherDisp">Afficher la liste des dispositifs</a><br/>
		<section class="allAfficheListe" id ="afficheDisp">
			<?php echo tableauDispositif($bdd)?>
		</section>
		<a href="#" id="modDisp">Modifier la liste des dispositifs</a><br/>
		<section id="modifDisp" class="allModdifListe">
			<form>
				<fieldset>
					<legend>Ajouter un dispositif:</legend>
						<label>Nom du dispositif: </label>
						<input type="text"/>
						<label>ID du dispositif:</label>
						<input type="number"/><br/>
						<input type="submit" value="Ajouter">
				</fieldset>
				<fieldset>
					<legend>Modifier un dispositif:</legend>
						<label>Sélectionez un dispositif: </label>
						<?php echo selectDispositif($bdd,"iddisp","name");?>
						<input type="submit" value="Modifier"><br/>
				</fieldset>
				<fieldset>
					<legend>Supprimer un dispositif:</legend>
						<label>Sélectionez un dispositif:  </label>
						<?php echo selectDispositif($bdd,"iddisp2","name");?>
						<input type="submit" value="Supprimer">
				</fieldset>		
			</form>
		</section>
		<h2>La liste des lieux et des transports</h2>
		<a href="#" id="afficherLieu">Afficher la liste des lieux et des transports</a><br/>
		<section id="afficheLieu" class="allAfficheListe">
			<?php echo tableauLieu($bdd)?>
		</section>
		<a href="#" id="modLieu">Modifier la liste des lieux et des transports</a><br/>
		<section id="modifLieu" class="allModdifListe">
			<form>
				<fieldset>
					<legend>Ajouter un lieu & transport:</legend>
						<label>Nom du lieu: </label>
						<input type="text"/>
						<label>ID du lieu:</label>
						<input type="number" id="ajoutCodeLieu"/><br/>
						<input type="submit" value="Ajouter">
				</fieldset>
				<fieldset>
					<legend>Modifier un lieu & transport:</legend>
						<label>Sélectionez un lieu: </label>
						<?php echo selectLieu($bdd,"modiferLieu","listeLieu");?>
						<div id="modifierLeLieu"></div>
						<input type="submit" value="Modifier"><br/>
				</fieldset>
				<fieldset>
					<legend>Supprimer un lieu & transport:</legend>
						<label>Sélectionez un lieu:  </label>
						<?php echo selectLieu($bdd,"supprLieu","listeLieu");?>
						<input type="submit" value="Supprimer">
				</fieldset>		
			</form>
		</section>
	</div>
</div>