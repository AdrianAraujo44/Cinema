<?php
	include_once "conexao.php";
	$id = $_GET['id'];

	$genero = $_POST['genero'];
	$sql = "update genero set nome_genero='". $genero."'where Id_genero='".$id."'";
	mysqli_query($con,$sql);	
	header('location:../home.php');
	
?>