<!-- Content -->
<div id="content">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	 $("#categorieModifierActivite").change(function(){
		$("#modif_cat").html("<input type=\"hidden\" name=\"id\" value=\""+$(this).val()+"\"><label>Nom de la catégorie:</label><input type=\"text\" value=\""+$("#categorieModifierActivite option:selected").text()+"\" name=\"nom_categorie\" required>");
     });
	
	$("#modifierDispostif").change(function(){
		$("#mod_disp").html("<label>ID du dispositif:</label><input type=\"number\" name=\"id\" value=\""+$(this).val()+"\"><br/><label>Nom du dispositif:</label><input type=\"text\" value=\""+$("#modifierDispostif option:selected").text()+"\" name=\"nom_dispositif\" required>");
     });
	 
	 $("#modifierLieu").change(function(){
		$("#mod_lieu").html("<label>ID du lieu:</label><input type=\"number\" name=\"id\" value=\""+$(this).val()+"\"><br/><label>Nom du lieu:</label><input type=\"text\" value=\""+$("#modifierLieu option:selected").text()+"\" name=\"nom_lieu\" required>");
     });
	
	$("#modifierActivite").change(function(){
		console.log("sss");
		$.ajax({
		   url : '../modele/modifier_activite.php',
		   type : 'POST',
		   data : 'code=' + $(this).val() + '&nom='+$("#modifierActivite option:selected").text(),
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
			$("#mod_act").html(code_html);
		   }
		});
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
	

	

	$(".allAfficheListe").hide();
	$(".allModdifListe").hide();
	
	
	/*A modifier dans le js au dessus*/
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
		console.log();
		$.ajax({
		   url : '../modele/idLieuAjax.php',
		   type : 'POST',
		   data : 'code=' + $('#ajoutCodeLieu').val(),
		   dataType : 'html', // On désire recevoir du HTML
		   success : function(code_html, statut){ // code_html contient le HTML renvoyé
				$("#idLieuAjax").html(code_html);
		   }
		});
	});
	
	
});

</script>
	<div class="inner">
	<?php include("../modele/chercheurTables.modele.php"); ?>
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
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Ajouter une activité:</legend>
						<label>Nom d l'activité: </label>
						<input type="text" name="nom_activite"/>
						<label>ID de l'activité:</label>
						<input type="number" name="id"/><br/>
						<label>Sélectionez une catégorie pour l'activité: </label>
						<?php echo selectCategorie($bdd,"categorieActivite","cat_activite");?>
						<label>Description de l'activité</label>
						<textarea name="desc"></textarea>
						<input type="submit" name="add_activite" value="Ajouter">
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Modifier une activité:</legend>
						<label>Sélectionez une activité: </label>
						<?php echo selectActiviteModif($bdd,"modifierActivite","id_old");?>
						<div id="mod_act"></div>
						<input type="submit" name="mod_activite" value="Modifier"><br/>
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Supprimer une activité:</legend>
						<label>Sélectionez une activité:  </label>
						<?php echo selectActivite($bdd,"idmod","id");?>
						<input type="submit" name="sup_activite" value="Supprimer">
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
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Ajouter un dispositif:</legend>
						<label>Nom du dispositif: </label>
						<input type="text" name="nom_dispositif" required/>
						<label>ID du dispositif:</label>
						<input type="number" name="id"  required/><br/>
						<input type="submit" name="add_dispositif" value="Ajouter">
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Modifier un dispositif:</legend>
						<label>Sélectionez un dispositif: </label>
						<?php echo selectDispositif($bdd,"modifierDispostif","id_old");?>
						<div id="mod_disp"></div>
						<input type="submit" name="mod_dispositif" value="Modifier"><br/>
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Supprimer un dispositif:</legend>
						<label>Sélectionez un dispositif:  </label>
						<?php echo selectDispositif($bdd,"iddisp2","id");?>
						<input type="submit" name="sup_dispositif" value="Supprimer">
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
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Ajouter un lieu & transport:</legend>
						<label>Nom du lieu: </label>
						<input type="text" name="nom_lieu"/>
						<label>ID du lieu:</label>
						<div id="idLieuAjax"></div>
						<input type="number" id="ajoutCodeLieu" name="id_lieu"/><br/>
						<label>Catégorie du lieu:</label>
						<select name="cat">
							<option value="1">Lieu</option>
							<option value="2">Transport</option>
						</select>
						<input type="submit" name="add_lieu" value="Ajouter">
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Modifier un lieu & transport:</legend>
						<label>Sélectionez un lieu: </label>
						<?php echo selectLieuVide($bdd,"modifierLieu","id_old");?>
						<div id="mod_lieu"></div>
						<input type="submit" name="mod_lieu" value="Modifier"><br/>
				</fieldset>
			</form>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
				<fieldset>
					<legend>Supprimer un lieu & transport:</legend>
						<label>Sélectionez un lieu:  </label>
						<?php echo selectLieu($bdd,"supprLieu","id");?>
						<input type="submit" name="sup_lieu" value="Supprimer">
				</fieldset>		
			</form>
		</section>
	</div>
</div>