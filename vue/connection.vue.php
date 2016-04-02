	<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<?php 
			if (isset($msg))
				echo "<div class=\"msg_alert\">".$msg."</div>"; 
				
			?>
			<h1>Connexion :</h1>

			<form action="connection.ctrl.php" method="post">
				<p>
					Nom d'utilisateur : <input type="text" id="username" name="username" />
					Mot de passe : <input type="password" id="password" name="password" /><br>
					<input type="submit" id="submit" value="Se connecter !" />
				</p>
				<p><?php echo $reponse;?></p>
			</form>
			
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			Pas encore inscrit?<br/>
			<a class="js-scrollTo" href="#inscription"><button>Je m'inscrit !</button></a>
		</center>
		Bienvenu sur cet étude!<br/>
		Le but de cet étude est de bla bla...<br/>
		Grace à vous la science progresse bla bla...<br/>
		
		<!-- A mettre dans le css-->
		<div style="margin-bottom:700px;"></div>
		
		<form id="inscription" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
			<label>Entrez votre e-mail:</label>
			<input type="text" name="mail" required/>
			<label>Entrez un login: </label>
			<input type="text" name="login" required/>
			<label>Entrez un mot de passe:</label>
			<input type="password" name="mdp" required/>
			<label>Confirmez le mot de passe:</label>
			<input type="password" name="new_mdp" required/>
			<label>Entrez votre age:</label>
			<input type="number" name="age" value="20" required/><br/>
			<label>Sélectionnez le niveau d'étude:</label>
			<select name="niv">
				<option value="Bac +1">Bac +1</option>
				<option value="Bac +2">Bac +2</option>
				<option value="Bac +3">Bac +3</option>
				<option value="Bac +4">Bac +4</option>
				<option value="Bac +5">Bac +5</option>
				<option value="Bac +6">Bac +6</option>
				<option value="Bac +7">Bac +7</option>
				<option value="Bac +8">Bac +8</option>
			</select>
			<label>Sélectionnez le diplôme que vous êtes en train de préparer:</label>
			<select name="dip">
				<option value="Licence">Licence</option>
				<option value="Master">Master</option>
				<option value="Doctorat">Doctorat</option>
				<option value="BTS">BTS</option>
				<option value="DUT">DUT</option>
				<option value="Diplôme d'ingénieur">Diplôme d'ingénieur</option>
				<option value="Diplôme médical et paramédical">Diplôme médical et paramédical</option>
				<option value="Autre diplôme">Autre diplôme </option>
			</select>
			<label>Sélectionnez votre genre:</label>
			<input type="radio" name="gender" value="femme" checked> Femme
			<input type="radio" name="gender" value="homme"> Homme <br/>
			<label>Sélectionnez votre état civil:</label>
			<select name="civ">
				<option value="Marié(e)">Marié(e)</option>
				<option value="Pacsé(e)">Pacsé(e)</option>
				<option value="Non marié(e) avec partenaire stable">Non marié(e) avec partenaire stable</option>
				<option value="Non marié(e) sans partenaire stable" selected>Non marié(e) sans partenaire stable</option>
				<option value="Veuve, veuf">Veuve, veuf</option>
				<option value="Divorcé">Divorcé</option>
			</select>
			<label>Entrez le nombre d'enfants:</label>
			<input type="number" name="nb" required value="0"/><br/>
			<label>Entrez votre lieu d'étude:</label>
			<input type="text" name="lieu" required/>
			<script src="https://www.google.com/recaptcha/api.js?hl=fr" async defer></script>
			<div class="g-recaptcha" data-sitekey="6LdZQBwTAAAAAB-8bWB8OUnzzn2Gdz-Spao2DJ2T"></div><br/>
			<input type="submit" name="inscription" value="Inscription"/>
		</form>
	</div>
	
	<script>
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 550; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		});
	});
	</script>
	
	
</div>
