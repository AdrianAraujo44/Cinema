<?php
	include_once "conexao.php";
	$id = $_GET['id_dep'];

	$departamento = $_POST['departamento'];
	$sql = "update departamento set nome_dep='". $departamento."'where Id_dep='".$id."'";
	mysqli_query($con,$sql);	
	header('location:../home.php');	
	
?>