$(function() {
	$( ".target" ).change(function() {
		var categorie = $(this).attr('id');
		var codeCategorie = $(this).find("option:selected").attr('id');
		console.log(categorie);
		console.log(codeCategorie);
		$.ajax({
			url: "../fonctions/retourneCategorie.php",
			type : 'POST',
			data : 'categorie=' + categorie + '&codeCategorie=' + codeCategorie,
			dataType : 'html',
			success : function(reponse, statut){
				$( "."+categorie ).html(reponse);
			}
		});
	});
});	