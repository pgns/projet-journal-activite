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
    });
	
	$(".ss_cat").click(function(event){
		event.preventDefault();
		$(this).next().slideToggle();
	});
	
	$(".ss_cat").next().hide();
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
	
	// next() jquery sibling
});