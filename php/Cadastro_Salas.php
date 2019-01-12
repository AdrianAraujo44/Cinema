<?php
    include_once "conexao.php";
	$sala = $_POST['sala'];

    $sql = "insert into sala(id_sala,nome_sala) values (null,'$sala')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas != 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                echo " Erro ao cadastrar!";
            
            }
?>