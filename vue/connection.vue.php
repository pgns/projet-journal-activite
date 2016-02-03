	<!-- Content -->
<div id="content">
	<div class="inner">
		<!--
		Insert content here			
		-->		
		<center>
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
		</center>
	</div>
</div>
