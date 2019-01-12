<?php
	$nome_produto = $_GET['nome_produto'];
	session_start();
	 $_SESSION['nome_produto'] = $nome_produto ; 
?>