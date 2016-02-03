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

<div id="sidebar">


		<h1 id="logo"><a href="index.html">Journal d'activité</a></h1>

		<nav id="nav">
			<ul>
				<li class="current"><a href="index.html">Accueil</a></li>
				<li><a href="#">Présentation du LSE</a></li>
				<li><a href="#">Présentation de l'enquête</a></li>
				<li><a href="#">Mentions légales</a></li>
			</ul>
		</nav>

		<ul id="copyright">
			<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
		</ul>
</div>
