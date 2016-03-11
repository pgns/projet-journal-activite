<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Mes activités</h1></a>
			<?PHP 
				genererChoixSemaine($Week,date("Y"));
			?>
			<div id="table">
			<?php
				print_table($currentWeek);		
			?>
			</div>
		</center>
	</div>
</div>
