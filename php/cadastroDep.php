<?php
    include_once "conexao.php";
	$departamento = $_POST['departamento'];

    $sql = "insert into departamento(id_dep,nome_dep) values (null,'$departamento')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas != 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                echo " Erro ao cadastrar!";
            
            }
?>