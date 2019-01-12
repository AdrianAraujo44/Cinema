<?php 
	include "conexao.php";
	$filme = $_POST['palavra'];

	$filme ="select * from filme where nome_filme like '%$filme%'";
	$result = mysqli_query($con, $filme);

	if(mysqli_num_rows($result)<=0){
		echo "Nenhum dado Encontrado";
	}else{
		echo"<li>curso Encontrado</li>";
	}
?>