<?php
	session_start();
	session_destroy();
	header('Location: connection.ctrl.php');
	exit();
?>