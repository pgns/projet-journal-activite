<?php
	session_start();
	
	
	///// A ENLEVER !!!! PAS SECURE ////
	try	{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root');
	}catch(Exception $e){
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'GNS','gns');
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../assets/css/modale.css" />
		<link rel="stylesheet" href="../assets/css/occupation.css" />
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../js/candidat.activite.js" type="text/javascript"></script>
		<script src="../js/modale.js" type="text/javascript"></script>
		</head>
	<body>
		
