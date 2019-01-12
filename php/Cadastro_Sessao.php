<?php
    include_once "conexao.php";
	$nome_filme = $_POST['Nome_Filme'];
    $sala       = $_POST['Sala'];
    $hora       = $_POST['Hora'];
    $formato    = $_POST['Formato'];
    $preco      = $_POST['preco'];

    $sql = "insert into sessao(id_sessao,nome_filme,sala,preco,horario,dimensao) values (null,'$nome_filme','$sala','$preco','$hora','$formato')";
	$res = mysqli_query($con, $sql);
            $linhas = mysqli_affected_rows($con);

            if($linhas != 0){
                echo "Cadastrado com sucesso!";
                header('location:../home.php');
            }else{
                echo " Erro ao cadastrar!";
            
            }
?>