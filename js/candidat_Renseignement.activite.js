$(function() {
	$( ".RA_target" ).change(function() {
		// alert();
		var categorie = $(this).attr('id');
		var codeCategorie = $(this).find("option:selected").attr('id');
		console.log("cat : "+categorie);
		console.log("cde : "+codeCategorie);
		if(categorie == "new_event_categorieActivite"){targetCategorie = "RA_activ"; cat = "activite";}
		// if(categorie == ""){targetCategorie = "new_event_activite"; cat = "activite";}
		$.ajax({
			url: "../fonctions/retourneCategorie.php",
			type : 'POST',
			data : 'categorie=' + cat + '&codeCategorie=' + codeCategorie,
			dataType : 'html',
			success : function(reponse, statut){
				$( "."+targetCategorie ).html(reponse);
			}
		});
	});
	//CodeOccupation,HeureDebut,HeureFin,CodeCandidat,CodeLieux,CodeActivite,CodeCompagnie,CodeDispositif
	// $( "#EnvoieOccupationCandidat" ).click(function() {
		// var HeureDebut = $( "#HeureDebut" ).val();
		// var HeureFin = $( "#HeureFin" ).val();
		// var CodeCandidat = $( "#CodeCandidat" ).val();
		// var CodeLieux = $( "#CodeLieux" ).find("option:selected").attr('id');
		// var CodeActivite = $( "#CodeActivite" ).find("option:selected").attr('id');
		// var CodeCompagnie = $( "#CodeCompagnie" ).find("option:selected").attr('id');
		// var CodeDispositif = $( "#CodeDispositif" ).find("option:selected").attr('id');
		// console.log(HeureDebut);
		// console.log(HeureFin);
		// console.log(CodeCandidat);
		// console.log("cl "+CodeLieux);
		// console.log("ca "+CodeActivite);
		// console.log("cc "+CodeCompagnie);
		// console.log("cd "+CodeDispositif);
		
		// $.ajax({
			// url: "../controleur/CandidatRenseigneActivites.ctrl.php",
			// type : 'POST',
			// data : 'HeureDebut=' + HeureDebut + '&HeureFin=' + HeureFin  + '&CodeCandidat=' + CodeCandidat  + '&CodeLieux=' + CodeLieux  + '&CodeActivite=' + CodeActivite  + '&CodeCompagnie=' + CodeCompagnie  + '&CodeDispositif=' + CodeDispositif,
			// dataType : 'html',
			// success : function(statut){
				// console.log("copy");
				// $.fancybox.close
			// }
		// });
	// });
});	