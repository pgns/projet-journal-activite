<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
			<a><h1>Le compte de <?php echo nomChercheur($bdd);?></h1></a>
		</center>
		
		<h2>Adresse e-mail : </h2><?php echo mailChercheur($bdd);?> <br/><a href="#" id="changerMail"> Modifier mon e-mail</a>
		<div id="changeMail">
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
			<label>Entrez votre nouveau e-mail:</label>
			<input type="text" name="mail"/>
			<input type="submit" name="mod_mail" value="Modifier"/>
		</form>
		</div>
		<h2>Mot de passe : </h2>
		<a href="#" id="changerMDP">Modifier mon mot de passe</a>
		<div id="changeMDP">
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
			<label>Entrez votre ancien mot de passe:</label>
			<input type="password" name="old_mdp"/>
			<label>Entrez votre nouveau mot de passe:</label>
			<input type="password" name="mdp"/>
			<label>Confirmez votre nouveau mot de passe:</label>
			<input type="password" name="new_mdp"/>
			<input type="submit" name="mod_mdp" value="Modifier"/>
		</form>
		</div>

		<h2> Nom </h2>
		Nom: <?php echo nomChercheur($bdd);?> <br/><a href="#" id="modifierNom">Modifier mon nom</a>
		<div id="modifieNom">
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
			<label>Entrez votre Nom: </label>
			<input type="text" name="nom" required value=""/>
			<label>Entrez votre Prénom:</label>
			<input type="text" name="prenom" required value=""/>
			<input type="submit" name="mod_nom" value="Modifier"/>
		</form>
		</div>
		<h2>Login</h2>
		Login: <?php echo loginChercheur($bdd);?> <br/><a href="#" id="modifierLofin">Modifier mon login</a>
		<div id="modifieLogin">
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
			<label>Entrez votre nouveau login: </label>
			<input type="text" name="login" required value=""/>
			<input type="submit" name="mod_login" value="Modifier"/>
		</form>
		</div>
		<h2>Suppression du compte</h2>
		<a href="#">Supprimer mon compte</a>
	</div>
</div>
