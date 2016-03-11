<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Mes activités</h1></a>
			<?PHP 
				print_current_date();
				var_dump( get_date_lundi_to_Sunday_from_week(date("W"),date("Y")));
			?>
		</center>
	</div>
</div>
