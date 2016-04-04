<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Mes activités</h1></a>
			<center>
				<?PHP 
					genererChoixSemaine($Week,date("Y"));
				?>
				<div id="table">
				<?php
					print_table($currentWeek,$queryWeek,$_SESSION['id'],$bdd);		
				
					/*var_dump(RenvoyerCodeCandidatfromCodetilisateur($_SESSION['id'],$bdd));
					$occup = renvoyerToutesOccupationDunCandidatALaDate(1,'2016-03-14',$bdd);
					afficherOccupations($occup,$bdd);*/
				?>
				</div>
			</center>
			<!--<div id="modal" class="popup"></div>-->
		</center>
	</div>
</div>
