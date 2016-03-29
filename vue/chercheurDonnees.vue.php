<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Les Données</h1></a>
		</center>
			Il y a <?php echo nombreCandidat($bdd);?> candidats inscrit à l'étude qui ont renseigné un total de <?php echo nombreOccupation($bdd);?> occupations sur la période allant du <?php echo premierOccupation($bdd);?> au <?php echo dernierOccupation($bdd);?>.<br/>
			<a href="#" id="afficheLegende">Afficher les noms correspondant aux codes</a> 
			<div id="legende">
			<a href="../file/telechargerLegende.php" target="_blank">Télécharger les noms correspondant au codes</a>
			<h2>Les codes des activités :</h2> 
			<?php echo tableauActivite($bdd); ?>
			<h2>Les codes des lieux :</h2> 
			<?php echo tableauLieu($bdd); ?>
			<h2>Les codes des compagnies :</h2>
			<?php echo tableauCompagnie($bdd); ?>
			<h2>Les codes des dispositifs :</h2> 
			<?php echo tableauDispositif($bdd); ?>
			<h2>Les codes candidats : </h2>ce sont les codes des candidats, leur noms n'est pas communiqué aux chercheurs à cause de la confidentialité, si vous vous rendez compte qu'un candidat rentre des mauvaises données signalez le à l'administrateur qui se chargera de supprimer le candidat.  
			</div>
			
			<h2>Apperçu des données:</h2>
			
			<a href="../file/telechargerDonnees.php" target="_blank">Téléchargement des données</a>
			<?php echo tableDonnees($bdd); ?>
	</div>
</div>