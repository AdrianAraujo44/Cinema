<?php
    include_once "conexao.php";
	$genero = $_POST['genero'];

    $sql = "insert into genero(id_genero,nome_genero) values (null,'$genero')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas != 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                echo " Erro ao cadastrar!";
            
            }
?>